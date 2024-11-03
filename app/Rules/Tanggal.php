<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Tanggal implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $selectedDate = Carbon::parse($value);
        $today = Carbon::today();

        if ($selectedDate->lessThan($today)) {
            $fail("Tanggal tidak boleh kurang dari hari ini.");
        }
    }
}
