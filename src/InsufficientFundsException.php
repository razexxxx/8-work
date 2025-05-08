<?php

namespace Bank;

class InsufficientFundsException extends \Exception
{
    public function __construct($message = "Недостаточно средств для снятия.")
    {
        parent::__construct($message);
    }
}