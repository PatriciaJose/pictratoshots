<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PhotoshootType;
use App\Models\Feedback;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->user_type;
            if ($usertype == "client") {
                $photoshootTypes = PhotoshootType::with(['albums' => function ($query) {
                    $query->with(['images' => function ($query) {
                        $query->take(6);
                    }]);
                }])->get();

                $feedbacks = Feedback::all();
                $feedbackData = [];
                foreach ($feedbacks as $feedback) {
                    $booking = Booking::find($feedback->bookingID);
                    if ($booking) {
                        $user = User::find($booking->clientID);
                        $photoshootType = PhotoshootType::find($booking->package->typeID);
                        if ($user && $photoshootType) {
                            $feedbackData[] = [
                                'user' => $user,
                                'feedback' => $feedback,
                                'photoshootType' => $photoshootType,
                            ];
                        }
                    }
                }
                return view('dashboard', compact('photoshootTypes', 'feedbackData'));
            } else if ($usertype == "admin") {
                $pendingBookings = Booking::where('status', 'Pending')->count();
                $approvedBookings = Booking::where('status', 'Approved')->count();
                $rejectedBookings = Booking::where('status', 'Disapproved')->count();
                $finishedBookings = Booking::where('status', 'Finish')->count();

                $data = [];

                $photoshootTypes = PhotoshootType::all();

                foreach ($photoshootTypes as $photoshootType) {
                    $approvedBookingsCount = Booking::whereHas('package.photoshootType', function ($query) use ($photoshootType) {
                        $query->where('id', $photoshootType->id);
                    })->where('status', 'Finish')->count();

                    $data['labels'][] = $photoshootType->type_name;
                    $data['data'][] = $approvedBookingsCount;
                }
                $packages = Package::all();

                $packageDetails = $packages->map(function ($package) {
                    $eventType = PhotoshootType::where('id', $package->typeID)->first();

                    return [
                        'package_name' => $package->package_name,
                        'event_name' => $eventType->type_name,
                        'package_price' => $package->price,
                    ];
                });

                $feedbacks = Feedback::all();
                $userNames = [];

                foreach ($feedbacks as $feedback) {
                    $bookingID = $feedback->bookingID;

                    $clientID = Booking::where('id', $bookingID)->value('clientID');

                    $userName = User::where('id', $clientID)->value('name');

                    $userNames[$bookingID] = $userName;
                }

                return view("admin.admin-home", compact('pendingBookings', 'approvedBookings', 'rejectedBookings', 'finishedBookings', 'data', 'packageDetails', 'photoshootTypes','userNames','feedbacks'));
            } else {
                return redirect()->back();
            }
        }
    }
}
