<?php

namespace App\Http\Controllers;

use App\Models\BorrowRecord;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBorrowRecordRequest;
use App\Http\Requests\UpdateBorrowRecordRequest;

class BorrowRecordController extends Controller
{
    public function index()
    {
        $borrowRecords = BorrowRecord::with(['book', 'student'])->get();
        return view('borrow_records.index', compact('borrowRecords'));
    }

    public function create()
    {
        $books = Book::all();
        $students = Student::all();
        return view('borrow_records.create', compact('books', 'students'));
    }

    public function store(StoreBorrowRecordRequest $request)
    {
        $validated = $request->validated();

        $book = Book::find($validated['book_id']); // hoặc 'bookId' tùy field bạn dùng

        if (!$book) {
            return redirect()->back()->withErrors(['bookError' => 'Không tìm thấy sách.'])->withInput();
        }

        if ($book->quantity <= 0) {
            return redirect()->back()->withErrors(['bookError' => 'Sách đã hết. Không thể mượn.'])->withInput();
        }

        // Giảm số lượng sách
        $book->decrement('quantity');

        BorrowRecord::create($validated);

        return redirect()->route('borrow-records.index')->with('success', 'Phiếu mượn đã được tạo!');
    }

    public function edit(BorrowRecord $borrowRecord)
    {
        $books = Book::all();
        $students = Student::all();
        return view('borrow_records.edit', compact('borrowRecord', 'books', 'students'));
    }

    public function update(UpdateBorrowRecordRequest $request, BorrowRecord $borrowRecord)
    {
        $validated = $request->validated();
        $borrowRecord->update($validated);
        return redirect()->route('borrow-records.index')->with('success', 'Phiếu mượn đã được cập nhật!');
    }

    public function destroy(BorrowRecord $borrowRecord)
    {
        // Trả lại sách (tăng số lượng lên)
        $book = Book::find($borrowRecord->book_id);
        if ($book) {
            $book->increment('quantity');
        }

        $borrowRecord->delete();

        return redirect()->route('borrow-records.index')->with('success', 'Phiếu mượn đã bị xóa!');
    }

    public function show(BorrowRecord $borrowRecord)
    {
        $borrowRecord->load(['book', 'student']);
        return view('borrow_records.show', compact('borrowRecord'));
    }
}
