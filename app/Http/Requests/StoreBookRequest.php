<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:13|unique:books,isbn',
            'quantity' => 'required|integer|min:0',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Vui lòng nhập tên sách.',
            'author.required' => 'Vui lòng nhập tên tác giả.',
            'isbn.required' => 'Vui lòng nhập mã ISBN.',
            'isbn.unique' => 'ISBN này đã tồn tại.',
            'quantity.required' => 'Vui lòng nhập số lượng.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
        ];
    }

}
