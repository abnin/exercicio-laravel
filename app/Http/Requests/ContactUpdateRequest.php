<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string','max:255', 'min:5'],
            'phone_number' => ['string', 'max:9', Rule::unique(Contact::class)->ignore($this->contact()->id)],
            'email' => ['email', 'max:255', Rule::unique(Contact::class)->ignore($this->contact()->id)],
        ];
    }
}
