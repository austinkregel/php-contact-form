<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Message as MailMessage;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
            'name'    => 'required',
            'email'   => 'required',
        ]);

        $message = Message::create($request->all());

        Mail::to('guy-smiley@example.com')
            ->send(new MailMessage($message));

        return [
            'id'      => $message->id,
            'message' => 'Message recieved! We\'ll get back to you soon!',
        ];
    }
}
