<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SummaryRequest extends FormRequest
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
            'sday' => 'required|date',
            'eday' => 'required|date',
            'region' => 'nullable|numeric|exists:regions,id',
            'type' => 'numeric',
            'power' => 'nullable|numeric',
            'step' => 'numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'sday.required' => "Период 'С' должен быть обязательно заполнен",
            'sday.date' => "Период 'С' должен содержать дату",
            'eday.required' => "Период 'По' должен быть обязательно заполнен",
            'eday.date' => "Период 'По' должен содержать дату",
            'region.numeric' => "Район не правильно заполнен",
            'region.exists' => "Район не найден",
            'type.numeric' => "По типу заявителя не правильно заполнена",
            'power.numeric' => 'По мощности должно быть целое число',
            'step.numeric' => 'По статусу не правильно заполнена',
        ];
    }
}
