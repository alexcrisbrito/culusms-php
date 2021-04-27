<?php

namespace alexcrisbrito\culusms\helpers;

/**
 * Validation helper class
 *
 * @author      Alexandre Brito <britoalexandre549@gmail.com>
 * @copyright   Copyright (c) alexcrisbrito
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/alexcrisbrito/culusms-php
 */


use Exception;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

class ValidationHelper
{

    /**
     * @param string $number
     * @return string
     * @throws Exception
     */
    public static function formatNumber(string $number): string
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        $phoneNumberObject = $phoneUtil->parse($number);

        /* Let's check if it's a valid number 1st */
        if ($phoneUtil->isValidNumber($phoneNumberObject))
            return str_replace('+','', $phoneUtil->format($phoneNumberObject, PhoneNumberFormat::E164));

        throw new Exception("Could not format number, try again !");
    }

}