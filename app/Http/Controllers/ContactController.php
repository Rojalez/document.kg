<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;

class ContactController extends Controller
{
    public function index() {
        return view('contact.index');
    }

    public function send_message(Request $request)
    {

        $data = ['name' => $request->name , 'email' => $request->email , 'text' => $request->text ];

        Mail::send('emails.email', $data, function ($message) use ($data)
        {
            $message->from($data['email'], $data['name']);
            $message->to('beknazarnurkulov@gmail.com', 'Admin')
                ->subject('Обратная связь - document.kg');
        });

        return redirect()
            ->back()
            ->with('success', 'Спасибо за обращение!');

    }

}


