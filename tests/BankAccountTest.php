<?php

use PHPUnit\Framework\TestCase;
use Bank\BankAccount;
use Bank\InvalidAmountException;
use Bank\InsufficientFundsException;

class BankAccountTest extends TestCase
{
    public function testInitialBalance()
    {
        $account = new BankAccount(500.0);
        $this->assertEquals(500.0, $account->getBalance());
    }

    public function testDepositPositiveAmount()
    {
        $account = new BankAccount(100.0);
        $account->deposit(200.0);
        $this->assertEquals(300.0, $account->getBalance());
    }

    public function testDepositNegativeAmountThrowsException()
    {
        $this->expectException(InvalidAmountException::class);
        $account = new BankAccount(100.0);
        $account->deposit(-50.0);
    }

    public function testDepositZeroThrowsException()
    {
        $this->expectException(InvalidAmountException::class);
        $account = new BankAccount(100.0);
        $account->deposit(0.0);
    }

    public function testWithdrawValidAmount()
    {
        $account = new BankAccount(500.0);
        $account->withdraw(200.0);
        $this->assertEquals(300.0, $account->getBalance());
    }

    public function testWithdrawNegativeAmountThrowsException()
    {
        $this->expectException(InvalidAmountException::class);
        $account = new BankAccount(500.0);
        $account->withdraw(-100.0);
    }

    public function testWithdrawZeroThrowsException()
    {
        $this->expectException(InvalidAmountException::class);
        $account = new BankAccount(500.0);
        $account->withdraw(0.0);
    }

    public function testWithdrawMoreThanBalanceThrowsException()
    {
        $this->expectException(InsufficientFundsException::class);
        $account = new BankAccount(300.0);
        $account->withdraw(400.0);
    }

    public function testConstructorWithNegativeInitialBalance()
    {
        $this->expectException(InvalidAmountException::class);
        new BankAccount(-100.0);
    }
}