<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Usertype;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::select('*')->get();
        session()->flash('message', 'Deleted Successfuly.');
        return view("users/user", ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Usertype::select('*')->get();
        return view("users/add", ['users' => $users]);
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

                'username' => 'required',
                'mobile' => 'required|regex:/[0-9]/',
                'belongs' => 'required',
                'refference' => 'required',
                'user_type' => 'required',
                'comment' => 'required',


            ]
        );
        $users = new Users();
        $users->username = $request->input('username');
        $users->mobile = $request->input('mobile');
        $users->belongs = $request->input('belongs');
        $users->refference = $request->input('refference');
        $users->user_type = $request->input('user_type');
        $users->comment = $request->input('comment');
        $users->save();
        return redirect("/users")->with('status', "Inserted Successfuly");
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
        $users = Users::where('id', $id)->first();
        $types = Usertype::select('*')->get();
        return view('/users/update', ['users' => $users, 'types' => $types]);
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
                'mobile' => 'required|regex:/[0-9]/',
                'belongs' => 'required',
                'refference' => 'required',
                'user_type' => 'required',
                'comment' => 'required',

            ]
        );
        $users = User::where('id', $id)
            ->update(
                [
                    'username' => $request->input('username'),
                    'mobile' => $request->input('mobile'),
                    'belongs' => $request->input('belongs'),
                    'refference' => $request->input('refference'),
                    'user_type' => $request->input('user_type'),
                    'comment' => $request->input('comment'),
                ]
            );

        if ($users) {
            return redirect("/users")->with('status', "Inserted Successfuly");
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
            return redirect("/users");
            session()->flash('message', 'Deleted Successfuly.');
        } else {
            print_r("An error Occurd while deleting");
        }
    }
}
