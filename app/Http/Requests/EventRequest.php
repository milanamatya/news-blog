<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class EventRequest extends FormRequest
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
            'name' => 'required|min:4',
            'start_date' => 'required|date|date_format:yyyy-mm-dd|before_or_equal:end_date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date|date_format:yyyy-mm-dd|after_or_equal:start_date',
            'end_time' => 'required|date_format:H:i',
            'auto_enable_disable' => 'required|boolean'
        ];
    }

    public function data(){
        return [
            'name' => $this->name,
            'slug' =>  Str::slug($this->name, '-'),
            'start_date' => $this->start_date,
            'start_time' => $this->start_time,
            'end_date' => $this->end_date,
            'end_time' => $this->end_time,
            'auto_enable_disable' => $this->auto_enable_disable,
        ];
    }
}
