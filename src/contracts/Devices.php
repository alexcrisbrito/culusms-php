<?php

/**
 * Devices service class
 *
 * @author      Alexandre Brito <britoalexandre549@gmail.com>
 * @copyright   Copyright (c) alexcrisbrito
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/alexcrisbrito/culusms-php
 */


namespace alexcrisbrito\culusms\contracts;


use alexcrisbrito\culusms\Config;
use alexcrisbrito\culusms\interfaces\ResponseInterface;
use alexcrisbrito\culusms\http\Request;
use alexcrisbrito\culusms\http\Response;

class Devices
{
    /**
     * App config
     *
     * @var Config
     */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Get a device
     * by it's id
     * 
     * @param int $id
     * @return ResponseInterface
     */
    public function get_device(int $id) :ResponseInterface
    {
        $response = Request::get($this->config->getRoute('devices', 'get_device'), compact("id"));

        return new Response($response);
    }

    /**
     * Get all registered
     * devices by the user
     * 
     * @return ResponseInterface
     */
    public function get_devices() :ResponseInterface
    {
        $response = Request::get($this->config->getRoute('devices', 'get_devices'));

        return new Response($response);
    }

}