# SMSPilot-Messenger-PHP-SDK

Библиотека для интеграции с сервисом рассылки сообщений ["SMSPILOT.RU"](https://smspilot.ru)

[![Packagist Downloads](https://img.shields.io/packagist/dt/itpanda-llc/smspilot-messenger-sdk)](https://packagist.org/packages/itpanda-llc/smspilot-messenger-sdk/stats)
![Packagist License](https://img.shields.io/packagist/l/itpanda-llc/smspilot-messenger-sdk)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/itpanda-llc/smspilot-messenger-sdk)

## Ссылки

* [Разработка](https://github.com/itpanda-llc)
* [О проекте (SMSPILOT.RU)](https://smspilot.ru)
* [Документация (API SMSPILOT.RU)](https://smspilot.ru/apikey.php)
* [Документация (SMSPILOT.RU API-1 v1.9.19)](https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf)
* [Документация (SMSPILOT.RU API v2.4.16 HTTP/XML/JSON)](https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf)

## Возможности

* Отправка SMS (HTTP/API-1, HTTP/API-2)
* Проверка статусов SMS (HTTP/API-2)
* Баланс (HTTP/API-1)
* Информация о пользователе (HTTP/API-1)
* Входящие SMS (HTTP/API-1)
* HLR-запросы и PING-сообщения (HTTP/API-1, HTTP/API-2)
* Голосовые сообщения (HTTP/API-1, HTTP/API-2)
* 2WAY - SMS на которые можно ответить (HTTP/API-1, HTTP/API-2)
* Управления именами и шаблонами (HTTP/API-1)

## Требования

* PHP >= 7.2
* cURL
* JSON

## Установка

```shell script
composer require itpanda-llc/smspilot-messenger-sdk
```

## Подключение

```php
require_once 'vendor/autoload.php';
```

## Использование

### Создание сервиса / Аутентификация

```php
use Panda\SmsPilot\MessengerSdk;

// API-ключ
$pilot = new MessengerSdk\Pilot('apikey');

// или

/*
 * Логин
 * Пароль
 */
$pilot = new MessengerSdk\Pilot('login', 'password');
```

### Установка параметров

```php
// Адрес электронной почты (Отладка HTTP-запросов)
$pilot->setDebug('info@smspilot.ru')

    // Реферер
    ->setR('r');
```

### Отправка SMS (Одиночное сообщение) (HTTP/API-1)

Способ №1

* Создание запроса

```php
use Panda\SmsPilot\MessengerSdk;

/*
 * Текст сообщения
 * Номер мобильного телефона, или список номеров через запятую
 * Зарегистрированный отправитель
 */
$singleton = new MessengerSdk\Singleton('Все начинается с сообщения!', '79995550011', MessengerSdk\Sender::VIBER);
```

* Установка параметров

```php
use Panda\SmsPilot\MessengerSdk;

// Текст сообщения
$singleton->setSend('DEVELOPER')

    // Номер мобильного телефона, или список номеров через запятую
    ->setTo('79995550011')

    // Зарегистрированный отправитель
    ->setFrom(MessengerSdk\Sender::GOLOS)

    // Формат ответа сервера
    ->setFormat(MessengerSdk\Format::JSON)

    // Кодировка ответа и запроса
    ->setCharset(MessengerSdk\Charset::WINDOWS_1251)

    // Язык возвращаемых ошибок
    ->setLang(MessengerSdk\Lang::RU)

    // Время отправки
    ->setSendDatetime('2015-04-07 09:10:00')

    // Время жизни сообщения
    ->setTtl(1440)

    // Список возвращаемых атрибутов SMS через запятую
    ->setFields(MessengerSdk\Fields::ALL)

    // Обычная отправка / Рассчитать стоимость
    ->setCost(MessengerSdk\Cost::YES)

    // Обычная отправка / Без передачи оператору (эмулятор)
    ->setTest(MessengerSdk\Test::YES)

    // URL адрес скрипта для асинхронного приёма статуса
    ->setCallback('https://smspilot.ru')

    // Post или get
    ->setCallbackMethod(MessengerSdk\CallbackMethod::POST);
```

* Выполнение запроса

```php
use Panda\SmsPilot\MessengerSdk;

try {
    print_r($pilot->request($singleton));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\SmsPilot\MessengerSdk;

try {
    /*
     * Текст сообщения
     * Номер мобильного телефона, или список номеров через запятую
     * Зарегистрированный отправитель
     */
    print_r($pilot->sendSingleton('Все начинается с сообщения!','79995550011', MessengerSdk\Sender::VIBER));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Отправка SMS (Пакетная отправка) (HTTP/API-2)

Способ №1

* Создание запроса

```php
use Panda\SmsPilot\MessengerSdk;

/*
 * Текст сообщения
 * Телефонный номер абонента
 * Имя отправителя
 */
$packet = new MessengerSdk\Packet('Все начинается с сообщения!', '79995550011', MessengerSdk\Sender::VIBER);
```

* Установка параметров

```php
use Panda\SmsPilot\MessengerSdk;

/*
 * Вызов методов "setFrom", "setDatetime", "setCallback", "setCallbackMethod", "setTtl"
 * сразу после создания экземпляра класса позволит использовать соответствующие параметры
 * по умолчанию для всех сообщений в пакете
 */

/*
 * Текст сообщения
 * Телефонный номер абонента
 * Имя отправителя
 */
$packet->addSend('Все начинается с сообщения!', '79995550011', MessengerSdk\Sender::VIBERSMS)
    ->addSend('Уже началось!', '79995550012', MessengerSdk\Sender::VIBERSMS)
    
    // Уникальный код сообщения в вашей системе
    ->setId('id')

    // Имя отправителя
    ->setFrom(MessengerSdk\Sender::GOLOS)

    // Время отложенной отправки сообщения
    ->setSendDatetime('2015-04-07 09:10:00')

    // URL адрес скрипта для приѐма статуса
    ->setCallback('https://smspilot.ru')

    // get или post вызов скрипта приёма статусов
    ->setCallbackMethod(MessengerSdk\CallbackMethod::POST)

    // Время жизни сообщения
    ->setTtl(1440)

    // Обычная отправка / Без передачи оператору (эмулятор)
    ->setTest(MessengerSdk\Test::YES)

    // Обычная отправка / Рассчитать стоимость
    ->setCost(MessengerSdk\Cost::YES);
```

* Выполнение запроса

```php
use Panda\SmsPilot\MessengerSdk;

try {
    print_r($pilot->request($packet));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\SmsPilot\MessengerSdk;

try {
    /*
     * Текст сообщения
     * Номер мобильного телефона, или список номеров через запятую
     * Зарегистрированный отправитель
     */
    print_r($pilot->sendPacket('Все начинается с сообщения!', '79995550011', MessengerSdk\Sender::VIBER));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Проверка статусов SMS (HTTP/API-2)

Способ №1

* Создание запроса

```php
use Panda\SmsPilot\MessengerSdk;

// Код сообщения
$status = new MessengerSdk\Status('id');
```

* Установка параметров

```php
use Panda\SmsPilot\MessengerSdk;

// Код сообщения
$status->addId('id')
    ->addId('id')

    // Код пакета
    ->setPacketId('packetId');
```

* Выполнение запроса

```php
use Panda\SmsPilot\MessengerSdk;

try {
    print_r($pilot->request($status));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\SmsPilot\MessengerSdk;

try {
    // Код сообщения
    print_r($pilot->getStatusById('id'));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}

// или

try {
    // Код пакета
    print_r($pilot->getStatusByPacketId('packetId'));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Баланс (HTTP/API-1)

Способ №1

* Создание запроса

```php
use Panda\SmsPilot\MessengerSdk;

// Единица измерения
$balance = new MessengerSdk\Balance(MessengerSdk\Balance::SMS);

// или

// Единица измерения
$balance = new MessengerSdk\Account(MessengerSdk\Balance::SMS);
```

* Установка параметров

```php
use Panda\SmsPilot\MessengerSdk;

// Единица измерения
$balance->setBalance(MessengerSdk\Balance::RUR)

    // Формат ответа сервера
    ->setFormat(MessengerSdk\Format::JSON)

    // Кодировка ответа и запроса
    ->setCharset(MessengerSdk\Charset::WINDOWS_1251)

    // Язык возвращаемых ошибок
    ->setLang(MessengerSdk\Lang::RU);
```

* Выполнение запроса

```php
use Panda\SmsPilot\MessengerSdk;

try {
    print_r($pilot->request($balance));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\SmsPilot\MessengerSdk;

try {
    // Единица измерения
    print_r($pilot->getBalance(MessengerSdk\Balance::RUR));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Информация о пользователе (HTTP/API-1)

Способ №1

* Создание запроса

```php
use Panda\SmsPilot\MessengerSdk;

// Единица измерения
$account = new MessengerSdk\Account(MessengerSdk\Balance::SMS);
```

* Установка параметров

```php
use Panda\SmsPilot\MessengerSdk;

// Единица измерения
$account->setBalance(MessengerSdk\Balance::RUR)

    // Формат ответа сервера
    ->setFormat(MessengerSdk\Format::JSON)

    // Кодировка ответа и запроса
    ->setCharset(MessengerSdk\Charset::WINDOWS_1251)

    // Язык возвращаемых ошибок
    ->setLang(MessengerSdk\Lang::RU);
```

* Выполнение запроса

```php
use Panda\SmsPilot\MessengerSdk;

try {
    print_r($pilot->request($account));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\SmsPilot\MessengerSdk;

try {
    // Единица измерения
    print_r($pilot->getAccount(MessengerSdk\Balance::RUR));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Входящие SMS (HTTP/API-1)

Способ №1

* Создание запроса

```php
use Panda\SmsPilot\MessengerSdk;

// Дата/время с которого начинается выборка
$inbound = new MessengerSdk\Inbound(MessengerSdk\Inbound::ALL);
```

* Установка параметров

```php
use Panda\SmsPilot\MessengerSdk;

// Дата/время с которого начинается выборка
$inbound->setInbound('2010-06-03 09:45:41')

    // Формат ответа сервера
    ->setFormat(MessengerSdk\Format::JSON)

    // Кодировка ответа и запроса
    ->setCharset(MessengerSdk\Charset::WINDOWS_1251)

    // Язык возвращаемых ошибок
    ->setLang(MessengerSdk\Lang::RU);
```

* Выполнение запроса

```php
use Panda\SmsPilot\MessengerSdk;

try {
    print_r($pilot->request($inbound));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\SmsPilot\MessengerSdk;

try {
    // Дата/время с которого начинается выборка
    print_r($pilot->getInbound(MessengerSdk\Inbound::ALL);
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Имена отправителя (HTTP/API-1)

Способ №1

* Создание запроса

```php
use Panda\SmsPilot\MessengerSdk;

/*
 * Имя отправителя
 * Название проекта, адрес сайта, примеры сообщений
 * Адрес для уведомления о результате проверки
 */
$sender = new MessengerSdk\Sender('SMSPilot',
    'Сайт: https://smspilot.ru; Деятельность: Телематические услуги связи...',
    'info@smspilot.ru');
```

* Установка параметров

```php
use Panda\SmsPilot\MessengerSdk;

// Имя отправителя
$sender->setAddSender('SMSPilot')

    // Название проекта, адрес сайта, примеры сообщений
    ->setDescription('Сайт: https://smspilot.ru; Деятельность: Телематические услуги связи...')

    // Адрес для уведомления о результате проверки
    ->setCallback('info@smspilot.ru')

    // Получить список отправителей
    ->setList(MessengerSdk\Sender::SENDERS)

    // Формат ответа сервера
    ->setFormat(MessengerSdk\Format::JSON)

    // Кодировка ответа и запроса
    ->setCharset(MessengerSdk\Charset::WINDOWS_1251)

    // Язык возвращаемых ошибок
    ->setLang(MessengerSdk\Lang::RU)

    // Обычная отправка / Без передачи оператору (эмулятор)
    ->setTest(MessengerSdk\Test::YES);
```

* Выполнение запроса

```php
use Panda\SmsPilot\MessengerSdk;

try {
    print_r($pilot->request($sender));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\SmsPilot\MessengerSdk;

try {
    /*
     * Имя отправителя
     * Название проекта, адрес сайта, примеры сообщений
     * Адрес для уведомления о результате проверки
     */
    print_r($pilot->registerSender('SMSPilot',
        'Сайт: https://smspilot.ru; Деятельность: Телематические услуги связи...',
        'info@smspilot.ru');
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Анти-спам шаблоны (HTTP/API-1)

Способ №1

* Создание запроса

```php
use Panda\SmsPilot\MessengerSdk;

/*
 * Текст шаблона
 * Адрес для уведомления о результате проверки
 */
$template = new MessengerSdk\Template('Ваш ребенок покинул(а) школу в __:__. Школа №1.',
    'http://smspilot.ru/api.php');
```

* Установка параметров

```php
use Panda\SmsPilot\MessengerSdk;

// Имя отправителя
$template->setAddTemplate('Ваш ребенок покинул(а) школу в __:__. Школа №1.')

    // Адрес для уведомления о результате проверки
    ->setCallback('http://smspilot.ru/api.php')

    // Формат ответа сервера
    ->setFormat(MessengerSdk\Format::JSON)

    // Кодировка ответа и запроса
    ->setCharset(MessengerSdk\Charset::WINDOWS_1251)

    // Язык возвращаемых ошибок
    ->setLang(MessengerSdk\Lang::RU);
```

* Выполнение запроса

```php
use Panda\SmsPilot\MessengerSdk;

try {
    print_r($pilot->request($template));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\SmsPilot\MessengerSdk;

try {
    print_r($pilot->registerTemplate('Код подтверждения: _____', 'http://smspilot.ru/api.php'));
} catch (MessengerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```
