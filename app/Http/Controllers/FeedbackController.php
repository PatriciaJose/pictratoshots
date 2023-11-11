<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\Booking;
use App\Models\Feedback;
use App\Models\Notification;
use App\Models\Package;
use App\Models\PhotoshootType;
use App\Models\RatingForm;
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
    public function sendRatingForm(Request $request)
    {
        $bookingId = $request->input('booking_id');


        $booking = Booking::find($bookingId);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        $ratingForm = RatingForm::create([
            'bookingID' => $bookingId,
        ]);

        $clientId = $booking->clientID;

        $approve = new Notification();
        $approve->clientID = $clientId;
        $approve->ratingFormID = $ratingForm->id;
        $approve->notification_type = "rating";

        $approve->save();

        return redirect()->back()->with('success', 'Rating form sent successfully');
    }
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'rating' => 'required|numeric|between:1,5',
        ]);

        $feedback = new Feedback;
        $feedback->message = $request->input('message');
        $feedback->rating = $request->input('rating');


        $ratingFormID = $request->input('ratingFormID');
        $ratingForm = RatingForm::find($ratingFormID);
        $bookingID = $ratingForm->bookingID;
        $feedback->bookingID = $bookingID;

        $feedback->save();

        
        $feedbackID = $feedback->id;

        $approve = new AdminNotification();
        $approve->feedbackID = $feedbackID;
        $approve->notification_type = 'new-feedback';
        $approve->save();

        return redirect()->back()->with('success', 'Rated successfully');
    }
    public function fetchRatingForm($ratingFormID)
    {
        $ratingForm = RatingForm::find($ratingFormID);

        return response()->json($ratingForm);
    }
    public function checkBookingFeedback($bookingID)
    {
        $exists = Feedback::where('bookingID', $bookingID)->exists();

        return response()->json(['exists' => $exists]);
    }
}
