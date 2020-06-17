<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Send
 * @package Panda\SMSPilot\MessengerSDK
 * Отправка
 */
abstract class Send implements Package
{
    /**
     * Наименование параметра "Текст соообщения"
     */
    protected const MESSAGE = 'send';

    /**
     * Наименование параметра "Номер получателя"
     */
    protected const RECIPIENT = 'to';

    /**
     * Наименование параметра "Имя отправителя"
     */
    protected const SENDER = 'from';

    /**
     * Наименование параметра "Время отправки"
     */
    protected const TIME = 'send_datetime';

    /**
     * @var array Параметры посылки
     */
    protected $package = [];

    /**
     * @param string $name Имя отправителя
     * @return Package
     */
    abstract public function setName(string $name): Package;

    /**
     * @param string $time Время отправки
     * @return Package
     */
    abstract public function setTime(string $time): Package;

    /**
     * @param array $param Параметры посылки
     * @return Package
     */
    public function addParam(array $param): Package
    {
        $this->package = array_merge($this->package, $param);

        return $this;
    }

    /**
     * @return string Параметры посылки
     */
    abstract public function getParam(): string;
}
