<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    // Get notifications for the current user (admin or student)
    public function index(Request $request)
    {
        $user = session('admin_id') ? \App\Models\Admin::find(session('admin_id')) : (session('student_id') ? \App\Models\Student::find(session('student_id')) : null);
        if (!$user) {
            return response()->json(['notifications' => []]);
        }
        $notifications = $user->notifications()->latest()->limit(20)->get();
        return response()->json(['notifications' => $notifications]);
    }

    // Mark a notification as read
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->read_at = now();
        $notification->save();
        return response()->json(['success' => true]);
    }
}
