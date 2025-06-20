<x-app-layout>
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary: #f8fafc;
            --text: #1e293b;
            --text-light: #64748b;
            --border: #e2e8f0;
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }

        body {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow);
            transition: all 0.2s ease;
        }
        
        .card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }
        
        .nav-link {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            background: white;
            border-radius: 8px;
            color: var(--text);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s ease;
            box-shadow: var(--shadow);
        }
        
        .nav-link:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-1px);
        }
        
        .nav-link svg {
            width: 16px;
            height: 16px;
            margin-right: 8px;
        }
        
        .welcome-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border-radius: 16px;
            padding: 32px;
            margin-bottom: 32px;
            position: relative;
            overflow: hidden;
        }
        
        .welcome-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }
        
        .action-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            text-decoration: none;
            color: var(--text);
            transition: all 0.2s ease;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
        }
        
        .action-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary);
        }
        
        .action-card .icon {
            width: 48px;
            height: 48px;
            background: var(--secondary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }
        
        .action-card.books .icon { background: #dbeafe; color: var(--primary); }
        .action-card.students .icon { background: #dcfce7; color: #16a34a; }
        .action-card.borrow .icon { background: #fef3c7; color: #d97706; }
        
        .action-card h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text);
        }
        
        .action-card p {
            color: var(--text-light);
            font-size: 14px;
            line-height: 1.5;
        }
        
        .status-section {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        
        .status-header {
            background: var(--secondary);
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
        }
        
        .status-header h3 {
            font-size: 18px;
            font-weight: 600;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .status-content {
            padding: 24px;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background: var(--secondary);
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-light);
        }
        
        td {
            padding: 12px 16px;
            border-bottom: 1px solid var(--border);
            color: var(--text);
        }
        
        tr:hover {
            background: var(--secondary);
        }
        
        .due-date {
            background: #fef3c7;
            color: #92400e;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 500;
        }
        
        .no-records {
            text-align: center;
            padding: 48px 24px;
            color: var(--text-light);
        }
        
        .no-records .icon {
            width: 64px;
            height: 64px;
            background: var(--secondary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            color: #16a34a;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }
        
        .header-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--text);
        }
        
        .nav-container {
            display: flex;
            gap: 12px;
        }
        
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 16px;
                align-items: stretch;
            }
            
            .nav-container {
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .welcome-section {
                padding: 24px;
                text-align: center;
            }
            
            .action-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <x-slot name="header">
        <div class="header-container">
            <h2 class="header-title">
                {{ __('Bảng điều khiển') }}
            </h2>
            
            <div class="nav-container">
                <a href="/books" class="nav-link">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Sách
                </a>
                
                <a href="/students" class="nav-link">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                    </svg>
                    Sinh viên
                </a>
                
                <a href="/borrow-records" class="nav-link">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                    </svg>
                    Phiếu mượn
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="welcome-section">
                <h3 class="text-2xl font-bold mb-2">{{ __("Chào mừng bạn đến với Hệ thống quản lý thư viện!") }}</h3>
                <p class="text-lg opacity-90">{{ __("Bạn đã đăng nhập và sẵn sàng quản lý thư viện của mình.") }}</p>
            </div>

            <!-- Quick Actions -->
            <div class="action-grid">
                <a href="/books" class="action-card books">
                    <div class="icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3>Quản lý sách</h3>
                    <p>Thêm, chỉnh sửa và xóa sách trong thư viện</p>
                </a>

                <a href="/students" class="action-card students">
                    <div class="icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                    </div>
                    <h3>Quản lý sinh viên</h3>
                    <p>Đăng ký và quản lý thông tin sinh viên</p>
                </a>

                <a href="/borrow-records" class="action-card borrow">
                    <div class="icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <h3>Quản lý phiếu mượn</h3>
                    <p>Theo dõi việc mượn và trả sách của sinh viên</p>
                </a>
            </div>

            <!-- Status Section -->
            <div class="status-section">
                @if($borrowRecordsDueSoon->count() > 0)
                    <div class="status-header">
                        <h3>
                            <span style="color: #f59e0b;">⚠️</span>
                            Phiếu mượn sắp đến hạn ({{ $borrowRecordsDueSoon->count() }})
                        </h3>
                    </div>
                    <div class="status-content">
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sinh viên</th>
                                        <th>Tên sách</th>
                                        <th>Ngày mượn</th>
                                        <th>Ngày trả</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($borrowRecordsDueSoon as $record)
                                        <tr>
                                            <td>{{ $record->student->name }}</td>
                                            <td>{{ $record->book->title }}</td>
                                            <td>{{ $record->borrow_date }}</td>
                                            <td>
                                                <span class="due-date">{{ $record->return_date }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="no-records">
                        <div class="icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 32px; height: 32px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 8px; color: var(--text);">Không có phiếu mượn nào sắp đến hạn</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>