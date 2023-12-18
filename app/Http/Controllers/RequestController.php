<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Request as Requests;
use App\Notifications\ConfirmationEmail;


class RequestController extends Controller
{
    public function index(){
        $requests = Requests::get();

        return view("form", compact('requests'));
    }
    
    public function updateStatus(Request $request, Requests $req)
    {
        $message = $request->all()["status"];
        $user = $req->appointment;

        $data = ['message' => 'This is a test!'];

        Mail::to('leenunuyaa@gmail.com')->send(new ConfirmationEmail($data));

        $req->update($request->all());

        return redirect()->back();
    }
}
