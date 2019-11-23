<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Book;
use Token;
use PDF;
use App\Customer;
use Illuminate\Support\Facades\Input as IlluminateInput;
use Illuminate\Support\Facades\Validator;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proceed(Request $request)
    {
        //check if seat is available

        $id= $request->input('schedule');
        $schedule=Schedule::where('id',$id)->first();
        $seats = $request->input('seats');
        $seat_no=count($seats);
        return view('payments',['schedule'=>$schedule,'i'=>0,'j'=>0,'no'=>$seat_no,'seats'=>$seats]);
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

        $books=[];
        $res=null;
         $no=count($request->input('fname'));


         //return $request->input('fname.'.1);
         $decision=$request->input('decision');

         for($i=1;$i<=$no;$i++) {
             if($decision==$i){
                $Customer = Customer::create([
                    'fname' => $request->input('fname.'.$i),
                    'lname' => $request->input('lname.'.$i),
                    'email' => $request->input('email.'.$i),
                    'phone' => $request->input('phone.'.$i),
                ]);
                break;
        } elseif($decision=='none'){
            $Customer = Customer::create([
                'fname' => $request->input('customer_fn'),
                'lname' => $request->input('customer_ln'),
                'email' => $request->input('customer_email'),
                'phone' => $request->input('customer_phone'),
            ]);
            break;
        }

            }

             if($Customer){

              for($i=1;$i<=$no;$i++) {
                  # check if seat is available...
                  $matchThese=[
                    'seatno'=> $request->input('seat.'.$i),
                    'schedule_id'=> $request->input('schedule')
                ];
                  $check=Book::where($matchThese)->count();
                  if($check<1){
                    $token = Token::Unique('books', 'token', 7);

                $books[$i]= Book::create([
                'fname' => $request->input('fname.'.$i),
                'lname' => $request->input('lname.'.$i),
                'email' => $request->input('email.'.$i),
                'phone' => $request->input('phone.'.$i),
                'seatno' => $request->input('seat.'.$i),
                'price' => $request->input('price'),
                'token' => $token,
                'schedule_id' => $request->input('schedule'),
                'customer_id'=>$Customer->id,
                'broading_point'=>'Ubungo',
                'status'=>0,
            ]);

        } else{
            return back()->withInput()->with('errors', 'selected seat is not available');
        }
            }

            $no=count($books);
            $price = $request->input('price');
            $number=($price/2300)*$no;
            $pay=number_format($number, 2);
                return view('invoice') ->with(['books'=>$books,'no'=>$no,'pay'=>$pay,'Customer'=>$Customer,'i'=>1]);


        }



            return back()->withInput()->with('errors', 'Error creating new Company');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

$booked=Book::where('schedule_id',$id)->get('seatno');
$count=count($booked);

 $schedule=Schedule::where('id',$id)->first();
 $t_seat=$schedule->bus_route->bus->seat;
 $p_seat=$t_seat-6;
 $rows=($p_seat/4)+1;

            $seatLetter='A';
            $seatNo='1';
      $seats=  '
      <div class="row">
  <div class="col-md-2 col-lg-2 col-sm-2"></div>
  <div class="col-md-2 col-lg-2 col-sm-2"></div>
  <div class="col-md-2 col-lg-2 col-sm-2"></div>
  <div class="col-md-2 col-lg-2 col-sm-2"></div>
  <div class="col-md-2 col-lg-2 col-sm-2">
          <div id="" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" >Driver</div>
  </div></br></br>
</div>
<div class="row">
  <div class="col-md-2 col-lg-2 col-sm-2">
          <div id="" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seat-icon">staff</div>
  </div>

  <div class="col-md-2 col-lg-2 col-sm-2">

  </div>

  <div class="col-md-2 col-lg-2 col-sm-2">

  </div>

  <div class="col-md-2 col-lg-2 col-sm-2">

  </div>
  <div class="col-md-2 col-lg-2 col-sm-2">

  </div>
</div>';

for($i=1;$i<=$rows;$i++){


$seats.='<div class="row">';

for($j=1;$j<6;$j++){

if($j==3){
if($i!=$rows){
  $seats.='<div class="col-md-2 col-lg-2 col-sm-2"></div>';

}else{
  $seats.='<div class="col-md-2 col-lg-2 col-sm-2 ">
  <input type="button" id="'.$seatLetter.'-'. $seatNo.'" name="'.$seatLetter.'-'. $seatNo.'" value="'.$seatLetter.'-'. $seatNo.'" class="st seat-icon"/>

</div>';

}

}else{
    if($count>=1){


 foreach($booked as $book){
if($book->seatno==$seatLetter.'-'. $seatNo){
    $seats.='<div class="col-md-2 col-lg-2 col-sm-2 ">
    <div id="'.$seatLetter.'-'. $seatNo.'" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class=" booked">'.$seatLetter.'-'. $seatNo.'</div>
    </div>';

break;
}
else{
    continue;
}
 }
 if($book->seatno==$seatLetter.'-'. $seatNo){
    $seatNo++;
     continue;
 }
}
            $seats.='<div class="col-md-2 col-lg-2 col-sm-2 ">
            <input type="button" id="'.$seatLetter.'-'. $seatNo.'" name="'.$seatLetter.'-'. $seatNo.'" value="'.$seatLetter.'-'. $seatNo.'" class="st seat-icon"/>
            </div>';
            $seatNo++;
        }




}


$seats.='</div>';
$seatLetter++;
$seatNo=1;
      }


      return view('booking',['seats'=>$seats,'schedule'=>$schedule]);
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
    public function payment(Request  $request)
    {
        //
        $ticket=[];
        $no=count($request->input('id'));

        for($i=1;$i<=$no;$i++) {
        $book=$request->input('id.'.$i);

            $pay=Book::where('id',$book)->update([
                'status'=>1
            ]);

            $ticket[$i]=Book::where('id',$book)->first();



        }
        //return $ticket;
        return  view('ticket',['ticket'=>$ticket]);
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

        public function form()

    {

return view('myticket');



    }

    public function search(Request  $request)
    {
        //
        $token=$request->input('token');
        $matchThese=[
            'token'=> $token,
            'status'=> 1
        ];
        $ticket['1']=Book::where($matchThese)->first();

    //return $ticket;
    if($ticket){
    return  view('ticket',['ticket'=>$ticket]);
    }
    else{

    }
}
    }

