<?php

namespace App\Http\Controllers\Booking;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function BookingTable(Request $request){
        
        $currentDateTime = now();
        $currentDate = $currentDateTime->format('Y-m-d'); // Get the current date

        // Format the input date and time
        $formattedDate = \Carbon\Carbon::createFromFormat('m/d/Y h:i A', $request->input('date'))->format('Y-m-d H:i:s');

        // Check if the selected date is today or in the past
        if($request->input('user_id') == 'Guest'){
            return redirect()->route('home')->with('error', 'You must be logged in to book a table.');
        }

        if ($formattedDate < $currentDateTime) {
            return redirect()->route('home')->with('error', 'Invalid Date or Time! You cannot select today or a past date.');
        } else {
            $book = new Booking();
            $book->user_id = $request['user_id'];
            $book->name = $request['name'];
            $book->email = $request['email'];
            $book->date = $formattedDate; // Save the full datetime
            $book->num_of_people = $request['num_of_people'];
            $book->request = $request['request'];
            $book->save();

            return redirect()->route('home')->with('success', 'Table Booked successfully!');
        }
    }
}
