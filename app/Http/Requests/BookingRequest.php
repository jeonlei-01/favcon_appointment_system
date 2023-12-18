<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'schedule_id' => 'required|exists:schedules,id',
            'timeslot_id' => 'required|exists:timeslots,id',
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone_no' => 'required|numeric',
            'notes' => 'nullable|string',
        ];
    }
}
