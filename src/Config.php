<?php

/**
 * Configuration class
 *
 * @author      Alexandre Brito <britoalexandre549@gmail.com>
 * @copyright   Copyright (c) alexcrisbrito
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/alexcrisbrito/culusms-php
 */


namespace alexcrisbrito\culusms;


class Config
{

    /**
     *
     * This is our default
     * configuration variables
     *
     */

    private $routes = [
        "messages" => [
            "send" => "https://culusms.com/api/send?key=API_KEY",
            "get_sent" => "https://culusms.com/api/get/sent?key=API_KEY",
            "get_received" => "https://culusms.com/api/get/received?key=API_KEY",
            "get_pending" => "https://culusms.com/api/get/pending?key=API_KEY"
        ],
        "address_book" => [
            "create_contact" => "https://culusms.com/api/create/contact?key=API_KEY",
            "create_group" => "https://culusms.com/api/create/group?key=API_KEY",
            "delete_contact" => "https://culusms.com/api/delete/contact?key=API_KEY",
            "delete_group" => "https://culusms.com/api/delete/group?key=API_KEY",
            "get_contacts" => "https://culusms.com/api/get/contacts?key=API_KEY",
            "get_groups" => "https://culusms.com/api/get/groups?key=API_KEY"
        ],
        "devices" => [
            "get_devices" => "https://culusms.com/api/get/devices?key=API_KEY",
            "get_device" => "https://culusms.com/api/get/device?key=API_KEY"
        ]
    ];

    /**
     * The API key provided by
     * the CuluSMS platform
     *
     * @var $apiKey
     */
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get a API
     * route
     *
     * @param $stack
     * @param $which
     * @return array|string|string[]|null
     */
    public function getRoute($stack, $which)
    {
        if (isset($this->routes[$stack][$which]))
            return str_replace("API_KEY", $this->apiKey, $this->routes[$stack][$which]);

        return null;
    }

    /**
     * @param mixed $apiKey
     * @return Config
     */
    public function setApiKey($apiKey): Config
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }
}