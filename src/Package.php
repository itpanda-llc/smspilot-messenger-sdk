<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Interface Package
 * @package Panda\SMSPilot\MessengerSDK
 * Посылка
 */
interface Package
{
    /**
     * @param array $param Параметры посылки
     * @return Send
     */
    public function addParam(array $param): Package;

    /**
     * @return string Параметры посылки
     */
    public function getParam(): string;
}
