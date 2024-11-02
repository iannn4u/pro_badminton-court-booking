<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_booking' => 'required',
            'date_booking' => 'required',
            'time_booking' => 'required',
            'name_court' => 'required',
            'method_payment' => 'required',
            'description' => 'required'
        ];
    }

    /**
     * Custom messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'name_booking.required' => 'Nama pemesan harus diisi.',
            'date_booking.required' => 'Tanggal main harus diisi.',
            'name_court.required' => 'Lapangan main harus dipilih.',
            'time_booking.required' => 'Jam main harus dipilih.',
            'court_booking.required' => 'Lapangan harus dipilih.',
            'method_payment.required' => 'Metode pembayaran harus dipilih.',
            'description.required' => 'Deskripsi harus diisi.',
        ];
    }
}
