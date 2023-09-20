<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\TwiML\VoiceResponse;
use Twilio\Jwt\ClientToken;

class TwilioController extends Controller
{
    public function call(){
        // require_once 'vendor/autoload.php'; // Include the Twilio PHP library

        // Your Twilio Account SID and Auth Token
        $accountSid = 'ACfce17b569210699908ac8ccf4d44f004';
        $authToken = '643451d0575d7bac14b8301f84f5a1a9';


        // Initialize Twilio
        $twilio = new Client($accountSid, $authToken);
      
        // Recipient's phone number (to whom the call will be made)
        $recipientPhoneNumber = '+917719462335'; // Replace with the recipient's actual phone number

        // Your Twilio phone number (the number from which the call will originate)
        $yourPhoneNumber = '+12512202404'; // Replace with your Twilio phone number

        
        try {
            // Create the voice call
        $call = $twilio->calls->create(
            $recipientPhoneNumber,
            $yourPhoneNumber,
               // recipient number can be skipped here as we are giving recipient number in voice.xml too
            array(
                'url' => ' https://6e20-59-144-161-251.ngrok-free.app/sendgrid-call/voice.xml', // URL to your TwiML script
                'applicationSid' => 'APbf89e185b3fe02dac344b5b635bb3d0b' // SID of your TwiML Application
            )
        );
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        // echo "here";
        // die;
        echo "Direct Call SID: " . $call->sid;
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
