<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            Chỉnh sửa phiếu mượn
        </h2>
    </x-slot>

    <style>
        /* Enhanced styling for edit form */
        .form-container {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #e0f2fe 0%, #1565c0 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .form-wrapper {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin: 0 auto;
            max-width: 600px;
            animation: slideInFromBottom 0.6s ease-out;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid rgba(226, 232, 240, 0.5);
        }
        
        .form-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #48bb78, #38a169);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .form-subtitle {
            color: #718096;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .form-group {
            margin-bottom: 2rem;
            animation: fadeInUp 0.6s ease-out;
            position: relative;
        }
        
        .form-group:nth-child(2) { animation-delay: 0.1s; }
        .form-group:nth-child(3) { animation-delay: 0.2s; }
        .form-group:nth-child(4) { animation-delay: 0.3s; }
        .form-group:nth-child(5) { animation-delay: 0.4s; }
        
        .form-label {
            display: block;
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: #4a5568;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            position: relative;
            padding-left: 20px;
        }
        
        .form-label::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 16px;
            background: linear-gradient(135deg, #48bb78, #38a169);
            border-radius: 2px;
        }
        
        .form-control {
            width: 100%;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            color: #2d3748;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
            font-weight: 500;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #48bb78;
            box-shadow: 0 0 0 3px rgba(72, 187, 120, 0.1), 0 4px 12px rgba(72, 187, 120, 0.15);
            background: white;
            transform: translateY(-1px);
        }
        
        .form-control:hover {
            border-color: #cbd5e0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }
        
        .form-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3E%3C/svg%3E");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 3rem;
            appearance: none;
        }
        
        .error-message {
            color: #e53e3e;
            font-size: 0.875rem;
            font-weight: 500;
            margin-top: 0.5rem;
            padding: 0.5rem 0.75rem;
            background: rgba(229, 62, 62, 0.1);
            border-radius: 8px;
            border-left: 4px solid #e53e3e;
            animation: shake 0.5s ease-in-out;
        }
        
        .form-actions {
            display: flex;
            justify-content: end;
            gap: 1rem;
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 2px solid rgba(226, 232, 240, 0.5);
        }
        
        .btn {
            padding: 0.875rem 1.75rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 120px;
            justify-content: center;
        }
        
        .btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn-cancel {
            background: linear-gradient(135deg, #718096, #4a5568);
            color: white;
            box-shadow: 0 4px 12px rgba(113, 128, 150, 0.3);
        }
        
        .btn-cancel:hover {
            background: linear-gradient(135deg, #4a5568, #2d3748);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(113, 128, 150, 0.4);
        }
        
        .btn-update {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
            box-shadow: 0 4px 12px rgba(72, 187, 120, 0.3);
        }
        
        .btn-update:hover {
            background: linear-gradient(135deg, #38a169, #2f855a);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(72, 187, 120, 0.4);
        }
        
        .btn-cancel::after {
            content: "↩️";
            font-size: 1rem;
        }
        
        .btn-update::after {
            content: "💾";
            font-size: 1rem;
        }
        
        .btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none !important;
        }
        
        .btn-loading::after {
            content: "";
            width: 16px;
            height: 16px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        /* Animations */
        @keyframes slideInFromBottom {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .form-container {
                padding: 1rem;
            }
            
            .form-wrapper {
                padding: 1.5rem;
                border-radius: 16px;
            }
            
            .form-title {
                font-size: 1.5rem;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
            
            .form-label {
                padding-left: 0;
            }
            
            .form-label::before {
                display: none;
            }
        }
    </style>

    <div class="form-container">
        <div class="form-wrapper">
            <div class="form-header">
                <h1 class="form-title">Chỉnh sửa phiếu mượn</h1>
                <p class="form-subtitle">Cập nhật thông tin phiếu mượn sách</p>
            </div>

            <form method="POST" action="{{ route('borrow-records.update', $borrowRecord->id) }}">
                @csrf
                @method('PUT')

                {{-- Sinh viên --}}
                <div class="form-group">
                    <label for="student_id" class="form-label">Sinh viên</label>
                    <select name="student_id" id="student_id" class="form-control form-select">
                        <option value="">-- Chọn sinh viên --</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}"
                                {{ old('student_id', $borrowRecord->student_id) == $student->id ? 'selected' : '' }}>
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Sách --}}
                <div class="form-group">
                    <label for="book_id" class="form-label">Sách</label>
                    <select name="book_id" id="book_id" class="form-control form-select">
                        <option value="">-- Chọn sách --</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}"
                                {{ old('book_id', $borrowRecord->book_id) == $book->id ? 'selected' : '' }}>
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('book_id')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Ngày mượn --}}
                <div class="form-group">
                    <label for="borrow_date" class="form-label">Ngày mượn</label>
                    <input type="date" name="borrow_date" id="borrow_date"
                           value="{{ old('borrow_date', $borrowRecord->borrow_date) }}"
                           class="form-control">
                    @error('borrow_date')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Ngày trả --}}
                <div class="form-group">
                    <label for="return_date" class="form-label">Ngày trả</label>
                    <input type="date" name="return_date" id="return_date"
                           value="{{ old('return_date', $borrowRecord->return_date) }}"
                           class="form-control">
                    @error('return_date')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nút hành động --}}
                <div class="form-actions">
                    <a href="{{ route('borrow-records.index') }}" class="btn btn-cancel">
                        Hủy
                    </a>
                    <button type="submit" class="btn btn-update" id="updateBtn">
                        <span id="updateText">Cập nhật</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const borrowDate = document.getElementById('borrow_date');
            const returnDate = document.getElementById('return_date');
            const form = document.querySelector('form');
            const updateBtn = document.getElementById('updateBtn');
            
            // Validate return date is after borrow date
            borrowDate.addEventListener('change', function() {
                if (this.value) {
                    returnDate.min = this.value;
                }
            });
            
            // Confirmation on form submit
            form.addEventListener('submit', function(e) {
                if (!confirm('Bạn có chắc chắn muốn cập nhật phiếu mượn này?')) {
                    e.preventDefault();
                    return;
                }
                
                // Loading state
                updateBtn.disabled = true;
                updateBtn.classList.add('btn-loading');
                updateBtn.querySelector('#updateText').textContent = 'Đang cập nhật...';
            });
            
            // Set initial min date for return date
            if (borrowDate.value) {
                returnDate.min = borrowDate.value;
            }
        });
    </script>
</x-app-layout>