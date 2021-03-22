<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-php-sdk
 */

declare(strict_types=1);

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Pilot
 * @package Panda\SmsPilot\MessengerSdk
 * Формирование задачи / Выполнение запроса
 */
class Pilot extends Request
{
    /**
     * Наименование параметра "API-ключ"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const API_KEY = 'apikey';

    /**
     * Наименование параметра "Логин"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const LOGIN = 'login';

    /**
     *
     * Наименование параметра "Пароль"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const PASSWORD = 'password';

    /**
     * Наименование параметра "Адрес электронной почты (Отладка HTTP-запросов)"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const DEBUG = 'debug';

    /**
     * Наименование параметра "Реферер"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const R = 'r';

    /**
     * @var array Параметры задачи/запроса
     */
    private $task = [];

    /**
     * Pilot constructor.
     * @param string $reason API-ключ / Логин
     * @param string|null $password Пароль
     */
    public function __construct(string $reason,
                                string $password = null)
    {
        $this->task[(is_null($password))
            ? self::API_KEY
            : self::LOGIN] = $reason;

        $this->task[self::PASSWORD] = $password;
    }

    /**
     * @param string $debug Адрес электронной почты (Отладка HTTP-запросов)
     * @return $this
     */
    public function setDebug(string $debug): self
    {
        $this->task[self::DEBUG] = $debug;

        return $this;
    }

    /**
     * @param string $r Реферер
     * @return $this
     */
    public function setR(string $r): self
    {
        $this->task[self::R] = $r;

        return $this;
    }

    /**
     * @param string $send Текст сообщения
     * @param string $to Номер мобильного телефона, или список номеров через запятую
     * @param string|null $from Зарегистрированный отправитель
     * @return string Результат web-запроса
     */
    public function sendSingleton(string $send,
                                  string $to,
                                  string $from = null): string
    {
        return $this->request(new Singleton($send, $to, $from));
    }

    /**
     * @param string $text Текст соообщения
     * @param string $to Телефонный номер абонента
     * @param string|null $from Имя отправителя
     * @return string Результат web-запроса
     */
    public function sendPacket(string $text,
                               string $to,
                               string $from = null): string
    {
        return $this->request(new Packet($text, $to, $from));
    }

    /**
     * @param string|null $balance Единица измерения
     * @return string Результат web-запроса
     */
    public function getBalance(string $balance = null): string
    {
        return $this->request(new Balance($balance));
    }

    /**
     * @param string|null $balance Единица измерения
     * @return string Результат web-запроса
     */
    public function getAccount(string $balance = null): string
    {
        return $this->request(new Account($balance));
    }

    /**
     * @param string $id Код сообщения
     * @return string Результат web-запроса
     */
    public function getStatusById(string $id): string
    {
        return $this->request(new Status($id));
    }

    /**
     * @param string $packetId Код пакета
     * @return string Результат web-запроса
     */
    public function getStatusByPacketId(string $packetId): string
    {
        return $this->request((new Status)->setPacketId($packetId));
    }

    /**
     * @param string|null $inbound Дата/время с которого начинается выборка
     * @return string Результат web-запроса
     */
    public function getInbound(string $inbound = null): string
    {
        return $this->request(new Inbound($inbound));
    }

    /**
     * @param string|null $addSender Имя отправителя
     * @param string|null $description Название проекта, адрес сайта, примеры сообщений
     * @param string|null $callback Адрес для уведомления о результате проверки
     * @return string Результат web-запроса
     */
    public function registerSender(string $addSender = null,
                                   string $description = null,
                                   string $callback = null): string
    {
        return $this->request(new Sender($addSender,
            $description,
            $callback));
    }

    /**
     * @param string $addTemplate Текст шаблона
     * @param string $callback Адрес для уведомления о результате проверки
     * @return string Результат web-запроса
     */
    public function registerTemplate(string $addTemplate,
                                     string $callback): string
    {
        return $this->request(new Template($addTemplate, $callback));
    }

    /**
     * @param Task $task Задача / Запрос
     * @return string Результат web-запроса
     */
    public function request(Task $task): string
    {
        $task->addParam($this->task);

        return $this->send($task->getUrl(), $task->getParam());
    }
}
