<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ValidatePage extends FormRequest
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

        if ($this->get('publish_on') !== null) {
            $date = Carbon::parse($this->get('publish_on'));
            $this->getInputSource()->set('publish_on', $date);
        }

        if ($this->get('publish_off') !== null) {
            $date = Carbon::parse($this->get('publish_off'));
            $this->getInputSource()->set('publish_off', $date);
        }

        return [
            //
            'title' => 'required|max:255',
            'slug' => 'nullable|max:255',
            'excerpt' => 'nullable|max:255',
            'title_nav' => 'max:255',
            'publish_on' => 'nullable|date',
            'publish_off' => 'nullable|date',

        ];

    }

    public function messages()
    {
        return [
            'title.required' => 'you must enter a title',
            'publish_on.date' => 'date is screwy: '.$this->get('publish_on'),
            'publish_off.date' => 'date is screwy: '.$this->get('publish_off'),

        ];
    }
}
