<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\HelloMAil;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $email = $request->user()->email;


        Mail::to($email)->send(new HelloMail());

        return redirect()->back()->with('status', 'E-mail envoyé avec succès !');
    }
}
