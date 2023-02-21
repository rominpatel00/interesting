<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Usertype;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $providers = DB::table('users')
            ->join('transaction as t1', 't1.provider', '=', 'users.id')
            ->select('users.id', 'users.username')
            ->distinct()
            ->get();
        $takers = DB::table('users')
            ->join('transaction as t1', 't1.taker', '=', 'users.id')
            ->select('users.id', 'users.username')
            ->distinct()
            ->get();
        $refferences = DB::table('users')
            ->join('transaction as t1', 't1.refference', '=', 'users.id')
            ->select('users.id', 'users.username')
            ->distinct()
            ->get();
        $years = DB::select('SELECT DISTINCT(YEAR(date)) as year from transaction');
        //  dd($takers);
        $month = DB::select('SELECT DISTINCT(month(date)) as month from transaction');
        //  dd($month);
        session()->flash('message', 'Deleted Successfuly.');

        return view("charts/charts", ['providers' => $providers, 'takers' => $takers, 'refferences' => $refferences, 'years' => $years, 'months' => $month]);
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

    public function getdetails(Request $request)
    {

        $data = [];
        $amount = 0;
        $query = Transaction::select('date', 'amount', 'percent');
        if ($request->provider) {
            $query = $query->where('provider', $request->provider);
        }
        if ($request->taker) {
            $query = $query->where('taker', $request->taker);
        }
        if ($request->refference) {
            $query = $query->where('refference', $request->refference);
        }
        if ($request->year) {
            $query = $query->whereYear("date", $request->year);
        }
        if ($request->month) {
            $query = $query->whereMonth("date", $request->month);
        }
        $query = $query->orderBy("date", 'ASC');

        $dt = $query->get();
     
            for ($i = 0; $i < count($dt); $i++) {   
        
                    $mytime =  date('Y-m-d');
                    $datetime1 = Carbon::createFromFormat('Y-m-d', $dt[$i]->date);
                    if(empty($dt[$i+1]->date)){
                        $datetime2 = Carbon::createFromFormat('Y-m-d', $mytime);
                    }else{
                        
                        $datetime2 = Carbon::createFromFormat('Y-m-d', $dt[$i+1]->date);
                    }
                    $interval = $datetime1->diff($datetime2);
                    $days = $interval->format('%a'); //now do whatever you like with $days
                    $date2 = $datetime2->format('Y-m-d',);

                    $amount = $amount + $dt[$i]->amount;
                    $data[$i][0] = $dt[$i]->date;
                    $data[$i][1] = $amount;
                    $data[$i+1][0] = $date2;
                    $data[$i+1][2] = (((($amount * $dt[$i]->percent) / 100) / 30) * $days);
                
                }
                // dd($data);
           
            return $data;   
    }
}
