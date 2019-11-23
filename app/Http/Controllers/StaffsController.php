<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Staff;
use App\Role;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->role_id==2){
            $staff=Staff::where('user_id',Auth::user()->id)->first();
            $company_id=$staff->company_id;
            $staffs=Staff::where('company_id',$company_id)->get();
            $roles=Role::get();
            $i=1;
            return view('busowner.staffs.index',['staffs'=>$staffs,'i'=>$i,'roles'=>$roles]);
        }
        else{

        }


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $staff=Staff::where('user_id',Auth::user()->id)->first();
        $company_id=$staff->company_id;

        $User=User::create([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),

            'phone_number' => $request->input('phone'),
            'email' => $request->input('email'),
            'role_id'=>$request->input('role'),
            'password' => Hash::make('123456'),
            'gender' => $request->input('gender'),
        ]);

        Staff::create([
        'user_id' => $User->id,
        'company_id' => $company_id,
        ]);
        return back()->withInput()->with('success', 'staff registered successful');
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
