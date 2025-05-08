<?php

require_once 'vendor/autoload.php';

use Bank\BankAccount;
use Bank\InvalidAmountException;
use Bank\InsufficientFundsException;

try {
    $account = new BankAccount(1000.0);

    echo "Текущий баланс: {$account->getBalance()}\n";

    $account->deposit(500.0);
    echo "После депозита: {$account->getBalance()}\n";

    $account->withdraw(200.0);
    echo "После снятия: {$account->getBalance()}\n";

    // Тестирование ошибок:
    $account->withdraw(2000.0); // Недостаточно средств
} catch (InvalidAmountException $e) {
    echo "Ошибка ввода суммы: " . $e->getMessage() . "\n";
} catch (InsufficientFundsException $e) {
    echo "Ошибка операции: " . $e->getMessage() . "\n";
}