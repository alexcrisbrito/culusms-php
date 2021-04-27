<?php


/**
 * Address Book service class
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

class AddressBook
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
     * Create a new
     * contact
     *
     * @param array $data
     * @return ResponseInterface
     */
    public function create_contact(array $data) :ResponseInterface
    {
        try {
            $data['phone'] = ValidationHelper::formatNumber($data['phone']);
        }catch(\Exception $e) {
            echo $e->getMessage();
            exit;
        }

        $response = Request::post($this->config->getRoute('address_book', 'create_contact'), $data);
        return new Response($response);
    }

    /**
     * Create a new
     * contact group
     *
     * @param string $name
     * @return ResponseInterface
     */
    public function create_group(string $name) :ResponseInterface
    {
        $response = Request::post($this->config->getRoute('address_book', 'create_group'), compact("name"));
        return new Response($response);
    }


    /**
     * Get all contacts
     *
     * @return ResponseInterface
     */
    public function get_contacts() :ResponseInterface
    {
        $response = Request::get($this->config->getRoute('address_book', 'get_contacts'));
        return new Response($response);
    }

    /**
     * Get all group
     *
     * @return ResponseInterface
     */
    public function get_groups() :ResponseInterface
    {
        $response = Request::get($this->config->getRoute('address_book', 'get_groups'));
        return new Response($response);
    }


    /**
     * Delete a contact
     *
     * @param int $id
     * @return ResponseInterface
     */
    public function delete_contact(int $id) :ResponseInterface
    {
        $response = Request::get($this->config->getRoute('address_book', 'delete_contact'), compact("id"));
        return new Response($response);
    }

    /**
     * Delete a contact
     * group
     *
     * @param int $id
     * @return ResponseInterface
     */
    public function delete_group(int $id) :ResponseInterface
    {
        $response = Request::get($this->config->getRoute('address_book', 'delete_group'), compact("id"));
        return new Response($response);
    }
}