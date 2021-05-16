<?php

/**
 * Файл из репозитория SMSPilot-Messenger-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-sdk
 */

declare(strict_types=1);

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Sender
 * @package Panda\SmsPilot\MessengerSdk
 * Имена отправителя (HTTP/API-1)
 */
class Sender extends Task
{
    /**
     * Наименование параметра "Имя отправителя"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const ADD_SENDER = 'add_sender';

    /**
     * Наименование параметра "Название проекта, адрес сайта, примеры сообщений"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const DESCRIPTION = 'description';

    /**
     * Наименование параметра "Адрес для уведомления о результате проверки"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const CALLBACK = 'callback';

    /**
     * Наименование параметра "Список отправителей"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const LIST = 'list';

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
     * Наименование параметра "Обычная отправка / Без передачи оператору (эмулятор)"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const TEST = 'test';

    /**
     * Показать список отправителей
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    public const SENDERS = 'senders';

    /**
     * INFORM
     * @link https://smspilot.ru/my-sender.php
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const INFORM = 'INFORM';

    /**
     * INFORM999
     * @link https://smspilot.ru/my-sender.php
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const INFORM999 = 'INFORM999';

    /**
     * GOLOS
     * @link https://smspilot.ru/my-sender.php
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const GOLOS = 'GOLOS';

    /**
     * PING
     * @link https://smspilot.ru/my-sender.php
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const PING = 'PING';

    /**
     * HLR
     * @link https://smspilot.ru/my-sender.php
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const HLR = 'HLR';

    /**
     * HLRVIP
     * @link https://smspilot.ru/my-sender.php
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const HLRVIP = 'HLRVIP';

    /**
     * VIBER
     * @link https://smspilot.ru/my-sender.php
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const VIBER = 'VIBER';

    /**
     * VIBERSMS
     * @link https://smspilot.ru/my-sender.php
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const VIBERSMS = 'VIBERSMS';

    /**
     * 2WAY
     * @link https://smspilot.ru/my-sender.php
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const TWOWAY = '2WAY';

    /**
     * Sender constructor.
     * @param string|null $addSender Имя отправителя
     * @param string|null $description Название проекта, адрес сайта, примеры сообщений
     * @param string|null $callback Адрес для уведомления о результате проверки
     */
    public function __construct(string $addSender = null,
                                string $description = null,
                                string $callback = null)
    {
        $this->task[self::ADD_SENDER] = $addSender;
        $this->task[self::DESCRIPTION] = $description;
        $this->task[self::CALLBACK] = $callback;

        if ((is_null($addSender))
            && (is_null($description))
            && (is_null($callback)))
            $this->setList(self::SENDERS);
    }

    /**
     * @param string $addSender Имя отправителя
     * @return $this
     */
    public function setAddSender(string $addSender): self
    {
        $this->task[self::ADD_SENDER] = $addSender;

        return $this;
    }

    /**
     * @param string $description Название проекта, адрес сайта, примеры сообщений
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->task[self::DESCRIPTION] = $description;

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
     * @param string $list Список отправителй
     * @return $this
     */
    public function setList(string $list): self
    {
        $this->task[self::ADD_SENDER] = null;
        $this->task[self::DESCRIPTION] = null;
        $this->task[self::CALLBACK] = null;
        $this->task[self::LIST] = $list;

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

    /**
     * @param string $test Обычная отправка / Без передачи оператору (эмулятор)
     * @return $this
     */
    public function setTest(string $test): self
    {
        $this->task[self::TEST] = $test;

        return $this;
    }
}
