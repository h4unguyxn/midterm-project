<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Danh sách sinh viên
        </h2>
    </x-slot>

    <style>
        /* Enhanced Student List Styles */
        .student-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .success-alert {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            color: #065f46;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(132, 250, 176, 0.3);
            border-left: 4px solid #10b981;
            animation: slideInFromTop 0.5s ease-out;
        }

        .add-student-btn {
            background: linear-gradient(135deg, #ffabab 0%, #ff4949 100%);
            color: white;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .add-student-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
            background: linear-gradient(135deg, #e64444 0%, #aa0000 100%);
        }

        .add-student-btn::before {
            content: '+';
            font-size: 1.2em;
            font-weight: bold;
        }

        .table-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .enhanced-table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-header {
            background: linear-gradient(135deg, #000000 0%, #000000 100%);
            color: white;
        }

        .table-header th {
            padding: 1.5rem 1.5rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            position: relative;
        }

        .table-header th:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 25%;
            height: 50%;
            width: 1px;
            background: rgba(255, 255, 255, 0.2);
        }

        .table-row {
            transition: all 0.3s ease;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-row:hover {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            transform: scale(1.01);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .table-cell {
            padding: 1.25rem 1.5rem;
            color: #374151;
            font-weight: 500;
            vertical-align: middle;
        }

        .student-name {
            font-weight: 600;
            color: #1f2937;
        }

        .student-email {
            color: #6b7280;
        }

        .student-code {
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            color: #3730a3;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.875rem;
            display: inline-block;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-edit {
            color: #f59e0b;
            text-decoration: none;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 6px;
            transition: all 0.2s ease;
            background: rgba(245, 158, 11, 0.1);
        }

        .btn-edit:hover {
            background: rgba(245, 158, 11, 0.2);
            transform: translateY(-1px);
        }

        .btn-delete {
            color: #ef4444;
            background: rgba(239, 68, 68, 0.1);
            border: none;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.2);
            transform: translateY(-1px);
        }

        .separator {
            color: #d1d5db;
            margin: 0 4px;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1.5rem;
            color: #6b7280;
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .actions-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            border-radius: 16px;
            border: 1px solid rgba(203, 213, 224, 0.5);
        }


        .student-count {
            font-size: 1.125rem;
            font-weight: 600;
            color: #4a5568;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .book-count::before {
            content: "📚";
            font-size: 1.5rem;
        }

        /* Animations */
        @keyframes slideInFromTop {
            0% {
                transform: translateY(-20px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .table-container {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .content-wrapper {
                padding: 0 1rem;
            }
            
            .table-header th,
            .table-cell {
                padding: 1rem 0.75rem;
            }
            
            .actions-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }
        }
    </style>

    <div class="student-container">
        <div class="content-wrapper">
            @if(session('success'))
                <div class="success-alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="actions-header">
                <h3 class="student-count">👨🏻‍🎓 Tổng cộng: {{ $students->count() }} sinh viên</h3>
                <a href="{{ route('students.create') }}" class="add-student-btn">
                    Thêm sinh viên
                </a>
            </div>

            <div class="table-container">
                <table class="enhanced-table">
                    <thead class="table-header">
                        <tr>
                            <th>Tên sinh viên</th>
                            <th>Email</th>
                            <th>Mã sinh viên</th>
                            <th style="text-align: center;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr class="table-row">
                                <td class="table-cell">
                                    <div class="student-name">{{ $student->name }}</div>
                                </td>
                                <td class="table-cell">
                                    <div class="student-email">{{ $student->email }}</div>
                                </td>
                                <td class="table-cell">
                                    <span class="student-code">{{ $student->student_code }}</span>
                                </td>
                                <td class="table-cell">
                                    <div class="action-buttons">
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn-edit">
                                            Sửa
                                        </a>
                                        <span class="separator">|</span>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline"
                                              onsubmit="return confirm('Xác nhận xoá sinh viên?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">Xoá</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-state">
                                    <div class="empty-state-icon">👥</div>
                                    <div>Không có sinh viên nào trong danh sách.</div>
                                    <div style="margin-top: 0.5rem; font-size: 0.875rem;">Hãy thêm sinh viên đầu tiên!</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>