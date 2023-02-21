<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usertype;
use Illuminate\Support\Facades\Hash;

class UserstypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Usertype::select('*')->get();
     
        session()->flash('message', 'Deleted Successfuly.');
        return view("user_type/usertype", ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view("user_type/add");
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
                // extra some validations
                // 'required|regex:/(01)[0-9]{9}/' - for mobile 
                // 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/' - for address

                'usertypename' => 'required',
            ]
        );
        $users = new Usertype();
        $users->usertype = $request->input('usertypename');
        $users->save();
        return redirect("/userstype")->with('status' , "Inserted Successfuly");
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
        $users = Usertype::where('id',$id)->first();
        return view('/users/update', ['users' => $users]);
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
                // extra some validations
                // 'required|regex:/(01)[0-9]{9}/' - for mobile 
                // 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/' - for address

                'username' => 'required',
                'email' => 'required|email',
                
            ]
        );
        
        $pwd = $request->input('password');
        if($pwd){
            $users = Usertype::where('id', $id)
            ->update(
            [
                'username'=>$request->input('username'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
            ]);
        }
        else{
            $users = Usertype::where('id', $id)
        ->update(
        [
            'username'=>$request->input('username'),
            'email'=>$request->input('email'),
        ]);
        }
     if($users)
     { 
         return redirect("/users")->with('status', "Inserted Successfuly");
     }
     else
     {
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
        $result = Usertype::where('id',$id)->delete();
        if($result)
        {
            return redirect("/userstype");
            session()->flash('message', 'Deleted Successfuly.');
        }
        else
        {
            print_r("An error Occurd while deleting");
        }
    }
 
}
