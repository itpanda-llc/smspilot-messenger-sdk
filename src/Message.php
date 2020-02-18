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
 * Class Message Сообщения исключений
 * @package Panda\SMSPilot\MessengerSDK
 */
class Message
{
    /**
     * Ошибка параметров пакета сообщений
     */
    public const PACKET_ERROR = 'Неправильные параметры списка сообщений';

    /**
     * Ошибка выполнения web-запроса
     */
    public const REQUEST_ERROR = 'Web-запрос не выполнен';
}
