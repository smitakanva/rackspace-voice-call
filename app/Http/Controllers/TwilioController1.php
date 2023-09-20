<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class TwilioController extends Controller
{

    public function index(){
        return view('voicecall');
    }
    public function makeCall(Request $request)
    {
        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));

        $call = $twilio->calls->create(
            $request->input('to'),
            config('services.twilio.from'),
            [
                'url' => 'https://6e20-59-144-161-251.ngrok-free.app/sendgrid-call/voice.xml'
            ]
        );

        return $call;
    }

    public function handleVoiceRequest(Request $request)
{
    $response = new \Twilio\TwiML\VoiceResponse();

    // $response->say('Hello, this is a Twilio call.');

    return response($response, 200)
        ->header('Content-Type', 'text/xml');
}

}

