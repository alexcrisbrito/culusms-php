<?php

/**
 * Response interface
 *
 * @author      Alexandre Brito <britoalexandre549@gmail.com>
 * @copyright   Copyright (c) alexcrisbrito
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/alexcrisbrito/culusms-php
 */

namespace alexcrisbrito\culusms\interfaces;


interface ResponseInterface {


    public function getStatus() :int;
    public function getResponseMessage() :string;
    public function getData();
    public function isSuccess() :bool;
    public function getResponsePayload();

}