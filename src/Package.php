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
 * Interface Package Посылка
 * @package Panda\SMSPilot\MessengerSDK
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
