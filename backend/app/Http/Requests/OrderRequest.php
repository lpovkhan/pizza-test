<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'delivery' => ['required', 'array'],
            'delivery.name' => ['required', 'string', 'max:255'],
            'delivery.address' => ['required', 'string', 'max:255'],
            'order' => ['required', 'array'],
            'order.*.id' => ['required', 'integer', 'exists:pizzas,id'],
            'order.*.count' => ['required', 'integer'],
            'order.*.addons' => ['array'],
            'order.*.addons.*.id' => ['integer', 'exists:ingredients,id'],
            'order.*.addons.*.count' => ['integer']
        ];
    }
}
