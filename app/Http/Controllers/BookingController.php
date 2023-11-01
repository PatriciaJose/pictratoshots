<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
}
