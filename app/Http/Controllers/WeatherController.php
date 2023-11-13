<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Notification;
use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function insertWeather(Request $request)
    {
        $data = $request->validate([
            'booking_id' => 'required|integer',
            'temperature' => 'required|numeric',
            'weather_description' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $bookingId = $data['booking_id'];

        $booking = Booking::find($bookingId);

        if (!$booking) {
            return response()->json(['error' => 'Booking not found'], 404);
        }

        $weather = new Weather();
        $weather->bookingID = $bookingId;
        $weather->temperature = $data['temperature'];
        $weather->weather_description = $data['weather_description'];
        $weather->notes = $data['notes'];

        $weather->save();

        $clientId = $booking->clientID;

        $approve = new Notification();
        $approve->clientID = $clientId; 
        $approve->weatherID = $weather->id;
        $approve->notification_type = "weather";

        $approve->save();

        return redirect()->back()->with('message', 'Bookings updated successfully');

    }
}
