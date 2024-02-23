<?php

namespace App\Exceptions;

use Exception;

class MinimumPurchaseException extends Exception
{
    protected $message = 'O valor mínimo para compra é de 50 BRL.';
    protected $code = 422;
}
