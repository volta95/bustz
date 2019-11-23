<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Bus;
use App\Route;
use App\Staff;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $L=0; $S=0; $N=0;
        if( Auth::user()->role_id==1){
        $companies=Company::latest()->get();
        $routes=Route::get();
        $buses=Bus::get();
        foreach($buses as $bus){
            if($bus->bustype=='luxury'){
                ++$L;
            } elseif($bus->bustype=='semi luxury'){
                ++$S;
            } elseif($bus->bustype=='normal'){
                ++$N;
            }
        }
        return view('admin/home',['companies'=>$companies,'L'=>$L,'S'=>$S,'N'=>$N,'routes'=>$routes,'i'=>1,'j'=>1]);
    }
    elseif( Auth::user()->role_id==2){

        $admin=Staff::where('user_id',Auth::user()->id)->first();
        $staffs=Staff::where('company_id',$admin->company_id)->get();
        $buses=Bus::where('company_id',$admin->company_id)->get();
        foreach($buses as $bus){
            if($bus->bustype=='luxury'){
                ++$L;
            } elseif($bus->bustype=='semi luxury'){
                ++$S;
            } elseif($bus->bustype=='normal'){
                ++$N;
            }
        }
        return view('busowner/home',['staffs'=>$staffs,'L'=>$L,'S'=>$S,'N'=>$N,'buses'=>$buses,'i'=>1,'j'=>1]);
    }

    elseif( Auth::user()->role_id==3){
        return view('user/home',['staff'=>$staffs,'buses'=>$buses,'i'=>1,'j'=>1]);
    }
    else{
        return view('login');
    }
    }
}
