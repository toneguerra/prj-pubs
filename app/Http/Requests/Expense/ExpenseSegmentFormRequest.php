<?php

namespace App\Http\Requests\Expense;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseSegmentFormRequest extends FormRequest
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
            'name'=>'required|min:10|max:50',
            'abrev'=>'required|between:4,4',
            'expense_type_id'=>'required',
            'expense_period_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'O campo Título do Relatório é obrigatório.',
            'name.min'=>'O Título do Relatório deve ter no mínimo 10 caracteres.',
            'name.max'=>'O Título do Relatório não deve ter mais de 50 caracteres.',

            'abrev.required'=>'O campo Abreviatura é obrigatório.',
            'abrev.between'=>'A Abreviatura deve ter 4 caracteres bet_4,4.',

            'expense_type_id.required'=>'O campo Tipo é obrigatório.',

            'expense_period_id.required'=>'O campo Periodo é obrigatório.'
        ];
    }
}
