<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sách mới</title>
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-hover: #2563eb;
            --success-color: #10b981;
            --success-hover: #059669;
            --gray-color: #6b7280;
            --gray-hover: #374151;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --border-radius: 16px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #ffecd2 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px 0;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 10px;
            letter-spacing: -0.025em;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: var(--border-radius);
            padding: 40px;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 14px;
            letter-spacing: 0.025em;
        }

        .form-input {
            width: 100%;
            background: linear-gradient(145deg, #ffffff 0%, #f9fafb 100%);
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 16px 20px;
            font-size: 16px;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1), var(--shadow-md);
            transform: translateY(-2px);
        }

        .form-input:hover {
            border-color: #d1d5db;
            box-shadow: var(--shadow-md);
        }

        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 6px;
            font-weight: 500;
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 16px;
            margin-top: 32px;
        }

        .btn {
            padding: 16px 32px;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.025em;
            transition: var(--transition);
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn::before {
            content: '';
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
            background: linear-gradient(135deg, var(--gray-color) 0%, #4b5563 100%);
            color: white;
        }

        .btn-cancel:hover {
            background: linear-gradient(135deg, var(--gray-hover) 0%, #374151 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-save {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
            color: white;
        }

        .btn-save:hover {
            background: linear-gradient(135deg, var(--success-hover) 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        

        @media (max-width: 640px) {
            .container {
                padding: 20px 0;
            }
            
            .form-container {
                padding: 24px;
                margin: 0 16px;
            }
            
            .header h2 {
                font-size: 2rem;
            }
            
            .button-group {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Thêm sách mới</h2>
        </div>

        <div class="form-container">
            
            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-input" placeholder="Nhập tiêu đề sách">
                    @error('title') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="author" class="form-label">Tác giả</label>
                    <input type="text" id="author" name="author" value="{{ old('author') }}" class="form-input" placeholder="Nhập tên tác giả">
                    @error('author') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}" class="form-input" placeholder="Nhập mã ISBN">
                    @error('isbn') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" class="form-input" placeholder="Nhập số lượng" min="0">
                    @error('quantity') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="button-group">
                    <a href="{{ route('books.index') }}" class="btn btn-cancel">Hủy</a>
                    <button type="submit" class="btn btn-save">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>