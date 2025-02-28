<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIssueRequest extends FormRequest
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
            'title'         => 'required|string|min:4',
            'description'   => 'required|string|min:5',
            'time_taken'    => 'required|string',
            'time_required' => 'required|string',
            'time_worked'   => 'required|string',
            'status'        => 'required|between:0,5',
            'assigned_to'   => 'required|integer|exists:users,id',
            'assigned_by'   => 'required|integer|exists:users,id',
            'reported_to'   => 'required|integer|exists:users,id',
            'raised_by'     => 'required|integer|exists:users,id',
        ];
    }
}
