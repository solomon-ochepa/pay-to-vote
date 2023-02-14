<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'event.name'          => ['bail', 'required', 'string', 'max:120'],
            'event.started_at'    => ['bail', 'required', 'string'],
            'event.ended_at'      => ['bail', 'required', 'string'],
            'event.about'         => ['bail', 'required', 'string', 'max:800'],
            'event.min_vote'        => ['bail', 'required', 'integer', 'min:1'],
            'event.vote_cost'       => ['bail', 'required', 'numeric', 'min:1'],
            'event.default'       => ['bail', 'nullable', 'string'],
        ];
    }
}
