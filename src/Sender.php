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
 * Class Sender Создание и формирование заявок на регистрацию имен отправителя
 * @package Panda\SMSPilot\MessengerSDK
 */
class Sender extends Check implements Package
{
    /**
     * Наименование параметра "Имя отправителя"
     */
    protected const SENDER = 'add_sender';

    /**
     * Наименование параметра "Описание проекта"
     */
    protected const DESCRIPTION = 'description';

    /**
     * Наименование параметра "Адрес для получения результата"
     */
    protected const CALLBACK = 'callback';

    /**
     * @var array URL web-запроса
     */
    public $url = URL::HTTP_V1;

    /**
     * Sender constructor.
     * @param string $sender Имя отправителя
     * @param string|null $callback Адрес для получения результата
     * @param string|null $description Описание проекта
     */
    public function __construct(string $sender,
                                string $callback = null,
                                string $description = null)
    {
        $this->package[self::SENDER] = $sender;
        $this->package[self::CALLBACK] = $callback;
        $this->package[self::DESCRIPTION] = $description;
    }

    /**
     * @param string $description Описание проекта
     */
    public function setDescription(string $description): void
    {
        $this->package[self::DESCRIPTION] = $description;
    }

    /**
     * @return string Параметры посылки
     */
    public function getParam(): string
    {
        return http_build_query($this->package);
    }
}
