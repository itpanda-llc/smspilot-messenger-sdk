<?php

/**
 * Файл из репозитория SMSPilot-Messenger-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-sdk
 */

declare(strict_types=1);

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Balance
 * @package Panda\SmsPilot\MessengerSdk
 * Баланс (HTTP/API-1)
 */
class Balance extends Account
{
    /**
     * Вернуть баланс в рублях
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    public const RUR = 'rur';

    /**
     * Вернуть примерное кол-во оставшихся смс
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    public const SMS = 'sms';

    /**
     * Balance constructor.
     * @param string|null $balance Единица измерения
     */
    public function __construct(string $balance = null)
    {
        parent::__construct($balance ?? self::RUR);
    }
}
