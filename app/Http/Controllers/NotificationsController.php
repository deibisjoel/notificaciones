<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsController extends Controller
{
    function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
    	
    	return view('notifications.index',[
    		'unreadNotifications'=>auth()->user()->unreadNotifications,
    		'readNotifications' => auth()->user()->readNotifications
    	]);
    }

    public function update($id)
    {
    	DatabaseNotification::findOrFail($id)->markAsRead();
    	return redirect()->back()->withInfo('Notificación marcada como leída');
    }

    public function destroy($id)
    {
    	DatabaseNotification::findOrFail($id)->delete();
    	return redirect()->back()->withInfo('Notificación Eliminada correctamente');
    }

    
}
