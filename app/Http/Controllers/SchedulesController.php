<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\BusRoute;
use App\Bus_Route;
use App\Bus;
use App\Route;
use App\Staff;
use DB;
use Illuminate\Support\Facades\Auth;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff=Staff::where('user_id',Auth::user()->id)->first();
        $buses=Bus::where('company_id',$staff->company_id)->get();
        $staffs=Staff::where('company_id',$staff->company_id)->get();
        $schedules=Schedule::get();

       // $calendar = Calendar::addEvents(schedules);
        return view('busowner.schedules.index',['schedules'=>$schedules,'buses'=>$buses,'staffs'=>$staffs]);
    }

    public function getRoute($id)
    {
            //$route = DB::table("bus_route")->where("bus_id",$id);
            $route = DB::table('bus_route')->JOIN('routes','bus_route.route_id','routes.id')
            ->where('bus_route.bus_id',$id)->SELECT('route_from,route_to');
            return json_encode($route);

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
        $matchThese=[
            'route_from'=>$request->input('route_from'),
            'route_to'=>$request->input('route_to')
        ];
        $route=Route::where($matchThese)->first('id');
        $route_id=$route->id;
       $matchThese=[
            'route_id'=>$route_id,
            'bus_id'=>$request->input('bus')
        ];
        $busRoute=Bus_route::where($matchThese)->first('id');
        $driver=$request->input('driver');
        $condoctor=$request->input('condoctor');

        $Schedule = Schedule::create([
            'bus_route_id'=>$busRoute->id,
            'dep_date'=>$request->input('date'),
            'dep_time'=>$request->input('dep_time'),
            'rep_time'=>$request->input('rep_time'),
            'price'=>$request->input('price'),
            'arrive_time'=>$request->input('ari_time'),
        ]);

        $Schedule->staffs()->attach($driver);
        $Schedule->staffs()->attach($condoctor);

        return  back()->withInput()->with('success', 'schedules successful');

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
