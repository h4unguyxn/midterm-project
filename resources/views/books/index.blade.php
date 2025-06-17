<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">Danh sách sách</h2>
    </x-slot>

    <style>
        /* Enhanced styling for the book list */
        .book-container {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #ffecd2 0%, #764ba2 100%);
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
            max-width: 1400px;
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

        .info-alert {
            background: linear-gradient(135deg, #4299e1, #3182ce);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 16px rgba(66, 153, 225, 0.3);
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

        /* Filter Section Styles */
        .filter-section {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .filter-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            color: #2d3748;
            font-weight: 600;
            font-size: 1.125rem;
        }

        .filter-header::before {
            content: "🔍";
            font-size: 1.5rem;
        }

        .filter-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            align-items: end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #4a5568;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-input {
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            background: white;
            color: #2d3748;
        }

        .form-input:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
            background: #f7fafc;
        }

        .form-select {
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            background: white;
            color: #2d3748;
            cursor: pointer;
        }

        .form-select:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
        }

        .filter-buttons {
            display: flex;
            gap: 1rem;
            justify-content: flex-start;
        }

        .search-btn {
            background: linear-gradient(135deg, #4299e1, #3182ce);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(66, 153, 225, 0.3);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .search-btn:hover {
            background: linear-gradient(135deg, #3182ce, #2c5282);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(66, 153, 225, 0.4);
        }

        .reset-btn {
            background: linear-gradient(135deg, #718096, #4a5568);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .reset-btn:hover {
            background: linear-gradient(135deg, #4a5568, #2d3748);
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }
        
        .book-count {
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
        
        .add-book-btn {
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
        
        .add-book-btn:hover {
            background: linear-gradient(135deg, #3182ce, #2c5282);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(66, 153, 225, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .add-book-btn::before {
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
        
        .book-table {
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
            text-decoration: none;
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
            content: "📖";
            font-size: 3rem;
            display: block;
            margin-bottom: 1rem;
        }
        
        .quantity-badge {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
        }

        .quantity-badge.out-of-stock {
            background: linear-gradient(135deg, #e53e3e, #c53030);
        }
        
        .isbn-code {
            font-family: 'Courier New', monospace;
            background: #f7fafc;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            font-size: 0.8rem;
            color: #4a5568;
            border: 1px solid #e2e8f0;
        }

        .genre-badge {
            background: linear-gradient(135deg, #9f7aea, #805ad5);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
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

            .filter-form {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .filter-buttons {
                flex-direction: column;
                align-items: stretch;
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
        }
    </style>

    <div class="book-container">
        <div class="content-wrapper">
            @if(session('success'))
                <div class="success-alert">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <!-- Filter Section -->
            <div class="filter-section">
                <div class="filter-header">
                    Bộ lọc tìm kiếm
                </div>
                <form method="GET" action="{{ route('books.index') }}">
                    <div class="filter-form">
                        <div class="form-group">
                            <label class="form-label">Tiêu đề sách</label>
                            <input 
                                type="text" 
                                name="title" 
                                value="{{ request('title') }}" 
                                placeholder="Nhập tên sách..."
                                class="form-input"
                            >
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tác giả</label>
                            <select name="author" class="form-select">
                                <option value="">-- Tất cả tác giả --</option>
                                @if(isset($authors))
                                    @foreach($authors as $author)
                                        <option value="{{ $author }}" {{ request('author') == $author ? 'selected' : '' }}>
                                            {{ $author }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        @if(isset($genres) && $genres->count() > 0)
                        <div class="form-group">
                            <label class="form-label">Thể loại</label>
                            <select name="genre" class="form-select">
                                <option value="">-- Tất cả thể loại --</option>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
                                        {{ $genre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="form-group">
                            <label class="form-label">Tình trạng</label>
                            <select name="stock_status" class="form-select">
                                <option value="">-- Tất cả --</option>
                                <option value="available" {{ request('stock_status') == 'available' ? 'selected' : '' }}>
                                    Còn hàng
                                </option>
                                <option value="out_of_stock" {{ request('stock_status') == 'out_of_stock' ? 'selected' : '' }}>
                                    Hết hàng
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="filter-buttons">
                                <button type="submit" class="search-btn">
                                    🔍 Tìm kiếm
                                </button>
                                <a href="{{ route('books.index') }}" class="reset-btn">
                                    🔄 Reset
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Search Results Info -->
            @if(request()->hasAny(['title', 'author', 'genre', 'stock_status']))
                <div class="info-alert">
                    🎯 <strong>Kết quả tìm kiếm:</strong> Tìm thấy {{ $books->count() }} cuốn sách
                    @if(request('title')) - Tiêu đề: "{{ request('title') }}" @endif
                    @if(request('author')) - Tác giả: "{{ request('author') }}" @endif
                    @if(request('genre')) - Thể loại: "{{ request('genre') }}" @endif
                    @if(request('stock_status'))
                        - Tình trạng: {{ request('stock_status') == 'available' ? 'Còn hàng' : 'Hết hàng' }}
                    @endif
                </div>
            @endif

            <div class="header-section">
                <h3 class="book-count">Tổng cộng: {{ $books->count() }} sách</h3>
                <a href="{{ route('books.create') }}" class="add-book-btn">
                    Thêm sách
                </a>
            </div>

            <div class="table-container">
                <table class="book-table">
                    <thead class="table-header">
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Tác giả</th>
                            @if(isset($genres) && $genres->count() > 0)
                            <th>Thể loại</th>
                            @endif
                            <th>ISBN</th>
                            <th>Số lượng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                            <tr class="table-row">
                                <td class="table-cell">
                                    <strong>{{ $book->title }}</strong>
                                </td>
                                <td class="table-cell">{{ $book->author }}</td>
                                @if(isset($genres) && $genres->count() > 0)
                                <td class="table-cell">
                                    @if($book->genre)
                                        <span class="genre-badge">{{ $book->genre }}</span>
                                    @else
                                        <span style="color: #a0aec0; font-style: italic;">Chưa xác định</span>
                                    @endif
                                </td>
                                @endif
                                <td class="table-cell">
                                    <span class="isbn-code">{{ $book->isbn }}</span>
                                </td>
                                <td class="table-cell">
                                    <span class="quantity-badge {{ $book->quantity == 0 ? 'out-of-stock' : '' }}">
                                        {{ $book->quantity }}
                                    </span>
                                </td>
                                <td class="table-cell">
                                    <div class="action-buttons">
                                        <a href="{{ route('books.edit', $book->id) }}" class="edit-btn">
                                            ✏️ Sửa
                                        </a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                              style="display: inline-block;"
                                              onsubmit="return confirm('Bạn chắc chắn muốn xoá sách này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn">🗑️ Xoá</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ isset($genres) && $genres->count() > 0 ? '6' : '5' }}" class="empty-state">
                                    <div>
                                        @if(request()->hasAny(['title', 'author', 'genre', 'stock_status']))
                                            Không tìm thấy sách nào phù hợp với điều kiện tìm kiếm.
                                        @else
                                            Không có sách nào được tìm thấy.
                                        @endif
                                    </div>
                                    <small style="color: #a0aec0; margin-top: 0.5rem; display: block;">
                                        @if(request()->hasAny(['title', 'author', 'genre', 'stock_status']))
                                            Hãy thử thay đổi điều kiện tìm kiếm!
                                        @else
                                            Hãy thêm sách đầu tiên của bạn!
                                        @endif
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