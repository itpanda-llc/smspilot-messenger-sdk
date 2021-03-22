<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-php-sdk
 */

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Inbound
 * @package Panda\SmsPilot\MessengerSdk
 * Входящие (HTTP/API-1)
 */
class Inbound extends Task
{
    /**
     * Наименование параметра "inbound"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const INBOUND = 'inbound';

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
     * Возврат всех входящих
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    public const ALL = 'all';

    /**
     * Выбрать ещё не прочитанные сообщения
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    public const NEW = 'new';

    /**
     * Inbound constructor.
     * @param string|null $inbound Дата/время с которого начинается выборка
     */
    public function __construct(string $inbound = null)
    {
        $this->task[self::INBOUND] = $inbound ?? self::NEW;
    }

    /**
     * @param string $inbound Дата/время с которого начинается выборка
     * @return $this
     */
    public function setInbound(string $inbound): self
    {
        $this->task[self::INBOUND] = $inbound;

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
     * @param string $charset Кодировка ответа и запроса
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
