<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-php-sdk
 */

declare(strict_types=1);

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Task
 * @package Panda\SmsPilot\MessengerSdk
 * Задача / Запрос
 */
class Task
{
    /**
     * Наименование параметра "Адрес электронной почты (Отладка HTTP-запросов)"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    protected const DEBUG = 'debug';

    /**
     * Наименование параметра "Реферер"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    protected const R = 'r';

    /**
     * @var array Параметры задачи/запроса
     */
    protected $task = [];

    /**
     * @var array Параметры задачи/запроса
     */
    protected $param = [];

    /**
     * @param string $debug Адрес электронной почты (Отладка HTTP-запросов)
     * @return $this
     */
    public function setDebug(string $debug): self
    {
        $this->param[self::DEBUG] = $debug;

        return $this;
    }

    /**
     * @param string $r Реферер
     * @return $this
     */
    public function setR(string $r): self
    {
        $this->param[self::R] = $r;

        return $this;
    }

    /**
     * @param array $param Параметры задачи/запроса
     */
    public function addParam(array $param): void
    {
        $this->task += $param;
    }

    /**
     * @return string URL-адрес
     */
    public function getUrl(): string
    {
        return Url::API;
    }

    /**
     * @return string Параметры задачи/запроса
     */
    public function getParam(): string
    {
        return http_build_query($this->task + $this->param);
    }
}
