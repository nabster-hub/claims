<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaimRequest extends FormRequest
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
        $rules = [
            'full_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required',
            'power' => 'required|integer',
            'pc' => 'required|string',
            'vl' => 'nullable|string',
            'tp' => 'nullable|string',
        ];

        if($this->method() == 'POST') {
            $rules += [
                'claim' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'questionnaire' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'cal_power' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'CTD' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'type' => 'required|integer',
            ];
        }

        if(($this->method() == 'PUT' || $this->method() == 'PATCH') && $this->input("step") != 1) {
            $rules += [
                'claim' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'questionnaire' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'cal_power' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'CTD' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'tech_offer' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'OCD' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'type' => 'nullable|integer',
            ];
        }
        if(($this->method() == 'PUT' || $this->method() == 'PATCH') && $this->input("step") == 1) {
            $rules += [
                'claim' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'questionnaire' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'cal_power' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'CTD' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'tech_offer' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'OCD' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
                'type' => 'nullable|integer',
            ];
        }

        return $rules;
    }


    public function messages(): array
    {
        return [
            'full_name.required' => 'Ф.И.О абонента или наименования объекта - является обязательным для заполнения',
            'address.required' => 'Адрес и моего расположения объекта - является обязательным для заполнения',
            'phone.required' => 'Контакты - является обязательным для заполнения',
            'power.required' => 'Мощность - является обязательным для заполнения',
            'type.required' => 'Тип заявления обязателен - является обязательным для заполнения',
            'pc.required' => 'Точка подключения ПС - является обязательным для заполнения',
            'claim.required' => 'Заявление - является обязательным для заполнения',
            'claim.mimes' => 'Файл Заявления должен быть в формате jpeg, png, jpg, gif, svg, pdf, doc, docx',
            'claim.max' => 'Файл Заявления не должен привышать 10 МБ.',
            'questionnaire.required' => 'Опросной лист от абонента - является обязательным для заполнения',
            'questionnaire.mimes' => 'Файл Опросной лист от абонента должен быть в формате jpeg, png, jpg, gif, svg, pdf, doc, docx',
            'questionnaire.max' => 'Файл Опросной лист от абонента не должен привышать 10 МБ.',
            'cal_power.required' => 'Расчёт заявленной мощности - является обязательным для заполнения',
            'cal_power.mimes' => 'Файл Расчёт заявленной мощности должен быть в формате jpeg, png, jpg, gif, svg, pdf, doc, docx',
            'cal_power.max' => 'Файл Расчёт заявленной мощности не должен привышать 10 МБ.',
            'CTD.required' => 'Копии правоустанавливающих документов - является обязательным для заполнения',
            'CTD.mimes' => 'Файл Копии правоустанавливающих документов должен быть в формате jpeg, png, jpg, gif, svg, pdf, doc, docx',
            'CTD.max' => 'Файл Копии правоустанавливающих документов не должен привышать 10 МБ.',
        ];
    }
}
