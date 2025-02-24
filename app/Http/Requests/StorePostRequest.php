<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'name'=>'required|max:255',
            'year'=>'required',
            'road'=>'required',
            'karopka'=>'required',
            'about_car'=>'required',
            'tan_narx'=>'required',
        ];
    }

    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{
    return [
        'name.required' => 'Avtomabil nomini kiriting',
        'year' => 'Avtomabil yilini kiriting',
        'road' => 'Avtomabil bosib otgan masofasini kiriting',
        'karopka' => 'Uzatmalar qutisini kiriting',
        'about_car' => 'Avtomabil haqidagi malumotlar kiritilsin',
        'tan_narx'=>'Avtomabil narxini kiriting'
    ];
}
}
