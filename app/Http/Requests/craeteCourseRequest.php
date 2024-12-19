<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class craeteCourseRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'status' => 'required|in:soon,active,completed',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_date',
            'instructor_email' => 'required|exists:instructors,email',
        ];
    }
}
