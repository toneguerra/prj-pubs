<?php

namespace App\Http\Requests\Expense;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseFormRequest extends FormRequest
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
            'year_id'=>'required',
            'expense_segment_id'=>'required',
            'expense_period_detail_id'=>'required',
            'path'=>'required|mimetypes:application/pdf'
        ];
    }

    public function messages()
    {
        return [
            'year_id.required'=>'O campo Ano é obrigatório.',
            'expense_segment_id.required'=>'O campo Segmento da Publicação é obrigatório.',
            'expense_period_detail_id.required'=>'O campo Período é obrigatório.',
            'path.required'=>'É obrigatório selecionar um arquivo *.pdf.',
            'path.mimetypes'=>'O arquivo não é um PDF válido.'
        ];
    }
}
