<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Throwable;

class TransactionService
{
    public function store($request)
    {
        $payer = User::find($request->payer_id);
        $payee = User::find($request->payee_id);

        if (!$payer || !$payee || $payer->wallet->balance < $request->value) {
            return response()->json(['Erro' => 'Impossivel realizar operação'], 400);
        }

        try {
            Db::beginTransaction();

            $payersWallet = Wallet::find($payer->wallet->id);
            $payersWallet->balance -= $request->value;
            $payersWallet->save();

            $payeesWallet = Wallet::find($payee->wallet->id);
            $payeesWallet->balance += $request->value;
            $payeesWallet->save();

            $response = Transaction::create([
                'payer_id' => $request->payer_id,
                'payee_id' => $request->payee_id,
                'value' => $request->value,
            ]);

            Db::commit();

            return $response;
        } catch (Throwable $t) {
            Db::rollback();
            return "Erro: $t";
        }
    }

    public function show($id)
    {
        $transaction = Transaction::find($id);
        $transaction['payer'] = $transaction->payer;
        $transaction['payee'] = $transaction->payee;
        return $transaction;
    }
}
