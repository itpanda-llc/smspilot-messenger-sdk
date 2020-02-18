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
 * Class Check Получение информации
 * @package Panda\SMSPilot\MessengerSDK
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
