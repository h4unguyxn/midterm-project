<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">Danh sách phiếu mượn</h2>
    </x-slot>

    <style>
        /* Enhanced styling for the borrow records list */
        .borrow-container {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #e0f2fe 0%, #1565c0 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .content-wrapper {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin: 0 auto;
            max-width: 1200px;
        }
        
        .success-alert {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 16px rgba(72, 187, 120, 0.3);
            animation: slideInFromTop 0.5s ease-out;
        }
        
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            border-radius: 16px;
            border: 1px solid rgba(203, 213, 224, 0.5);
        }
        
        .record-count {
            font-size: 1.125rem;
            font-weight: 600;
            color: #4a5568;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .record-count::before {
            content: "📋";
            font-size: 1.5rem;
        }
        
        .add-record-btn {
            background: linear-gradient(135deg, #4299e1, #3182ce);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(66, 153, 225, 0.3);
            border: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .add-record-btn:hover {
            background: linear-gradient(135deg, #3182ce, #2c5282);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(66, 153, 225, 0.4);
        }
        
        .add-record-btn::before {
            content: "➕";
            font-size: 1rem;
        }
        
        .table-container {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }
        
        .record-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table-header {
            background: linear-gradient(135deg, #2d3748, #4a5568);
            color: white;
        }
        
        .table-header th {
            padding: 1.25rem 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid #4a5568;
        }
        
        .table-row {
            transition: all 0.3s ease;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .table-row:hover {
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .table-cell {
            padding: 1rem;
            font-size: 0.875rem;
            color: #2d3748;
            font-weight: 500;
        }
        
        .student-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .student-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #4299e1, #3182ce);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
        }
        
        .book-title {
            font-weight: 600;
            color: #2d3748;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .date-badge {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
        }
        
        .return-date-badge {
            background: linear-gradient(135deg, #4299e1, #3182ce);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }
        
        .edit-btn {
            color: #3182ce;
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            background: rgba(49, 130, 206, 0.1);
        }
        
        .edit-btn:hover {
            background: rgba(49, 130, 206, 0.2);
            color: #2c5282;
            transform: translateY(-1px);
        }
        
        .delete-btn {
            color: #e53e3e;
            background: rgba(229, 62, 62, 0.1);
            border: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }
        
        .delete-btn:hover {
            background: rgba(229, 62, 62, 0.2);
            color: #c53030;
            transform: translateY(-1px);
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #718096;
        }
        
        .empty-state::before {
            content: "📋";
            font-size: 3rem;
            display: block;
            margin-bottom: 1rem;
        }
        
        @keyframes slideInFromTop {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .table-row {
            animation: fadeIn 0.5s ease-out;
        }
        
        @media (max-width: 768px) {
            .content-wrapper {
                margin: 1rem;
                padding: 1rem;
                border-radius: 16px;
            }
            
            .header-section {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .table-container {
                overflow-x: auto;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .student-info {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }
            
            .book-title {
                max-width: 150px;
            }
        }
    </style>

    <div class="borrow-container">
        <div class="content-wrapper">
            {{-- Thông báo thành công --}}
            @if(session('success'))
                <div class="success-alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="header-section">
                <h3 class="record-count">Tổng cộng: {{ $borrowRecords->count() }} phiếu mượn</h3>
                <a href="{{ route('borrow-records.create') }}" class="add-record-btn">
                    Thêm phiếu mượn
                </a>
            </div>

            <div class="table-container">
                <table class="record-table">
                    <thead class="table-header">
                        <tr>
                            <th>Sinh viên</th>
                            <th>Sách</th>
                            <th>Ngày mượn</th>
                            <th>Ngày trả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($borrowRecords as $record)
                            <tr class="table-row">
                                <td class="table-cell">
                                    <div class="student-info">
                                        <div class="student-avatar">
                                            {{ strtoupper(substr($record->student->name, 0, 1)) }}
                                        </div>
                                        <strong>{{ $record->student->name }}</strong>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="book-title" title="{{ $record->book->title }}">
                                        {{ $record->book->title }}
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <span class="date-badge">{{ $record->borrow_date }}</span>
                                </td>
                                <td class="table-cell">
                                    <span class="return-date-badge">{{ $record->return_date }}</span>
                                </td>
                                <td class="table-cell">
                                    <div class="action-buttons">
                                        <a href="{{ route('borrow-records.edit', $record->id) }}" class="edit-btn">
                                            Sửa
                                        </a>
                                        <form action="{{ route('borrow-records.destroy', $record->id) }}" method="POST"
                                              style="display: inline-block;"
                                              onsubmit="return confirm('Bạn chắc chắn muốn xoá?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn">Xoá</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">
                                    <div>Không có phiếu mượn nào.</div>
                                    <small style="color: #a0aec0; margin-top: 0.5rem; display: block;">
                                        Hãy thêm phiếu mượn đầu tiên của bạn!
                                    </small>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>