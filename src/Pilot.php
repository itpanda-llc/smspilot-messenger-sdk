<?php

/**
 * Этот файл является частью репозитория
 * Panda/SMSPilot/MessengerSDK.
 *
 * Для получения полной информации об авторских правах
 * и лицензии, пожалуйста, просмотрите файл LICENSE,
 * который был распространен с этим исходным кодом.
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Pilot Создание сервиса и аутентификация
 * @package Panda\SMSPilot\MessengerSDK
 */
class Pilot extends Request
{
    /**
     * Наименование параметра "Имя пользователя"
     */
    private const API_KEY = 'apikey';

    /**
     * @var array Параметры посылки
     */
    private $package = [];

    /**
     * Pilot constructor.
     * @param string $apiKey API-ключ
     */
    public function __construct(string $apiKey)
    {
        $this->package[self::API_KEY] = $apiKey;
    }

    /**
     * @param string|null $format Формат ответа
     * @return string Результат web-запроса
     */
    public function getAccount(string $format = null): string
    {
        $account = new Account($format);

        return $this->request($account);
    }

    /**
     * @param string|null $balance Единица измерения баланса аккаунта
     * @param string|null $format Формат ответа
     * @return string Результат web-запроса
     */
    public function getBalance(string $balance = null,
                               string $format = null): string
    {
        $balance = new Balance($balance, $format);

        return $this->request($balance);
    }

    /**
     * @param string $sender Имя отправителя
     * @param string|null $callback Адрес для получения результата
     * @param string|null $description Описание проекта
     * @return string Результат web-запроса
     */
    public function getSender(string $sender,
                              string $callback = null,
                              string $description = null): string
    {
        $sender = new Sender ($sender, $callback);

        if (!is_null($description)) {
            $sender->setDescription($description);
        }

        return $this->request($sender);
    }

    /**
     * @param string|null $range Временная отметка
     * @return string Результат web-запроса
     */
    public function getInbound(string $range = null): string
    {
        $inbound = new Inbound($range);

        return $this->request($inbound);
    }

    /**
     * @param string $message Номер сообщения
     * @return string Результат web-запроса
     */
    public function getStatus(string $message): string
    {
        $status = new Status($message);

        return $this->request($status);
    }

    /**
     * @param string $message Текст сообщения
     * @param string $recipient Номер получателя
     * @param string|null $sender Имя отправителя
     * @param string|null $time Время отправки
     * @return string Результат web-запроса
     */
    public function newSingleton(string $message,
                                  string $recipient,
                                  string $sender = null,
                                  string $time = null): string
    {
        $singleton = new Singleton($message,
            $recipient,
            $sender,
            $time);

        return $this->request($singleton);
    }

    /**
     * @param string $template Текст шаблона
     * @param string $callback Адрес для получения результата
     * @return string Результат web-запроса
     */
    public function newTemplate(string $template,
                                 string $callback = null): string
    {
        $template = new Template ($template, $callback);

        return $this->request($template);
    }

    /**
     * @param Package $package Посылка
     * @return string Результат web-запроса
     */
    public function request(Package $package): string
    {
        $package->addParam($this->package);

        return parent::send($package->url,
            $package->getParam());
    }
}
