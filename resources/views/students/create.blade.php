<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            Thêm sinh viên
        </h2>
    </x-slot>

    <style>
        /* Enhanced Student Form Styles */
        .form-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .form-wrapper {
            max-width: 600px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeInUp 0.6s ease-out;
        }

        .form-title {
            text-align: center;
            margin-bottom: 2rem;
            color: #1f2937;
            font-size: 1.875rem;
            font-weight: 700;
            position: relative;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            color: #374151;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
            letter-spacing: 0.01em;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f9fafb;
            color: #374151;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        .form-input:hover {
            border-color: #d1d5db;
            background: white;
        }

        .form-input.error {
            border-color: #ef4444;
            background: #fef2f2;
        }

        .form-input.error:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        .input-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.1rem;
            pointer-events: none;
            transition: color 0.3s ease;
        }

        .form-input:focus + .input-icon {
            color: #667eea;
        }

        .form-buttons {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            font-size: 1rem;
            min-width: 120px;
            justify-content: center;
        }

        .btn-cancel {
            background: #f3f4f6;
            color: #374151;
            border: 2px solid #e5e7eb;
        }

        .btn-cancel:hover {
            background: #e5e7eb;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-subtitle {
            color: #6b7280;
            font-size: 1rem;
            margin-top: 0.5rem;
        }

        .required-indicator {
            color: #ef4444;
            margin-left: 3px;
        }

        /* Loading Animation */
        .btn-primary.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .btn-primary.loading::after {
            content: '';
            width: 16px;
            height: 16px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 8px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes fadeInUp {
            0% {
                transform: translateY(30px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            .form-wrapper {
                padding: 0 1rem;
            }
            
            .form-card {
                padding: 2rem 1.5rem;
                border-radius: 15px;
            }
            
            .form-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }

        /* Form Validation Styles */
        .form-group.has-error .form-label {
            color: #ef4444;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        /* Success Animation */
        @keyframes checkmark {
            0% {
                stroke-dashoffset: 50;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }

        .success-icon {
            stroke-dasharray: 50;
            stroke-dashoffset: 50;
            animation: checkmark 0.5s ease-in-out forwards;
        }
    </style>

    <div class="form-container">
        <div class="form-wrapper">
            <div class="form-card">
                <div class="form-header">
                    <h1 class="form-title">Thêm sinh viên mới</h1>
                    <p class="form-subtitle">Điền thông tin sinh viên vào form bên dưới</p>
                </div>

                <form action="{{ route('students.store') }}" method="POST" id="studentForm">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">
                            Tên sinh viên
                            <span class="required-indicator">*</span>
                        </label>
                        <div style="position: relative;">
                            <input type="text" name="name" id="name" class="form-input" required 
                                   placeholder="Nhập tên đầy đủ của sinh viên">
                            <span class="input-icon">👤</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            Email
                            <span class="required-indicator">*</span>
                        </label>
                        <div style="position: relative;">
                            <input type="email" name="email" id="email" class="form-input" required
                                   placeholder="example@email.com">
                            <span class="input-icon">📧</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="student_code" class="form-label">
                            Mã sinh viên
                            <span class="required-indicator">*</span>
                        </label>
                        <div style="position: relative;">
                            <input type="text" name="student_code" id="student_code" class="form-input" required
                                   placeholder="VD: SV001, 2023001">
                            <span class="input-icon">🎓</span>
                        </div>
                    </div>

                    <div class="form-buttons">
                        <a href="{{ route('students.index') }}" class="btn btn-cancel">
                            ← Hủy
                        </a>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            💾 Lưu sinh viên
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Form validation and enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('studentForm');
            const submitBtn = document.getElementById('submitBtn');
            const inputs = form.querySelectorAll('.form-input');

            // Add real-time validation
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(this);
                });

                input.addEventListener('input', function() {
                    // Remove error state when user starts typing
                    if (this.classList.contains('error')) {
                        this.classList.remove('error');
                        const errorMsg = this.parentNode.parentNode.querySelector('.error-message');
                        if (errorMsg) {
                            errorMsg.remove();
                        }
                    }
                });
            });

            // Form submission with loading state
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                inputs.forEach(input => {
                    if (!validateField(input)) {
                        isValid = false;
                    }
                });

                if (isValid) {
                    submitBtn.classList.add('loading');
                    submitBtn.textContent = 'Đang lưu...';
                }
            });

            function validateField(field) {
                const value = field.value.trim();
                const fieldGroup = field.closest('.form-group');
                
                // Remove existing error message
                const existingError = fieldGroup.querySelector('.error-message');
                if (existingError) {
                    existingError.remove();
                }

                if (!value) {
                    showError(field, 'Trường này không được để trống');
                    return false;
                }

                if (field.type === 'email' && !isValidEmail(value)) {
                    showError(field, 'Email không hợp lệ');
                    return false;
                }

                field.classList.remove('error');
                return true;
            }

            function showError(field, message) {
                field.classList.add('error');
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.innerHTML = `⚠️ ${message}`;
                field.closest('.form-group').appendChild(errorDiv);
            }

            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
        });
    </script>
</x-app-layout>