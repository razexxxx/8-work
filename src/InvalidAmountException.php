<?php

namespace Bank;

class InvalidAmountException extends \Exception
{
    public function __construct($message = "Сумма должна быть положительной.")
    {
        parent::__construct($message);
    }
}