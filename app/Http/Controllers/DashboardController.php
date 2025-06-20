<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowRecord;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $borrowRecordsDueSoon = BorrowRecord::with(['student', 'book'])
            ->whereDate('return_date', Carbon::tomorrow()) // hoặc ->where('return_date', '<=', Carbon::now()->addDays(3)) nếu muốn hiển thị nhiều ngày hơn
            ->get();

        return view('dashboard', compact('borrowRecordsDueSoon'));
    }
}
