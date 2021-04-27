<?php

/**
 * Main class
 *
 * @author      Alexandre Brito <britoalexandre549@gmail.com>
 * @copyright   Copyright (c) alexcrisbrito
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/alexcrisbrito/culusms-php
 */

namespace alexcrisbrito\culusms;


use alexcrisbrito\culusms\contracts\AddressBook;
use alexcrisbrito\culusms\contracts\Devices;
use alexcrisbrito\culusms\contracts\Messages;

class CuluSms
{
    /**
     * API configuration
     *
     * @var Config
     */
    public $config;

    /**
     * The messages
     * API contract
     *
     * @var $messages
     */
    public $messages;

    /**
     * The devices
     * API contract
     *
     * @var $devices
     */
    public $devices;

    /**
     * The address book
     * API contract
     *
     * @var $address_book
     */
    public $address_book;

    /**
     * CuluSms constructor.
     */
    public function __construct($apiKey)
    {
        $this->config = new Config($apiKey);
        $this->messages = new Messages($this->config);
        $this->devices = new Devices($this->config);
        $this->address_book = new AddressBook($this->config);
    }

}