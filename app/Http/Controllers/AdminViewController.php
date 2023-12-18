<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Timeslot;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\NotInPastMonthForUpdate;


class AdminViewController extends Controller
{
    // public function indexUnauthenticated()
    // {
    // return redirect('/appointment-dashboard');
    // }

    public function showChangePasswordForm()
    {
        return view('layout.admin.change_pass'); 
    }
    public function homeview()
    {
        $pendingCount = Appointment::where('status', 'Pending')->count();
        $approvedCount = Appointment::where('status', 'Approved')->count();
        $rejectedCount = Appointment::where('status', 'Rejected')->count();
        $upcomingAppointments = Appointment::where('status', 'Pending')->get();
        return view('layout.admin.home', compact('pendingCount', 'approvedCount', 'rejectedCount', 'upcomingAppointments')); 
    }

    public function changePassword(Request $request)
{
    $user = Auth::user();
    $validator = Validator::make($request->all(), [
        'old_password' => 'required',
        'password' => 'required|min:8|confirmed',
    ], [
        'password.min' => 'The new password must be at least 8 characters long.',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()]);
    }

    if (Hash::check($request->old_password, $user->password)) {
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['status' => 'success']);
    } else {
        return response()->json(['status' => 'error']);
    }
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');

    }
    //APPOINTMENT CONTROLLER
    public function appointmentView() {
        $appointments = Appointment::get();
        return view("layout.admin.appointment", compact('appointments'));
    }

    public function updateAppointment(Request $request, $id)
{
    $appointment = Appointment::findOrFail($id);
    $newStatus = $request->input('status');

    // Check if the appointment is already approved
    if ($appointment->status === 'Approved') {
        return response()->json(['success' => false, 'message' => 'Appointment has already been approved.']);
    }

    // Send an email notification for approved appointments
    if ($newStatus === 'Approved') {
        $recipientEmail = $appointment->email;
        Mail::to($recipientEmail)->send(new TestEmail('Approved'));
        
    } else if ($newStatus === 'Rejected') {
        // Send an email notification for rejected appointments
        $recipientEmail = $appointment->email;
        Mail::to($recipientEmail)->send(new TestEmail('Rejected'));
    }

    // Check if there are any other pending appointments with the same schedule and time
    $conflictingAppointments = Appointment::where('schedule_id', $appointment->schedule_id)
        ->where('timeslot_id', $appointment->timeslot_id)
        ->where('status', 'Pending')
        ->where('id', '!=', $id)
        ->get();

    // Send email notifications for rejected appointments and update status
    foreach ($conflictingAppointments as $conflictingAppointment) {
        $recipientEmail = $conflictingAppointment->email;

        // Send an email notification for rejected appointments
        if ($newStatus === 'Approved') {
            Mail::to($recipientEmail)->send(new TestEmail('Rejected'));
        }

        // Update the status of the appointment to 'Rejected'
        $conflictingAppointment->update(['status' => 'Rejected']);
        // Also update the status of the associated timeslot to 'Available'
        Timeslot::where('id', $conflictingAppointment->timeslot_id)->update(['status' => 'Available']);
    }

    // Update appointment status after sending emails
    $appointment->update(['status' => $newStatus]);

    $timeslotId = $appointment->timeslot_id;
    if ($timeslotId) {
        $newTimeslotStatus = ($newStatus === 'Approved') ? 'Booked' : 'Available';
        Timeslot::where('id', $timeslotId)->update(['status' => $newTimeslotStatus]);

        // Get the associated schedule
        $schedule = Timeslot::find($timeslotId)->schedule;

        // Check if all timeslots for the schedule are booked
        if ($schedule && $newTimeslotStatus === 'Booked' && $schedule->timeslot()->where('status', '!=', 'Booked')->count() === 0) {
            // Update the schedule status to "Booked"
            $schedule->update(['status' => 'Booked']);
        }
    }

    return redirect()->back();
}

    

    //SCHEDULE CONTROLLER

    public function scheduleview() {
        $schedules  = Schedule::all();
        return view('layout.admin.schedule', compact('schedules'));
    }
    
    public function createSchedule(Request $request )
    {
        $services = Service::where('status', 'Active')->get(); 
        return view('layout.admin.schedule_create', compact('services'));
    }
    public function addSchedule(Request $request)
    {
         // Validate the input, including the date
        $request->validate([
            'date' => 'required|date|in_current_or_next_month',
            'service_id' => 'required',
            'status' => 'required',
        ], [
            'date.in_current_or_next_month' => 'Make sure to create a schedule within the current/next month.',
        ]);
          // Retrieve input data
        $date = $request->input('date');
        $serviceId = $request->input('service_id');

        // Check if a schedule with the same date and service_id already exists
        $existingSchedule = Schedule::where('date', $date)
            ->where('service_id', $serviceId)
            ->first();

        if ($existingSchedule) {
            // A schedule with the same date and service_id already exists
            return redirect('/admin/schedule_create')
                ->withErrors(['error' => 'Date already exists for this service. Please create another one.']);
        }

        $addSchedules = new Schedule;
        if ($addSchedules) {
            $addSchedules->date = $request->input('date');
            $addSchedules->service_id = $request->input('service_id');
            $addSchedules->status = $request->input('status');
            $addSchedules->save();
            return redirect('/schedule-dashboard')->with('success', 'Successfully Created');
        } else {
            return redirect('layout.admin.schedule_create')->with('error');
        }
    }

    public function updateSchedule($id)
    {
        $updateSchedule = Schedule::find($id);
        $services = Service::all(); // Fetch all available services
        return view('layout.admin.schedule_update', ['data' => $updateSchedule, 'services' => $services]);
    }

    public function editSchedule(Request $request)
{
    $request->validate([
        'date' => ['required', 'date', new NotInPastMonthForUpdate],
        'service_type' => 'required', // Change this to match your input field name
        'status' => 'required',
    ]);

    $editSchedule = Schedule::find($request->id);

    if ($editSchedule) {
        // Find service by type and get its ID
        $serviceType = $request->input('service_type');
        $service = Service::where('type', $serviceType)->first();

        if ($service) {
            // Check if a schedule with the same date and service_id already exists, excluding the current schedule being edited
            $existingSchedule = Schedule::where('date', $request->input('date'))
                ->where('service_id', $service->id)
                ->where('id', '!=', $editSchedule->id) // Exclude the current schedule
                ->first();

            if ($existingSchedule) {
                // A schedule with the same date and service_id already exists
                return redirect()->back()
                ->withErrors(['error' => 'Date already exists for this service. Please try to update another one.']);
            }

            $editSchedule->date = $request->input('date');
            $editSchedule->service_id = $service->id; // Use the service's ID
            $editSchedule->status = $request->input('status');
            $editSchedule->save();

            return redirect('/schedule-dashboard')->with('success', 'Successfully Updated');
        } else {
            // Handle the case where the service type is not found
            return redirect()->back()->with('error', 'Service type not found');
        }
    } else {
        return redirect()->back()->with('error', 'Schedule not found');
    }
}


    //SERVICE CONTROLLER
    public function serviceview() {
        $services  = Service::all();
        return view ('layout.admin.service', compact('services'));
    }

        public function createServices()
        {
            return view('layout.admin.service_create');
        }


        public function addServices(Request $request)
        {
            $request->validate([
                'description' => 'required|string|max:255',
            ], [
                'description' => 'The description may not be greater than 255 characters.',
            ]);
            $createServices = new Service;
            if ($createServices) {
                $createServices->type = $request->input('type');
                $createServices->description = $request->input('description');
                $createServices->status = $request->input('status');
                $createServices->save();
                return redirect('/service-dashboard')->with('success', 'Successfully Created');

            } else {

                return redirect('/admin/service')->with('error');
            }
        }

        public function editServices($id)
        {
            $editServices = Service::find($id);
            return view('layout.admin.service_update', ['data'=>$editServices]);
        }
        public function updateServices(Request $request)
        {
                $request->validate([
                    'description' => 'required|string|max:255',
                ], [
                    'description' => 'The description may not be greater than 255 characters.',
                ]);
            $updateServices = Service::find($request->id);
            if ($updateServices) {
                $updateServices->type = $request->input('type');
                $updateServices->description = $request->input('description');
                $updateServices->status = $request->input('status');
                $updateServices->save();
                return redirect('/service-dashboard')->with('success', 'Successfully Updated');
            } else {
                return redirect('layout.admin.service_update')->with('error', 'User not found');
            }
        }
        

    //TIMESLOT CONTROLLER
    public function timeslotview() {
        $timeslots  = Timeslot::all();
        return view ('layout.admin.timeslot',compact('timeslots'));
    }
    public function createTimeSlot(Request $request )
    {
        $services = Service::all(); 
        $schedules = Schedule::all();
        return view('layout.admin.timeslot_create', compact('schedules', 'services'));
    }
    public function getDates($serviceId)
    {
        $dates = Schedule::where('service_id', $serviceId)->where('status', 'Available')
        ->orderBy('date', 'asc')->get();
        
        return response()->json($dates);
    }
    
    public function addTimeSlot(Request $request)
    {
        // Define validation rules
        $rules = [
            'start_time' => 'required',
            'end_time' => 'required',
            'schedule_id' => 'required',
        ];
    
        // Validate the request data
        $this->validate($request, $rules);
    
        // Retrieve input data
        $startTime = $request->input('start_time');
        $endTime = $request->input('end_time');
        $scheduleId = $request->input('schedule_id');
    
        // Check if a timeslot with the same start and end times exists for the given schedule
        $existingTimeslot = Timeslot::where('schedule_id', $scheduleId)
            ->where('start_time', $startTime)
            ->where('end_time', $endTime)
            ->first();
    
        if ($existingTimeslot) {
            // A timeslot with the same start and end times already exists
            return redirect('/admin/timeslot/create')
                ->withErrors(['error' => 'Timeslot already exists for this schedule. Please create another one.']);
        }
    
        // Create and save the new timeslot
        $newTimeslot = new Timeslot;
        $newTimeslot->start_time = $startTime;
        $newTimeslot->end_time = $endTime;
        $newTimeslot->status = $request->input('status');
        $newTimeslot->schedule_id = $scheduleId;
        $newTimeslot->save();
    
        return redirect('/timeslot-dashboard')->with('success', 'Successfully created.');
    }
    
    public function editTimeslots($id)
    {
        $editTimeslots = Timeslot::find($id);
        $serviceId = $editTimeslots->schedule->service->id;
    
        $dates = Schedule::where('service_id', $serviceId)
            ->where('status', 'Available') // Filter by status
            ->orderBy('date', 'asc')
            ->get(['id', 'date']);
    
        return view('layout.admin.timeslot_update', ['data' => $editTimeslots, 'dates' => $dates]);
    }
    

    public function updateTimeslots(Request $request)
    {
        $editTime = Timeslot::find($request->id);
    
        if (!$editTime) {
            return redirect('layout.admin.timeslot_update')->with('error', 'Timeslot not found');
        }
    
        // Retrieve input data
        $startTime = $request->input('start_time');
        $endTime = $request->input('end_time');
        $scheduleId = $request->input('schedule_id');
    
        // Check if a timeslot with the same start_time, end_time, and schedule_id already exists, excluding the current timeslot
        $existingTimeslot = Timeslot::where('start_time', $startTime)
            ->where('end_time', $endTime)
            ->where('schedule_id', $scheduleId)
            ->where('id', '!=', $request->id)
            ->first();
    
        if ($existingTimeslot) {
            // A timeslot with the same start_time, end_time, and schedule_id already exists
            return redirect()->back()
            ->withErrors(['error' => 'Timeslot already exists for this schedule. Please create another one.']);
        }
    
        $editTime->start_time = $startTime;
        $editTime->end_time = $endTime;
        $editTime->status = $request->input('status');
        $editTime->schedule_id = $scheduleId;
        $editTime->save();
        
        return redirect('/timeslot-dashboard')->with('success', 'Successfully Updated');
    }


 
}
