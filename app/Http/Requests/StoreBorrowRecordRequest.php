<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBorrowRecordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cho phép mọi user thực hiện (bạn có thể thêm kiểm tra quyền ở đây)
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
            'student_id.exists' => 'Sinh viên không tồn tại.',
            'book_id.required' => 'Vui lòng chọn sách.',
            'book_id.exists' => 'Sách không tồn tại.',
            'borrow_date.required' => 'Vui lòng nhập ngày mượn.',
            'borrow_date.date' => 'Ngày mượn không hợp lệ.',
            'return_date.date' => 'Ngày trả không hợp lệ.',
            'return_date.after_or_equal' => 'Ngày trả phải bằng hoặc sau ngày mượn.',
        ];
    }
}
