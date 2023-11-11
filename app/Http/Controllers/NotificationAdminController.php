<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NotificationAdminController extends Controller
{
    public function fetchNotificationCount(Request $request)
    {
        $count = AdminNotification::where('status', 'unread')->count();

        return response()->json(['count' => $count]);
    }
    public function fetchNotifications()
    {
        $userId = auth()->user()->id;
        $notifications =  AdminNotification::get();

        return response()->json(['notifications' => $notifications]);
    }
    public function marksAsViewed(Request $request)
    {
        try {
            AdminNotification::query()->update(['status' => 'read']);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
    public function fetchNotificationsAdmin()
    {
        $newBookings = $this->fetchBookingsForCurrentDate();

        foreach ($newBookings as $booking) {
            $existingNotification = AdminNotification::where('bookingID', $booking->id)
                ->where('notification_type', 'session-today')
                ->first();

            if (!$existingNotification) {
                $notification = new AdminNotification();
                $notification->notification_type = 'session-today';
                $notification->bookingID = $booking->id;
                $notification->save();
            }
        }
    }

    private function fetchBookingsForCurrentDate()
    {
        $currentDate = now()->format('Y-m-d');
        return Booking::whereDate('session_date', $currentDate)
            ->where('status', 'Approved')
            ->get();
    }
}
