<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\AdminNotification;
use Twilio\Rest\Client;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function showBookings()
    {
        $bookings = Booking::where('clientID', auth()->user()->id)
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('clients.my-bookings', compact('bookings'));
    }


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

        $booking = Booking::create([
            'packageID' => $data['packageID'],
            'clientID' => $clientId,
            'session_date' => $data['session_date'],
            'location' => $data['location'],
            'session_time' => $data['session_time'],
        ]);

        $bookingId = $booking->id;

        $approve = new AdminNotification();
        $approve->bookingID = $bookingId;
        $approve->notification_type = 'new-bookings';
        $approve->save();

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


        return redirect()->back()->with('message', 'SMS sent successfully.');
    }



    public function updateBookingStatus(Request $request)
    {
        $bookingId = $request->input('booking_id');
        $newStatus = $request->input('status');

        $booking = Booking::find($bookingId);

        $clientId = $booking->clientID;

        $booking->status = $newStatus;
        $booking->save();

        if ($newStatus == 'Approved') {
            $approve = new Notification();
            $approve->bookingID = $bookingId;
            $approve->clientID = $clientId;
            $approve->notification_type = 'booking-approved';
            $approve->save();

            return redirect()->back()->with('message', 'The booking has been approved successfully.');
        } else if ($newStatus == 'Finish') {
            return redirect()->back()->with('message', 'The booking has been successfully completed.');
        } else if ($newStatus == 'Canceled') {
            $approve = new Notification();
            $approve->bookingID = $bookingId;
            $approve->clientID = $clientId;
            $approve->notification_type = 'canceled';
            $approve->save();

            $notification = new AdminNotification();
            $notification->notification_type = 'canceled';
            $notification->bookingID = $booking->id;
            $notification->save();

            return redirect()->back()->with('message', 'Your booking cancellation has been processed successfully.');
        }
    }

    public function addReason(Request $request)
    {
        $newStatus = "Disapproved";
        $bookingId = $request->input('booking_id');
        $disapprovalReason = $request->input('disapprovalReason');

        $booking = Booking::find($bookingId);
        $clientId = $booking->clientID;

        $booking->status = $newStatus;
        $booking->disapproval_reason = $disapprovalReason;
        $booking->save();

        $approve = new Notification();
        $approve->bookingID = $bookingId;
        $approve->clientID = $clientId;
        $approve->notification_type = 'booking-disapproved';
        $approve->save();

        return redirect()->back()->with('message', 'The booking has been declined.');
    }

    public function updateBookings(Request $request, $id)
    {
        $data = $request->validate([
            'session_date' => 'required|date',
            'session_time' => 'required|date_format:H:i',
            'location' => 'required|string',
        ]);

        Booking::find($id)->update($data);

        return redirect()->back()->with('message', 'Bookings updated successfully');
    }
}
