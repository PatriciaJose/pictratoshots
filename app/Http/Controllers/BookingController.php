<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use App\Models\Booking;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Notifications\BookingStatusNotification;


class BookingController extends Controller
{
    public function showBookingForm($packageId)
    {
        $package = Package::find($packageId);
        if (!$package) {
            return redirect()->route('packages')->with('error', 'Package not found.');
        }
        return view('clients.booking', compact('packageId', 'package'));
    }

    public function store(Request $request)
    {

        $clientId = Auth::id();


        $data = $request->validate([
            'packageID' => 'required|exists:packages,id',
            'session_date' => 'required|date',
            'location' => 'required|string',
            'session_time' => 'required|date_format:H:i',
        ]);


        Booking::create([
            'packageID' => $data['packageID'],
            'clientID' => $clientId,
            'session_date' => $data['session_date'],
            'location' => $data['location'],
            'session_time' => $data['session_time'],
        ]);

        return redirect()->route('packages')->with('message', 'Booking successful!');
    }

    // admin
    public function bookingManagement()
    {
        $bookings = Booking::with(['package', 'client'])->get();
        $acceptedBookings = $bookings->filter(function ($booking) {
            return $booking->status === 'Approved';
        });

        return view('admin.admin-bookings', compact('bookings', 'acceptedBookings'));
    }
    public function getEvents(Request $request)
    {
        $bookings = Booking::where('status', 'Approved')->get();

        $events = [];
        foreach ($bookings as $booking) {
            $events[] = [
                'title' => $booking->package->package_name,
                'start' => $booking->session_date . 'T' . $booking->session_time,
                'end' => $booking->session_date . 'T' . $booking->session_time,
                'location' => $booking->location,
                'email' => $booking->client->email,
            ];
        }

        return response()->json($events);
    }

    public function sendSms(Request $request)
    {
        $bookingId = $request->input('booking_id');
        $smsContent = $request->input('smsContent');

        $booking = Booking::find($bookingId);
        $clientPhoneNumber = $booking->client->phone;


        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        $twilio->messages->create(
            $clientPhoneNumber,
            [
                'from' => config('services.twilio.from'),
                'body' => $smsContent,
            ]
        );


        return redirect()->back()->with('success', 'SMS sent successfully.');
    }



    public function updateBookingStatus(Request $request)
    {
        $bookingId = $request->input('booking_id');
        $newStatus = $request->input('status');
    
        $booking = Booking::find($bookingId);
        $booking->status = $newStatus;
        $booking->save();
    
        // $notification = new Notification();
        // $notification->user_id = $booking->clientID;
        // $notification->message = 'Your booking status has been updated to ' . $newStatus;
        // $notification->save();
    
        return redirect()->back()->with('message', 'Booking status updated successfully.');
    }
    
}
