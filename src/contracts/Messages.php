<?php

/**
 * Messages service class
 *
 * @author      Alexandre Brito <britoalexandre549@gmail.com>
 * @copyright   Copyright (c) alexcrisbrito
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/alexcrisbrito/culusms-php
 */


namespace alexcrisbrito\culusms\contracts;


use alexcrisbrito\culusms\Config;
use alexcrisbrito\culusms\helpers\ValidationHelper;
use alexcrisbrito\culusms\interfaces\ResponseInterface;
use alexcrisbrito\culusms\http\Request;
use alexcrisbrito\culusms\http\Response;
use Exception;

class Messages
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

    public function send(array $data) : ResponseInterface
    {
        try {
            $data['phone'] = ValidationHelper::formatNumber($data['phone']);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        $response = Request::get($this->config->getRoute('messages','send'), $data);

        return new Response($response);
    }

    public function get_pending(int $device = 1) :ResponseInterface
    {
        $response = Request::get($this->config->getRoute('messages', 'get_pending'), compact([
            "device",
        ]));

        return new Response($response);
    }

    public function get_sent(array $data = []) :ResponseInterface
    {
        $response = Request::get($this->config->getRoute('messages', 'get_sent'), $data);

        return new Response($response);
    }

    public function get_received(array $data = []) :ResponseInterface
    {
        $response = Request::get($this->config->getRoute('messages', 'get_received'), $data);

        return new Response($response);
    }

}