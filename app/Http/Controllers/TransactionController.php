<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payer = User::find($request->payer_id);
        $payee = User::find($request->payee_id);

        if (!$payer || !$payee || $payer->wallet->balance < $request->value) {
            // return Response::json('Impossivel realizar operação', 400);
            return "Impossivel realizar opereção";
        }

        $payersWallet = Wallet::find($payer->wallet->id);
        $payersWallet->balance -= $request->value;
        $payersWallet->save();

        // Aumentar saldo de destinatário
        $payeesWallet = Wallet::find($payee->wallet->id);
        $payeesWallet->balance += $request->value;
        $payeesWallet->save();


        return Transaction::create([
            'payer_id' => $request->payer_id,
            'payee_id' => $request->payee_id,
            'value' => $request->value,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);
        $transaction['payer'] = $transaction->payer;
        $transaction['payee'] = $transaction->payee;
        return $transaction;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
