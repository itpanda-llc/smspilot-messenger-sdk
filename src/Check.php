<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Check
 * @package Panda\SMSPilot\MessengerSDK
 * Получение информации
 */
abstract class Check implements Package
{
    /**
     * @var array Параметры посылки
     */
    protected $package = [];

    /**
     * @param array $param Параметры посылки
     * @return Check
     */
    public function addParam(array $param): Package
    {
        $this->package = array_merge($this->package, $param);

        return $this;
    }

    /**
     * @return string Параметры посылки
     */
    abstract public function getParam(): string;
}
