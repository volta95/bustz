<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Bus;
use App\Staff;
use Illuminate\Support\Facades\Auth;
class BusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->role_id==1){
        $buses = Bus::get();
        $i=1;
        return view('admin.buses.index', ['buses'=> $buses,'i'=>$i]);
    }
     elseif(Auth::user()->role_id==2){
        $i=1;
    $Staff=Staff::where('user_id',Auth::user()->id)->first();
    $buses=Bus::where('company_id',$Staff->company_id)->get();
    //dd($buses);
    return view('busowner.buses.index', ['buses'=> $buses,'i'=>$i]);

    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //Retriev all companies
        if(Auth::user()->role_id==2){
        $Staff=Staff::where('user_id',Auth::user()->id)->first();
        $company=Company::where('id',$Staff->company_id)->first();
          //show form into view
          return view('busowner.buses.create',['company'=> $company]);
        }
        else{
            return back()->withInput()->with('errors', 'Please register company first before adding busses');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if(Auth::user()->role_id==2){


                $Bus = Bus::create([
                    'company_id' => $request->input('company_id'),
                    'plate_no' => $request->input('plate_no'),
                    'model' => $request->input('model'),
                    'status'=>0,
                    'image'=> 'bus.jpg',
                    'bustype' => $request->input('bustype'),
                    'seat' => $request->input('seat'),

                ]);

            }



            if($Bus){
                return redirect()->route('buses.show', ['Bus'=> $Bus->id])
                ->with('success' , 'Bus created successfully');
            }



            return back()->withInput()->with('errors', 'Error creating new Bus');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bus $Bus)
    {
        //show single Bus
        $image='images/';
        $Bus=Bus::where('id',$Bus->id)->first();
        if(Auth::user()->role_id==1){

        return view('admin.buses.show',['Bus'=>$Bus,'image'=>$image]);
        }
        elseif(Auth::user()->role_id==2){
            return view('busowner.buses.show',['Bus'=>$Bus]);
        }

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
        if(Auth::user()->role_id==2){
        $Bus=Bus::where('id',$id)->first();
        return view('busowner.buses.edit',['Bus'=>$Bus]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(bus $bus)
    {
        if(Auth::user()->role_id==1){
            $Bus=Bus::where('id',$bus->id)->update([
                'status'=>1
                ]);

                if($Bus){
                    return redirect()->route('buses.show',['bus'=>$bus->id])->with('success',
                    $bus->plate_no.'of'. $bus->company->name. ' confirmed');
                }
            }
    }
   /* public function confirm( bus $bus)
    {
      if(Auth::user()->role_id==1){
        $bus=Bus::where('id',$bus->id)->update([
            'status'=>1
            ]);

            if($bus){
                return redirect()->route('buses.show',['bus'=>$bus->id])->with('success',
                $bus->plate_no.'of'. $bus->company->name. ' confirmed');
            }
        }
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bus $Bus)
    {
        //delete Bus
        $findBus=Bus::find($Bus->id);
        if($findBus->delete()){
            return redirect()->route('buses.index')->with('success','Bus deleted successfully');
        }
        return back()->withInput()->with('error','Bus could not deleted');
    }
}
