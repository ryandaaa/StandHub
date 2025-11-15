<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // List notif untuk user yang login
    public function index(Request $request)
    {
        $user = $request->user();

        $notifications = Notification::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->paginate(10);

        $unreadCount = Notification::where('user_id', $user->id)
            ->unread()
            ->count();

        return view('notifications.index', [
            'notifications' => $notifications,
            'unreadCount'   => $unreadCount,
        ]);
    }

    // Tandai 1 notif sebagai read
    public function markAsRead(Request $request, Notification $notification)
    {
        $user = $request->user();

        if ($notification->user_id !== $user->id) {
            abort(403);
        }

        if (is_null($notification->read_at)) {
            $notification->update([
                'read_at' => now(),
            ]);
        }

        if ($notification->link) {
            return redirect($notification->link);
        }

        return redirect()->route('notifications.index');
    }

    // Tandai semua notif user sebagai read
    public function markAllAsRead(Request $request)
    {
        $user = $request->user();

        Notification::where('user_id', $user->id)
            ->unread()
            ->update(['read_at' => now()]);

        return redirect()
            ->route('notifications.index')
            ->with('success', 'Semua notifikasi telah ditandai terbaca.');
    }
}
