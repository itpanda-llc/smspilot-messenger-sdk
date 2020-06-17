# SMSPilot-Messenger-PHP-SDK

Библиотека для интеграции, реализующая в полном объеме все возможности API сервиса рассылки сообщений ["SMSPilot"](https://smspilot.ru)

[![GitHub license](https://img.shields.io/badge/license-MIT-blue)](LICENSE)

## Ссылки

* [Разработка](https://github.com/itpanda-llc)
* [О проекте](https://smspilot.ru)
* [Документация](https://smspilot.ru/apikey.php)

## Возможности

* Получение информации об аккаунте и состоянии лицевого счета
* Получение информации о входящих сообщениях
* Формирование и отправка заявок на регистрацию имен отправителя
* Формирование и отправка анти-спам-шаблонов на проверку
* Создание и формирование параметров отправки сообщений, рассылок (массового сообщения) и пакетов (персональных массовых сообщений)
* Осуществление отправки сообщений, рассылок (СМС, Viber, гибридных (Viber, СМС) и голосовых сообщений)
* Осуществление отправки Ping-сообщений и HLR-запросов
* Получение статуса отправленных сообщений

## Требования

* PHP >= 7.2
* JSON
* cURL

## Установка

```shell script
php composer.phar require "itpanda-llc/smspilot-messenger-php-sdk"
```

или

```shell script
clone https://github.com/itpanda-llc/smspilot-messenger-php-sdk
```

## Примеры пользования

Подключение

```php
require_once 'vendor/autoload.php';
```

или

```php
require_once 'smspilot-messenger-php-sdk/autoload.php';
```

Импорт

```php
use Panda\SMSPilot\MessengerSDK\Pilot;
use Panda\SMSPilot\MessengerSDK\Singleton;
use Panda\SMSPilot\MessengerSDK\Massive;
use Panda\SMSPilot\MessengerSDK\Packet;
use Panda\SMSPilot\MessengerSDK\Status;
use Panda\SMSPilot\MessengerSDK\Inbound;
use Panda\SMSPilot\MessengerSDK\Sender;
use Panda\SMSPilot\MessengerSDK\Template;
use Panda\SMSPilot\MessengerSDK\Account;
use Panda\SMSPilot\MessengerSDK\Balance;
use Panda\SMSPilot\MessengerSDK\Callback;
use Panda\SMSPilot\MessengerSDK\Charset;
use Panda\SMSPilot\MessengerSDK\Cost;
use Panda\SMSPilot\MessengerSDK\Debug;
use Panda\SMSPilot\MessengerSDK\Format;
use Panda\SMSPilot\MessengerSDK\Method;
use Panda\SMSPilot\MessengerSDK\Name;
use Panda\SMSPilot\MessengerSDK\Range;
use Panda\SMSPilot\MessengerSDK\Ref;
use Panda\SMSPilot\MessengerSDK\Test;
use Panda\SMSPilot\MessengerSDK\Text;
use Panda\SMSPilot\MessengerSDK\Time;
use Panda\SMSPilot\MessengerSDK\TTL;
use Panda\SMSPilot\MessengerSDK\Exception\ClientException;
```

### Создание сервиса и аутентификация

```php
// Обязательный параметр: "API-ключ"
$pilot = new Pilot('R640RLM8D05G018IF8ACC56BBR0FHYDTYURA92Q45KKF90JWR0HQVXM7OW6FA9LZ');
```

### Варианты удобного пользования

```php
try {
    // Получение информации об аккаунте
    print_r($pilot->getAccount());
    
    // Получение информации о балансе аккаунта в примерном количестве смс-сообщений
    print_r($pilot->getBalance(Balance::SMS));
    
    // Регистрация имени отправителя
    print_r($pilot->getSender('NEWPROJECT', 'info@smspilot.ru', 'Сайт: https://smspilot.ru; Деятельность: Телематические услуги связи...'));

    // Получение информации о входящих сообщениях за последний день
    print_r($pilot->getInbound(Range::day(1)));
    
    // Получение информации о новых входящих сообщения
    print_r($pilot->getInbound(Range::NEW));
    
    // Отправление одиночного сообщения
    print_r($pilot->newSingleton('Начинаем!', '79995550011', 'SMSPILOT'));
    
    // Отправление одиночного гибриднго (Viber, СМС) сообщения c задержкой отправки 2 часа
    print_r($pilot->newSingleton('Полетели со мной?!', '79995550011', Name::VIBERSMS, Delay::hour(2)));

    // Получение информации о статусе сообщения (по номеру сообщения)
    print_r($pilot->getStatus('23654545'));

    // Регистрация анти-спам-шаблона
    print_r($pilot->newTemplate('Ваш заказ №____ скучает по вам.', 'http://smspilot.ru/api.php'));
} catch (ClientException $e) {
    echo $e->getMessage();
}

// Отправление массового голосового сообщения с задержкой 15 мин c получением ответа в JSON-формате
$massive = new Massive('Скоро весна!', Name::GOLOS);

$massive->setTime(Delay::min(15))
    ->addParam(Format::get(Format::JSON))
    ->addRecipient('79995550011');

try {
    print_r($pilot->request($massive));
} catch (ClientException $e) {
    echo $e->getMessage();
}

// Определение стоимости отправления массовых персональных сообщений
$packet = new Packet('DEVELOPER');

$packet->addParam(Cost::get(Cost::TRUE))
    ->addMessage('Вы летите?', '79995550011')
    ->addMessage('Ваш друг уже с нами!', '79995550012');

try {
    print_r($pilot->request($packet));
} catch (ClientException $e) {
    echo $e->getMessage();
}

// Получение инормации о статусе сообщений (по номерам сообщений)
$status = new Status;

$status->addMessage('23654545')
    ->addMessage('23654559')
    ->addMessage('23654665');

try {
    print_r($pilot->request($status));
} catch (ClientException $e) {
    echo $e->getMessage();
}

// Получение инормации о статусе сообщений (по номеру пакета)
$status = new Status;

$status->addPacket('23654545');

try {
    print_r($pilot->request($status));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

### Получение информации об аккаунте (HTTP API v1)

```php
try {
    /*
     * Способ №1 (Удобный)
     * Необязательный параметр: "Формат ответа"
     * Возможно использование функционала класса "Format" в качестве параметра
     */
    print_r($pilot->getAccount(Format::XML));
} catch (ClientException $e) {
    echo $e->getMessage();
}

/*
 * Способ №2 (Продвинутый) (создание посылки и формирование параметров)
 * Необязательный параметр: "Формат ответа"
 * Возможно использование функционала класса "Format" в качестве параметра
 */
$account = new Account(Format::TEXT);

/*
 * Дополнительно, возможно указание других параметров,
 * согласно документации, используя метод "addParam(array $param)".
 * Например,
 */

// ...Указание параметра "Формат ответа"
$account->addParam(Format::get(Format::JSON))

    // ...Указание параметра "Отладка HTTP-запросов"
    ->addParam(Debug::get('info@smspilot.ru'));

try {
    /*
     * Отправка посылки
     * Обязательный параметр: "Посылка"
     */
    print_r($pilot->request($account));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

### Получение информации о балансе аккаунта (HTTP API v1)

```php
try {
    /*
     * Способ №1 (Удобный)
     * Необязательные параметры: "Единица измерения", "Формат ответа"
     * Возможно использование функционала классов "Balance", "Format" в качестве параметров
     */
    print_r($pilot->getBalance(Balance::RUR, Format::JSON));
} catch (ClientException $e) {
    echo $e->getMessage();
}

/*
 * Способ №2 (Продвинутый) (создание посылки и формирование параметров)
 * Необязательные параметры: "Единица измерения", "Формат ответа"
 * Возможно использование функционала классов "Balance", "Format" в качестве параметров
 */
$balance = new Balance(Balance::SMS, Format::TEXT);

/*
 * Дополнительно, возможно указание других параметров,
 * согласно документации, используя метод "addParam(array $param)".
 * Например,
 */

// ...Указание параметра "Единица измерения баланса аккаунта"
$balance->addParam(Balance::get(Balance::RUR))

    // ...Указание параметра "Формат ответа"
    ->addParam(Format::get(Format::XML));

try {
    /*
     * Отправка посылки
     * Обязательный параметр: "Посылка"
     */
    print_r($pilot->request($balance));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

### Получение информации о входящих сообщениях (HTTP API v2)

```php
/*
 * Не указывая параметр "Временная отметка",
 * возможно получение информации о сообщениях за все время
 */

try {
    /*
     * Способ №1 (Удобный)
     * Необязательный параметр: "Временная отметка"
     * Возможно использование функционала класса "Range" в качестве параметра
     */
    print_r($pilot->getInbound(Range::day(2)));
} catch (ClientException $e) {
    echo $e->getMessage();
}

/*
 * Способ №2 (Продвинутый) (создание посылки и формирование параметров)
 * Необязательный параметр: "Временная отметка"
 * Возможно использование функционала класса "Range" в качестве параметра
 */
$inbound = new Inbound(Range::NEW);

try {
    /*
     * Отправка посылки
     * Обязательный параметр: "Посылка"
     */
    print_r($pilot->request($inbound));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

### Регистрация имен отправителя (HTTP API v1)

```php
try {
    /*
     * Способ №1 (Удобный)
     * Обязательный параметр: "Имя отправителя"
     * Необязательные параметры: "Адрес для получения результата", "Описание проекта"
     */
    print_r($pilot->getSender('NEWPROJECT', 'info@smspilot.ru', 'Сайт: https://smspilot.ru; Деятельность: Телематические услуги связи...'));
} catch (ClientException $e) {
    echo $e->getMessage();
}

/*
 * Способ №2 (Продвинутый) (создание посылки и формирование параметров)
 * Обязательный параметр: "Имя отправителя"
 * Необязательные параметры: "Адрес для получения результата", "Описание проекта"
 */
$sender = new Sender('NEWPROJECT', 'info@smspilot.ru', 'Сайт: https://smspilot.ru; Деятельность: Телематические услуги связи...');

/*
 * Указание описания проекта
 * Обязательный параметр: "Описание проекта"
 */
$sender->setDescription('Сайт: https://smspilot.ru; Деятельность: Рассылка СМС сообщений...');

/*
 * Дополнительно, возможно указание других параметров,
 * согласно документации, используя метод "addParam(array $param)".
 * Например,
 */

// ...Указание параметра "Формат ответа"
$sender->addParam(Format::get(Format::XML));

try {
    /*
     * Отправка посылки
     * Обязательный параметр: "Посылка"
     */
    print_r($pilot->request($sender));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

### Отправление анти-спам-шаблонов на проверку (HTTP API v1)

```php
try {
    /*
     * Способ №1 (Удобный)
     * Обязательный параметр: "Текст шаблона"
     * Необязательный параметр: "Адрес для получения результата"
     */
    print_r($pilot->newTemplate('Код подтверждения: ________', 'http://smspilot.ru/api.php'));
} catch (ClientException $e) {
    echo $e->getMessage();
}

/*
 * Способ №2 (Продвинутый) (создание посылки и формирование параметров)
 * Обязательный параметр: "Текст шаблона"
 * Необязательный параметр: "Адрес для получения результата"
 */
$template = new Template('Ваш ребенок покинул(а) школу. Школа №___ Время: ______.', 'http://smspilot.ru/api.php');

/*
 * Дополнительно, возможно указание других параметров,
 * согласно документации, используя метод "addParam(array $param)".
 * Например,
 */

// ...Указание параметра "Формат ответа"
$template->addParam(Format::get(Format::JSON));

try {
    /*
     * Отправка посылки
     * Обязательный параметр: "Посылка"
     */
    print_r($pilot->request($template));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

### Отправка одиночного сообщения (HTTP API v1) (СМС, Viber, Гибриднные (Viber, СМС) и голосовые сообщения)

Создание посылки

```php
/*
 * Для использования Viber, гибридных (Viber, СМС) и голосовых сообщений,
 * а также Ping-сообщений и HLR-запросов, воспользуйтесь функционалом классов
 * "Name", "Text" в качестве параметров "Имя отправителя" и "Текст сообщения"
 */

/*
 * Обязательные параметры: "Текст сообщения", "Номер получателя"
 * Необязательные параметры: "Имя отправителя", "Время отправки"
 * Возможно использование функционала классов "Name", "Delay" в качестве параметров
 */
$singleton = new Singleton('Все начинается с сообщения!', '79995550011', Name::VIBERSMS, Delay::hour(2));
```

Формирование параметров отправки (необязательно)

```php
/*
 * Для использования Viber, гибридных (Viber, СМС) и голосовых сообщений,
 * а также Ping-сообщений и HLR-запросов, воспользуйтесь функционалом классов
 * "Name", "Text" в качестве параметров "Имя отправителя" и "Текст сообщения"
 */

/*
 * Указание имени отправителя
 * Обязательный параметр: "Имя отправителя"
 * Возможно использование функционала класса "Name" в качестве параметра
 */
$singleton->setName('DEVELOPER')

    /*
     * Указание времени отправки
     * Обязательный параметр: "Время отправки"
     * ВВозможно использование функционала класса "Delay" в качестве параметра
     */
    ->setTime(Delay::min(1));

/*
 * Дополнительно, возможно указание других параметров,
 * согласно документации, используя метод "addParam(array $param)".
 * Например,
 */

// ...Указание параметра "Отладка HTTP-запросов"
$singleton->addParam(Debug::get('info@smspilot.ru'))

    // ...Указание параметра "Кодировка текста сообщения"
    ->addParam(Charset::get(Charset::WINDOWS_1251))
    
    // ...Указание параметра "Рассчитать стоимость"
    ->addParam(Cost::get(Cost::TRUE))
    
    // ...Указание параметра "Реферер"
    ->addParam(Ref::get('13000'));
```

Отправка посылки

```php
try {
    // Обязательный параметр: "Посылка"
    print_r($pilot->request($singleton));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

### Отправка массового сообщения (HTTP API v1) (СМС, Viber, Гибриднные (Viber, СМС) и голосовые сообщения)

Создание посылки

```php
/*
 * Для использования Viber, гибридных (Viber, СМС) и голосовых сообщений,
 * а также Ping-сообщений и HLR-запросов, воспользуйтесь функционалом классов
 * "Name", "Text" в качестве параметров "Имя отправителя" и "Текст сообщения"
 */

/*
 * Обязательный параметр: "Текст сообщения"
 * Необязательные параметры: "Имя отправителя", "Время отправки"
 * Возможно использование функционала классов "Name", "Delay" в качестве параметров
 */
$massive = new Massive('СМСПилот - лучшее решение для СМС-рассылок!', Name::VIBER, Delay::hour(1));
```

Формирование параметров отправки (необязательно)

```php
/*
 * Для использования Viber, гибридных (Viber, СМС) и голосовых сообщений,
 * а также Ping-сообщений и HLR-запросов, воспользуйтесь функционалом классов
 * "Name", "Text" в качестве параметров "Имя отправителя" и "Текст сообщения"
 */

/*
 * Указание имени отправителя
 * Обязательный параметр: "Имя отправителя"
 * Возможно использование функционала классов "Name" в качестве параметра
 */
$massive->setName(Name::GOLOS)

    /*
     * Указание времени отправки
     * Обязательный параметр: "Время отправки"
     * Возможно использование функционала классов "Delay" в качестве параметра
     */
    ->setTime(Delay::min(1));

/*
 * Дополнительно, возможно указание других параметров,
 * согласно документации, используя метод "addParam(array $param)".
 * Например,
 */

// ...Указание параметра "Адрес для асинхронного приема статуса"
$massive->addParam(Callback::get('http://smspilot.ru/api.php'))

    // ...Указание параметра "Метод для асинхронного приема статуса"
    ->addParam(Method::get(Method::POST))
    
    // ...Указание параметра "Отправка без передачи оператору"
    ->addParam(Test::get(Test::TRUE));
```

Добавление номеров получателей

```php
// Обязательный параметр: "Номер получателя"
$massive->addRecipient('79995550011')
    ->addRecipient('79995550012');
```

Отправка посылки

```php
try {
    // Обязательный параметр: "Посылка"
    print_r($pilot->request($massive));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

### Отправка массовых персональных сообщений (СМС-сообщения, пакетная отправка) (HTTP API v2)

Создание посылки

```php
/*
 * Необязательные параметры: "Имя отправителя", "Время отправки"
 * Возможно использование функционала класса "Delay" в качестве параметра
 */
$packet = new Packet('DEVELOPER', Delay::min(20));
```

Формирование параметров отправки (необязательно)

```php
/*
 * Указание имени отправителя
 * Обязательный параметр: "Имя отправителя"
 */
$packet->setName('SMSPILOT')

    /*
     * Указание времени отправки
     * Обязательный параметр: "Время отправки"
     * Возможно использование функционала класса "Delay" в качестве параметра
     */
    ->setTime(Delay::min(5));

/*
 * Дополнительно, возможно указание других параметров,
 * согласно документации, используя метод "addParam(array $param)".
 * Например,
 */

// ...Указание параметра "Рассчитать стоимость"
$packet->addParam(Cost::get(Cost::TRUE))

    // ...Указание параметра "Отправка без передачи оператору"
    ->addParam(Test::get(Test::TRUE));
```

Добавление сообщений в пакет

```php
/*
 * Обязательные параметры: "Текст сообщения", "Номер получателя"
 * Необязательные параметры: "Имя отправителя", "Время отправки"
 * Возможно использование функционала класса "Delay" в качестве параметра
 */
$packet->addMessage('Уже началось!', '79995550011', 'DEVELOPER', Delay::min(5))
    ->addMessage('..и никогда не закончится!', '79995550012', 'SMSPILOT', Delay::min(7));
```

Отправка посылки

```php
try {
    // Обязательный параметр: "Посылка"
    print_r($pilot->request($packet));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

### Получение статуса сообщений (HTTP API v2)

```php
try {
    /*
     * Способ №1 (Удобный)
     * Необязательный параметр: "Номер сообщения"
     */
    print_r($pilot->getStatus('23654545'));
} catch (ClientException $e) {
    echo $e->getMessage();
}

/*
 * Способ №2 (Продвинутый) (создание посылки и формирование параметров)
 * Необязательный параметр: "Номер сообщения"
 */
$status = new Status('23654545');

/*
 * Добавление номеров сообщений
 * Обязательный параметр: "Номер сообщения"
 */
$status->addMessage('23654545')
    ->addMessage('23654547');

/*
 * Добавление номера пакета сообщений
 * Обязательный параметр: "Номер пакета сообщений"
 */
$status->addPacket('23654545');

try {
    /*
     * Отправка посылки
     * Обязательный параметр: "Посылка"
     */
    print_r($pilot->request($status));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```
