<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Notification extends Model
{
    public function notify($title, $body, $topic){
        $client = new Client();
        $payload = array(
            "to" => "/topics/".$topic,
            "notification" => array(
                "title" => $title,
                "body" => $body,
            )
        );
        $client->post('https://fcm.googleapis.com/fcm/send', [
            'debug' => false,
            'body' => json_encode($payload),
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'key='.env("FIREBASE_KEY_INHERITED")
            ]
        ]);
    }
    public function notifyPaymentDate($token, $title, $body){
        $client = new Client();
        $payload = array(
            "to" => "/topics/".$token,
            "notification" => array(
                "title" => $title,
                "body" => $body,
            )
        );
        $client->post('https://fcm.googleapis.com/fcm/send', [
            'debug' => false,
            'body' => json_encode($payload),
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'key='.env("FIREBASE_KEY_INHERITED")
            ]
        ]);
    }
}
