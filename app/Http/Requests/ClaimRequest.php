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
        return [
            'full_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required',
            'power' => 'required|string',
            'con_point' => 'required|string',
            'claim' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
            'questionnaire' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
            'cal_power' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
            'CTD' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Ф.И.О абонента или наименования объекта - является обязательным для заполнения',
            'address.required' => 'Адрес и моего расположения объекта - является обязательным для заполнения',
            'phone.required' => 'Контакты - является обязательным для заполнения',
            'power.required' => 'Мощность - является обязательным для заполнения',
            'con_point.required' => 'Точка подключения ПС - ВЛ - КЛ - КТП - 10/0,4кВ - является обязательным для заполнения',
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
