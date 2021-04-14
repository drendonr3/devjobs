<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $notificaciones = Auth::user()->unreadNotifications;
        Auth::user()->unreadNotifications->markAsRead();

        return view('notificaciones.index',compact('notificaciones'));
    }
}
