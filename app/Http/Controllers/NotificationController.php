<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Notifications;

class NotificationController extends Controller
{
    public function index()
    {
        // Fetch all unread notifications for the logged-in user
        $notifications = auth()->notifications()->unreadNotifications;

        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {

        $notification = auth()->user()->notifications()->find($id);
        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back();
    }
}
