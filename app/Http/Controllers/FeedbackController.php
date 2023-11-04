<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Feedback;
use App\Models\Package;
use App\Models\PhotoshootType;
use App\Models\User;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        $feedbackData = [];
        
        foreach ($feedbacks as $feedback) {
            $booking = Booking::find($feedback->bookingID);
            
            if ($booking) {
                $user = User::find($booking->clientID);
                $photoshootType = PhotoshootType::find($booking->package->typeID);
                $package = Package::find($booking->packageID);
                
                if ($user && $photoshootType && $package) {
                    $feedbackData[] = [
                        'user' => $user,
                        'feedback' => $feedback,
                        'photoshootType' => $photoshootType,
                        'package' => $package,
                    ];
                }
            }
        }
    
        return view('admin.admin-feedback', compact('feedbackData'));
    }
    
}
