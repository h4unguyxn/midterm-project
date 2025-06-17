<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBorrowRecordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:students,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.required' => 'Vui lòng chọn sinh viên.',
            'book_id.required' => 'Vui lòng chọn sách.',
            'borrow_date.required' => 'Vui lòng nhập ngày mượn.',
            'return_date.after_or_equal' => 'Ngày trả phải bằng hoặc sau ngày mượn.',
        ];
    }
}
