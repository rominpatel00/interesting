<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Usertype;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transactions = DB::table('transaction')
            ->join('users as u1', 'u1.id', '=', 'transaction.provider')
            ->join('users as u2', 'u2.id', '=', 'transaction.taker')
            ->join('users as u3', 'u3.id', '=', 'transaction.refference')
            ->select('transaction.*', 'u1.username as providername', 'u2.username as takername', 'u3.username as refferencename')
            ->get();
        session()->flash('message', 'Deleted Successfuly.');
        return view("transaction/transaction", ['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Users::select('id', 'username as provider')
            ->where('user_type', 2)
            ->get();
        $takers = Users::select('id', 'username as taker')
            ->where('user_type', 3)
            ->get();
        $refferences = Users::select('id', 'username as refference')
            ->where('user_type', 4)
            ->get();
        return view("transaction/add", ['providers' => $providers, 'takers' => $takers, 'refferences' => $refferences]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [

                'provider' => 'required',
                'Taker' => 'required',
                'amount' => 'required|regex:/[0-9]/',
                'percent' => 'required|regex:/[0-9]/',
                'date' => 'required',


            ]
        );
        $transaction = new Transaction();
        $transaction->provider = $request->input('provider');
        $transaction->refference = $request->input('refference');
        $transaction->Taker = $request->input('Taker');
        $transaction->amount = $request->input('amount');
        $transaction->percent = $request->input('percent');
        $transaction->date = $request->input('date');
        $transaction->duration = $request->input('duration');
        $transaction->intrest_lap = $request->input('intrest_lap');
        $transaction->save();
        return redirect("/transaction")->with('status', "Inserted Successfuly");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $transaction = DB::table('transaction')
            ->join('users as u1', 'u1.id', '=', 'transaction.provider')
            ->join('users as u2', 'u2.id', '=', 'transaction.taker')
            ->join('users as u3', 'u3.id', '=', 'transaction.refference')
            ->where('transaction.id', $id)
            ->select('transaction.*', 'u1.username as providername', 'u2.username as takername', 'u3.username as refferencename')
            ->first();

        $refferences = Users::select('id', 'username')
            ->where('user_type', 4)
            ->get();

        return view('transaction/update', ['transaction' => $transaction, 'refferences' => $refferences]);
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
        $request->validate(
            [
      
                'amount' => 'required|regex:/[0-9]/',
                'percent' => 'required|regex:/[0-9]/',
                'date' => 'required',
            ]
        );

        $transaction = Transaction::where('id', $id)
        ->update(
            [
                'refference' => $request->input('refference'),
                'amount' => $request->input('amount'),
                'percent' => $request->input('percent'),
                'date' => $request->input('date'),
                'duration' => $request->input('duration'),
                'intrest_lap' => $request->input('intrest_lap'),
            ]
        );
        if ($transaction) {
            return redirect("/transaction")->with('status', "Inserted Successfuly");
        } else {
            print_r("An error occurd");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Users::where('id', $id)->delete();
        if ($result) {
            return redirect("/transaction");
            session()->flash('message', 'Deleted Successfuly.');
        } else {
            print_r("An error Occurd while deleting");
        }
    }
}
