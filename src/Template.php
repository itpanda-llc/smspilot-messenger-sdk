<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-php-sdk
 */

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Template
 * @package Panda\SmsPilot\MessengerSdk
 * Анти-спам шаблоны (HTTP/API-1)
 */
class Template extends Task
{
    /**
     * Наименование параметра "Текст шаблона"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const ADD_TEMPLATE = 'add_template';

    /**
     * Наименование параметра "URL для уведомления о результатах проверки"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const CALLBACK = 'callback';

    /**
     * Наименование параметра "Формат ответа сервера"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const FORMAT = 'format';

    /**
     * Наименование параметра "Кодировка запроса и ответа"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const CHARSET = 'charset';

    /**
     * Наименование параметра "Язык возвращаемых ошибок"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const LANG = 'lang';

    /**
     * Template constructor.
     * @param string|null $addTemplate Текст шаблона
     * @param string|null $callback Адрес для уведомления о результате проверки
     */
    public function __construct(string $addTemplate = null,
                                string $callback = null)
    {
        $this->task[self::ADD_TEMPLATE] = $addTemplate;
        $this->task[self::CALLBACK] = $callback;
    }

    /**
     * @param string $addTemplate Текст шаблона
     * @return $this
     */
    public function setAddTemplate(string $addTemplate): self
    {
        $this->task[self::ADD_TEMPLATE] = $addTemplate;

        return $this;
    }

    /**
     * @param string $callback Адрес для уведомления о результате проверки
     * @return $this
     */
    public function setCallback(string $callback): self
    {
        $this->task[self::CALLBACK] = $callback;

        return $this;
    }

    /**
     * @param string $format Формат ответа сервера
     * @return $this
     */
    public function setFormat(string $format): self
    {
        $this->task[self::FORMAT] = $format;

        return $this;
    }

    /**
     * @param string $charset Кодировка запроса и ответа
     * @return $this
     */
    public function setCharset(string $charset): self
    {
        $this->task[self::CHARSET] = $charset;

        return $this;
    }

    /**
     * @param string $lang Язык возвращаемых ошибок
     * @return $this
     */
    public function setLang(string $lang): self
    {
        $this->task[self::LANG] = $lang;

        return $this;
    }
}
