<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Balance
 * @package Panda\SMSPilot\MessengerSDK
 * Получение информации о балансе аккаунта (HTTP API v1)
 */
class Balance extends Check implements Package, Param
{
    /**
     * Рубль
     */
    public const RUR = 'rur';

    /**
     * Примерное количество СМС-сообщений
     */
    public const SMS = 'sms';

    /**
     * Наименование параметра "Единица измерения"
     */
    private const PARAM_NAME = 'balance';

    /**
     * Наименование параметра "Формат ответа"
     */
    private const FORMAT = 'format';

    /**
     * @var string URL-адрес web-запроса
     */
    public $url = URL::HTTP_V1;

    /**
     * Balance constructor.
     * @param string|null $balance Единица измерения
     * @param string|null $format Формат ответа
     */
    public function __construct(string $balance = null,
                                string $format = null)
    {
        $this->package[self::PARAM_NAME] = $balance ?? self::RUR;
        $this->package[self::FORMAT] = $format;
    }

    /**
     * @return string Параметры посылки
     */
    public function getParam(): string
    {
        return http_build_query($this->package);
    }

    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array
    {
        return [self::PARAM_NAME => $param];
    }
}
