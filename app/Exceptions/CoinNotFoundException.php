<?php

namespace App\Exceptions;

use Exception;

class CoinNotFoundException extends Exception
{
    protected $message = 'Coin not found.';
    protected $code = 404;

    public function __construct($message = null, $code = null, Exception $previous = null)
    {
        if ($message !== null) {
            $this->message = $message;
        }

        if ($code !== null) {
            $this->code = $code;
        }

        parent::__construct($this->message, $this->code, $previous);
    }
}
