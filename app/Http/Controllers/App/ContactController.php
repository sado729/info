<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact;
use App\Models\Information;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    protected function send(Contact $request)
    {
        $information = Information::first();
        Mail::send('app.mails.contact-message',[
            'messages' => $request->message,
            'phone' => $request->phone,
            'email' => $request->email,
            'name' => $request->name,
            'surname' => $request->surname,
        ],function($mail) use ($request,$information){
            $mail->from($request->email,$request->name);
            $mail->to($information->email);
        });

        return redirect()->back()->with('success','Mesajınız müvəffəqiyyətlə göndərilmişdir !');
    }
}
