<?php

namespace Bank;

class BankAccount
{
    private float $balance;

    public function __construct(float $initialBalance)
    {
        if ($initialBalance < 0) {
            throw new InvalidAmountException("Начальный баланс не может быть отрицательным.");
        }
        $this->balance = $initialBalance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidAmountException();
        }
        $this->balance += $amount;
    }

    public function withdraw(float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidAmountException();
        }

        if ($amount > $this->balance) {
            throw new InsufficientFundsException();
        }

        $this->balance -= $amount;
    }
}