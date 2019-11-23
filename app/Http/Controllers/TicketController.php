<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use DB;

class TicketController extends Controller
{
    public function book($id)
    {
        $bus = DB::table('buses')->where('id', $id)->get();

        $ticket = new Ticket();
        $ticket->busID = $id;
       $ticket->uID = Auth::id();
        $ticket->name = request('name');
        $ticket->phone = request('phone');
        $ticket->email = request('email');
        $ticket->seats = request('seats');

        foreach ($bus as $bus) {
            $number = $bus->availability;
            if ($number < 1) {
                $available = 0;
            } else {
                $available = 1;
                $number = $number - request('seats');
                //$number--;
                $bus->availability = $number;
                $bus->save();
            }

            $ticket->booking_date = date('Y-m-d');

            $ticket->travel_date = $bus->date;
        }
        $ticket->save();

        /*$accountSid = env('TWILIO_ACCOUNT_SID');
        $authToken = env('TWILIO_AUTH_TOKEN');
        $twilioNumber = env('TWILIO_NUMBER');

        $message = "Pink Elephants and Happy Rainbows";

        $client = new Client($accountSid, $authToken);

        try {
            $client->messages->create(
                $to,
                [
                    "body" => $message,
                    "from" => $twilioNumber
                    //   On US phone numbers, you could send an image as well!
                    //  'mediaUrl' => $imageUrl
                ]
            );
            Log::info('Message sent to ' . $twilioNumber);
        } catch (TwilioException $e) {
            Log::error(
                'Could not send SMS notification.' .
                ' Twilio replied with: ' . $e
            );
        }

            /*$sid = "AC79ce3f10c75ab2d7f5be866d09e9c7ef"; // Your Account SID from www.twilio.com/console
            $token = "a7092486f73090fb3bc8a5e8d9a5d413"; // Your Auth Token from www.twilio.com/console
            $fromNumber = "+18599037961";*/

        //$twilio = new \Aloha\Twilio\Twilio($sid, $token, $fromNumber);
        //$twilio->message('+919483722078', 'Pink Elephants and Happy Rainbows');

        return view('tickets.booked')->with(compact('ticket', 'bus', 'available'));
    }
}
