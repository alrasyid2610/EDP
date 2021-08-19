<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from Harun Al Rasyid',
            'body' => 'This body, test send email using laravel'
        ];

        Mail::to("idrisaziz52@gmail.com")->send(new TestMail($details));
        return "Email Send";
    }
}
