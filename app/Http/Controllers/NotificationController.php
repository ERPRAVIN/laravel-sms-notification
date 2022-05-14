<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class NotificationController extends Controller
{
    public function sendSmsNotificaition()
    {
        //api refrence
        //https://dashboard.nexmo.com/getting-started/sms  
        // $basic  = new \Vonage\Client\Credentials\Basic('Nexmo key', 'Nexmo secret');

        
        $basic  = new \Vonage\Client\Credentials\Basic("4e394b44", "NdzFte17DLgqsOH8");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("918176924465", 'PRAVIN', 'A text message sent using the Nexmo SMS API')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}