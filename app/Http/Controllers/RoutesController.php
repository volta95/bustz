<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use App\Bus_Route;
use DB;
use App\Book;
use Illuminate\Support\Facades\Auth;
use App\Schedule;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
              //show all routes

              $Route=Route::get();
              return view('welcome', ['Routes'=>$Route]);
    }

    public function index()
    {
        //
        $route=Route::get();
        $i=1;
        return view('admin.routes.index', ['routes'=>$route,'i'=>$i]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


      //show form into view
      return view('admin.routes.create');


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
        if(Auth::user()->role_id==1){
            $Route = Route::create([
                'route_from' => $request->input('route_from'),
                'route_to' => $request->input('route_to'),
                'price_min'=>$request->input('price_min'),
                'price_max'=>$request->input('price_max')
            ]);


            if($Route){
                return redirect()->route('routes.show', ['Route'=> $Route->id])
                ->with('success' , 'Route created successfully');
            }

        }

            return back()->withInput()->with('errors', 'Error creating new Route');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Route $Route)
    {
        //show single Route

        $Route=Route::where('id',$Route->id)->first();
        return view('admin.routes.show',['route'=>$Route]);
    }

  /*  public function search(Request $request)
    {
        //search route id based on users request
        $matchThese=[
                    'route_from'=>$request->input('q'),
                    'route_to'=>$request->input('d')
                ];
        $Route=Route::where($matchThese)->first();
    $date=$request->input('date');

        //search route scheduling based on user request


        return view('search', ['routes'=>$Route,'date'=>$date]);
    }*/

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
    public function destroy(Route $route)
    {
        //delete Route
        $findRoute=Route::find($route->id);
        if($findRoute->delete()){
            return redirect()->route('routes.index')->with('success','Route deleted successfully');
        }
        return back()->withInput()->with('error','Route could not deleted');
    }
    public function search(Request $request)
    {
        //search route id based on users request
        $route_from = $request->input('q');
        $route_to = $request->input('d');
        $date=$request->input('date');

        //find route
        $matchThese=[
            'route_from'=> $route_from,
            'route_to'=> $route_to
        ];
        $route=Route::where(
            $matchThese
        )->first();


        $bus_routes=Bus_Route::where('route_id',$route->id)->get();

      foreach($bus_routes as $bus_route){
          $schedules=Schedule::where('bus_route_id',$bus_route->id)->get();

          foreach($schedules as $schedule){
          $ticket=Book::where('id',$schedule->id)->count();
          if($ticket>=$bus_route->bus->seat){
              continue;
          } else{
            $matchThese=[
                'bus_route_id'=> $bus_route->id,
                'dep_date'=> $date
            ];
          $availables=Schedule::where( $matchThese)->get();
          }
        }
      }


        //search route scheduling based on user request

                //return $route->plate_no;
        //return $available[0]->plate_no;
        return view('search', ['availables'=>$availables]);




    }

}
