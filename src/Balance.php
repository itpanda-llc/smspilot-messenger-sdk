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
 * Class Balance Получение информации о балансе аккаунта
 * @package Panda\SMSPilot\MessengerSDK
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
     * @var string URL web-запроса
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
