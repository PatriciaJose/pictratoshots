<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PhotoshootType;
use App\Models\Feedback;
use App\Models\Booking;
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
                return view("admin.admin-home");
            } else {
                return redirect()->back();
            }
        }
    }
}
