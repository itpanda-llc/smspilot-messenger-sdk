<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Name
 * @package Panda\SMSPilot\MessengerSDK
 * Имена отправителя
 */
class Name implements Param
{
    /**
     * Общее имя отправителя можно использовать для самых простых уведомлений.
     * Реклама блокируется. У российских абонентов МТС отобразиться - RusNovo,
     * Мегафон - Magazin, Билайн - IPS, Теле2 - IPS.
     * @link https://smspilot.ru/my-sender.php
     */
    public const INFORM = 'INFORM';

    /**
     * Дешевый общий (цифровой) канал можно использовать для самых простых уведомлений.
     * Реклама блокируется. Поддерживается только российский Теле2.
     * У абонента будет показываться случайный номер в качестве имени отправителя.
     * @link https://smspilot.ru/my-sender.php
     */
    public const INFORM999 = 'INFORM999';

    /**
     * Недорогой голосовой канал, автодозвон, текст автоматически
     * преобразуется в речь и сообщается приятным женским голосом.
     * Канал можно использовать для самых простых уведомлений.
     * Сообщения с латинскими буквами уходят как SMS.
     * Реклама блокируется. На телефоне отображается сервисный номер.
     * @link https://smspilot.ru/my-sender.php
     */
    public const GOLOS = 'GOLOS';

    /**
     * PING-SMS нужны чтобы скрытно узнать в сети сейчас абонент или нет.
     * @link https://smspilot.ru/my-sender.php
     */
    public const PING = 'PING';

    /**
     * HLR-запросы нужны чтобы скрытно узнать обслуживается
     * номер телефона или уже нет. Мегафон и Йота не проверяется.
     * @link https://smspilot.ru/my-sender.php
     */
    public const HLR = 'HLR';

    /**
     * Всем уходят дешевые HLR, а абонентам Мегафон и Йота дорогие PING-и.
     * @link https://smspilot.ru/my-sender.php
     */
    public const HLRVIP = 'HLRVIP';

    /**
     * Viber-сообщение
     * @link https://smspilot.ru/my-sender.php
     */
    public const VIBER = 'VIBER';

    /**
     * Гибридное (Viber и SMS) сообщение
     * @link https://smspilot.ru/my-sender.php
     */
    public const VIBERSMS = 'VIBERSMS';

    /**
     * Наименование параметра
     */
    private const PARAM_NAME = 'from';

    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array
    {
        return [self::PARAM_NAME => $param];
    }
}
