<?php

/**
 * Файл из репозитория SMSPilot-Messenger-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-sdk
 */

declare(strict_types=1);

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class JsonTask
 * @package Panda\SmsPilot\MessengerSdk
 * Задача / Запрос
 */
class JsonTask extends Task
{
    /**
     * @param array $param Параметры задачи/запроса
     */
    public function addParam(array $param): void
    {
        $this->param[self::DEBUG] = $this->param[self::DEBUG]
            ?? $param[self::DEBUG]
            ?? null;
        $this->param[self::R] = $this->param[self::R]
            ?? $param[self::R]
            ?? null;

        $this->task += array_diff($param, $this->param);
    }

    /**
     * @return string URL-адрес
     */
    public function getUrl(): string
    {
        return (array_diff($this->param, [null]) === [])
            ? Url::API2
            : sprintf("%s?%s",
                Url::API2,
                http_build_query($this->param));
    }

    /**
     * @return string Параметры задачи/запроса
     */
    public function getParam(): string
    {
        return json_encode(array_filter($this->task,
            function($a) { return !is_null($a); }));
    }
}
