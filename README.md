# 📚 Library Management System - Laravel Project

Ứng dụng quản lý thư viện được xây dựng bằng Laravel, hỗ trợ quản lý sinh viên, sách và phiếu mượn sách. Hệ thống có tính năng đăng nhập, xác thực, phân quyền, và đảm bảo bảo mật đầu vào.

## 🧑‍🎓 Thông tin sinh viên

- **Họ và tên:** Nguyễn Xuân Hậu  
- **Mã sinh viên:** 23010206


---

## ✅ Tính năng chính

1. **Xác thực & Định danh**
    - Sử dụng Laravel Breeze
    - Đăng ký / Đăng nhập / Đăng xuất
    - Bảo vệ route bằng middleware `auth`
    - Session & token-based CSRF protection

2. **Các đối tượng chính**
    1. Book
        - Thuộc tính: `title`, `author`, `genre`, `isbn`, `quantity`
        - Quan hệ: 1-n với BorrowRecord
        - **Chức năng:** Thêm / Sửa / Xoá / Danh sách
          
    2. Student
        - Thuộc tính: `name`, `email`, `student_code`
        - Quan hệ: 1-n với BorrowRecord
        - **Chức năng:** Thêm / Sửa / Xoá / Danh sách

    3. BorrowRecord
        - Thuộc tính: `student_id`, `book_id`, `borrow_date`, `return_date`
        - Quan hệ: n-1 với `Book`, n-1 với `Student`
        - **Chức năng:** Thêm / Sửa / Xoá / Danh sách / Giao diện cảnh báo mượn sắp đến hạn ở dashboard


3. **CRUD**
   - CRUD đầy đủ cho `Book`, `Student`, `BorrowRecord`.
   - Khi sinh viên mượn sách, số lượng sách giảm đi.
   - Khi phiếu mượn bị xóa, sách được trả lại.
   - Nếu sách đã hết số lượng, không thể mượn.

4. **Tìm kiếm & lọc**
   - Lọc sách theo **tác giả**, **tên sách**.

5. **Bảo mật đã triển khai**
    - CSRF Protection (`@csrf`)
    - Validation dữ liệu (server-side)
    - Auth middleware (`auth`, `guest`)
    - Escape HTML output → chống XSS
    - Session & Cookie được bảo mật theo Laravel config
    - Truy vấn an toàn với Eloquent ORM (chống SQL Injection)

6.  **Cơ sở dữ liệu**
    - Sử dụng **Aiven Cloud** để lưu trữ cơ sở dữ liệu
    - Laravel `.env` đã được cấu hình để kết nối đến Aiven

---

## 🧪 Công nghệ sử dụng chính

- Laravel 12.18.0
- Laravel Breeze
- MySQL (Aiven Cloud)
- PHP 8.2.12
- HTML/CSS + Blade
- Eloquent ORM
- Tailwind CSS
- ...
---


## 🖼️ Giao diện minh họa
> Dashboard
![Screenshot 2025-06-21 035957](https://github.com/user-attachments/assets/8cf9f076-8a24-4ffb-a95b-517936cac987)

> Quản lý sách
![Screenshot 2025-06-21 040323](https://github.com/user-attachments/assets/38b4b590-0845-4df2-aa15-872fcf967a21)

> Thêm, chỉnh sửa sách
![Screenshot 2025-06-21 040509](https://github.com/user-attachments/assets/34d03ba0-551e-4937-ab90-e2082b906987)![Screenshot 2025-06-21 040525](https://github.com/user-attachments/assets/ebf7cd16-ac65-4479-947f-d3373628c432)



## 🚀 Hướng dẫn cài đặt

```bash
# Clone project
git clone: https://github.com/h4unguyxn/midterm-project
cd library-management

# Cài đặt môi trường
composer install
cp .env.example .env
php artisan key:generate

# Cấu hình Aiven Cloud DB trong .env
# DB_CONNECTION=mysql
# DB_HOST=xxx
# DB_PORT=3306
# DB_DATABASE=your_db
# DB_USERNAME=your_user
# DB_PASSWORD=your_pass

# Migrate database
php artisan migrate
npm install && npm run dev

# Chạy app
php artisan serve

## 🌐 Public Demo (Codespaces)

[Truy cập website](https://studious-space-waffle-x5xqqjx76xrqhvqv6-80.app.github.dev/)
