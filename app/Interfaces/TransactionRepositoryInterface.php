<?php

namespace App\Interfaces;

interface TransactionInterface
{
    public function getTransactionById($transactionId);
    public function createTransaction(array $transactionDetails);
}
