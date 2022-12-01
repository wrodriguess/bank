<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getOrderById($transactionId)
    {
        return Transaction::find($transactionId);
    }

    public function createOrder(array $transactionDetails)
    {
        return Transaction::create($transactionDetails);
    }
}
