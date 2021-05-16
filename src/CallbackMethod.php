<?php

/**
 * Файл из репозитория SMSPilot-Messenger-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-sdk
 */

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Method
 * @package Panda\SmsPilot\MessengerSdk
 * Метод для асинхронного приема статуса
 */
class CallbackMethod
{
    /**
     * GET (По умолчанию)
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    public const GET = 'get';

    /**
     * POST
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    public const POST = 'post';
}
