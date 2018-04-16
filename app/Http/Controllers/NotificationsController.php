<?php

namespace App\Http\Controllers;

use Auth;

class NotificationsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('notifications.index', compact('user'));
    }
}
