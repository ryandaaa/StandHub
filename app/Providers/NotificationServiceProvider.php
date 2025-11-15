<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Notification;

class NotificationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        
        View::composer(['layouts.admin', 'layouts.vendor'], function ($view) {
    $user = request()->user();

    $unread = 0;
    $notifications = collect();

    if ($user) {
        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $unread = $notifications->whereNull('read_at')->count();
    }

    $view->with([
        'unreadNotifications' => $unread,
        'notifications' => $notifications
    ]);
});

    }
}
