<?php

namespace App\Http\Controllers;

use App\Mail\AdminCancelAppointmentNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use App\Models\Schedule;
// use App\Models\Request as Requests;
use App\Models\Appointment;
use App\Http\Requests\BookingRequest;
use App\Mail\NewAppointmentNotification;
use App\Mail\UserAppointmentNotification;
use App\Mail\CancellationConfirmation;
use App\Mail\CancellationNotPossible;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('status', 'Active')
                           ->whereHas('schedule', function ($query) {
                                $query->where('status', 'Available');
                           })->get();
                           
        return view('contact', compact('services'));
    }
    public function cancel($id)
    {
        $appointment = Appointment::find($id);
    
        if (!$appointment) {
            return redirect()->route('contact.index')->with('error', 'Appointment not found');
        }
    
        // Check if the appointment is approved or rejected
        if ($appointment->status === 'Approved' || $appointment->status === 'Rejected') {
            // Send an email notifying that the appointment can't be canceled
            Mail::to($appointment->email)->send(new CancellationNotPossible($appointment));
            return redirect()->route('contact.index');
        } else {
            // Update the appointment status to "Canceled"
            $appointment->update(['status' => 'Canceled']);
            $adminEmail = User::where('role', 'admin')->value('email');
            // Send a confirmation email to the user
            Mail::to($appointment->email)->send(new CancellationConfirmation($appointment));
            Mail::to($adminEmail)->send(new AdminCancelAppointmentNotification( $appointment));
            return redirect()->route('contact.index');
        }
    }
    


    public function book(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('contact.index')->with('invalid-email-notification');
        }

        $newAppointment = Appointment::create($request->all());
    
        if ($newAppointment) {

            $adminEmail = User::where('role', 'admin')->value('email');
            Mail::to($request->input('email'))->send(new UserAppointmentNotification($newAppointment));

            Mail::to($adminEmail)->send(new NewAppointmentNotification($newAppointment));

            
    
            return redirect()->route('contact.index')->with('success');
        }
    
        return redirect()->route('contact.index')->with('error');
    }
    
    public function getSchedule(Request $request)
    {
        $data = $request->all();
    
        $schedule = Schedule::where('service_id', $data['schedule_id'])
                            ->where('status', 'Available')
                            ->with(['timeslot' => function ($query) {
                                $query->where('status', 'Available');
                            }])
                            ->get();
    
        return response()->json($schedule);
    }
}
