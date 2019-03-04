<?php

namespace App\Http\Controllers;

use App\Events\EventNewNotification;
use App\Message;
use App\Notifications\MessageSent;
use App\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','!=',auth()->id())->get();
        return view('home',compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'recipient_id'=>'required|exists:users,id',
            'body'=> 'required'
        ]);
        $message = Message::create([
            'sender_id'=> auth()->id(),
            'recipient_id'=> request('recipient_id'),
            'body' => request('body')
        ]);
        $recipient = User::find(request('recipient_id'));
        $recipient->notify(new MessageSent($message));

       event(new EventNewNotification($message)); 
        
        return redirect()->back()->withInfo('Notificacion enviada correctamente');
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('messages.show',compact('message'));
    }
}
