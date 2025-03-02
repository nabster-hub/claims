<?php

namespace App\Http\Requests;

use App\Models\Claim;
use Illuminate\Foundation\Http\FormRequest;

class DocsRequest extends FormRequest
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
        $rules = [];

        $claim = $this->route('claim');

        if($this->input('step') == 2){
            $rules['tech_offer'] = 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240';
            $rules['OCD'] = 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240';
            $rules['pc'] = 'required|string';
            $rules['vl'] = 'nullable|string';
            $rules['tp'] = 'nullable|string';
        }


        if($this->input('step') == 3){
            $rules['tech_condition'] = 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240';
        }

        if($this->hasFile('tech_offer')){
            $rules['tech_offer'] = 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240';
        }
        if($this->hasFile('OCD')){
            $rules['OCD'] = 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240';
        }
        if($this->hasFile('tech_condition')){
            $rules['tech_condition'] = 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240';
        }
        if($claim && $claim->type == 1){
            $rules['tech_offer'] = 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf|max:10240';
        }

        return $rules;
    }


    public function messages(): array
    {
        return [
            'tech_offer.required' => 'Техническое предложение - является обязательным для заполнения',
            'tech_offer.mimes' => 'Файл Техническое предложение должен быть в формате jpeg, png, jpg, gif, svg, pdf, doc, docx',
            'tech_offer.max' => 'Файл Техническое предложение не должен привышать 10 МБ.',
            'OCD.required' => 'Схема подключения объекта - является обязательным для заполнения',
            'OCD.mimes' => 'Файл Схема подключения объекта должен быть в формате jpeg, png, jpg, gif, svg, pdf, doc, docx',
            'OCD.max' => 'Файл Схема подключения объекта не должен привышать 10 МБ.',
            'tech_condition.required' => 'Технические условия - является обязательным для заполнения',
            'tech_condition.mimes' => 'Файл Технические условия должен быть в формате jpeg, png, jpg, gif, svg, pdf, doc, docx',
            'tech_condition.max' => 'Файл Технические условия не должен привышать 10 МБ.',
        ];
    }
}
