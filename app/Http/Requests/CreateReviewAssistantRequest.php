<?php

namespace App\Http\Requests;

use App\Models\Review_assistant;
use Illuminate\Foundation\Http\FormRequest;

class CreateReviewAssistantRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return Review_assistant::$rules;
    }
}
