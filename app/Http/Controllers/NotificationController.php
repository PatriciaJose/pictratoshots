<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Notification;
use App\Models\Weather;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function fetchNotificationCount(Request $request)
    {
        $count = Notification::where('clientID', auth()->user()->id)
            ->where('status', 'unread')
            ->count();

        return response()->json(['count' => $count]);
    }
    public function fetchNotifications()
    {
        $userId = auth()->user()->id;
        $notifications = Notification::where('clientID', $userId)->get();

        return response()->json(['notifications' => $notifications]);
    }

    public function fetchWeatherDetails(Request $request)
    {
        $weatherID = $request->input('weatherID');

        $weatherDetails = Weather::find($weatherID);

        if ($weatherDetails) {
            $response = [
                'temperature' => $weatherDetails->temperature,
                'weather_description' => $weatherDetails->weather_description,
                'notes' => $weatherDetails->notes,
            ];
            return response()->json($response);
        } else {
            return response()->json(['error' => 'Weather details not found'], 404);
        }
    }
    public function fetchBookingDetails(Request $request)
    {
        $bookingID = $request->input('bookingID');
        $booking = Booking::find($bookingID);

        if ($booking) {
            $response = [
                'disapproval_reason' =>  $booking->disapproval_reason,
            ];
            return response()->json($response);
        } else {
            return response()->json(['error' => 'Booking details not found'], 404);
        }
    }
}
