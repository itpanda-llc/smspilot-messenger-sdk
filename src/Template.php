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
 * Class Template Формирование анти-спам шаблона на проверку
 * @package Panda\SMSPilot\MessengerSDK
 */
class Template extends Check implements Package
{
    /**
     * Наименование параметра "Текст шаблона"
     */
    protected const TEMPLATE = 'add_template';

    /**
     * Наименование параметра "Адрес для получения результата"
     */
    protected const CALLBACK = 'callback';

    /**
     * @var string URL web-запроса
     */
    public $url = URL::HTTP_V1;

    /**
     * Template constructor.
     * @param string $template Текст шаблона
     * @param string $callback Адрес для получения результата
     */
    public function __construct(string $template,
                                string $callback = null)
    {
        $this->package[self::TEMPLATE] = $template;
        $this->package[self::CALLBACK] = $callback;
    }

    /**
     * @return string Параметры посылки
     */
    public function getParam(): string
    {
        return http_build_query($this->package);
    }
}
