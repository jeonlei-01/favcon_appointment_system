<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotInPastMonthForUpdate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        {
            $selectedDate = new \DateTime($value);
    
    
            // Get the first day of the current month
            $firstDayOfCurrentMonth = new \DateTime('first day of this month');
    
    
            // Get the last day of the next month
            $lastDayOfNextMonth =  (new \DateTime('first day of next month'))->modify('last day of this month');
    
    
            // Check if the selected date is within the current month
            return $selectedDate >= $firstDayOfCurrentMonth && $selectedDate <= $lastDayOfNextMonth;
        }
    
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Make sure to update a schedule that is not in the past month.';

    }
}
