# 📚 Library Management System - Laravel Project

Ứng dụng quản lý thư viện được xây dựng bằng Laravel, hỗ trợ quản lý sinh viên, sách và phiếu mượn sách. Hệ thống có tính năng đăng nhập, xác thực, phân quyền, và đảm bảo bảo mật đầu vào.

---

## ✅ Tính năng chính

1. **Authentication & Authorization**
   - Sử dụng Laravel Breeze để xác thực người dùng.
   - Đăng ký, đăng nhập, và logout.
   - Chỉ người dùng xác thực mới được thao tác với hệ thống.

2. **Đối tượng chính**
   - `User`: người quản trị hệ thống.
   - `Book`: quản lý sách (title, author, genre, quantity, isbn).
   - `Student`: quản lý thông tin sinh viên.
   - `BorrowRecord`: lưu thông tin phiếu mượn sách giữa sinh viên và sách.

3. **CRUD**
   - CRUD đầy đủ cho `Book`, `Student`, `BorrowRecord`.
   - Khi sinh viên mượn sách, số lượng sách giảm đi.
   - Khi phiếu mượn bị xóa, sách được trả lại.
   - Nếu sách đã hết số lượng, không thể mượn.

4. **Tìm kiếm & lọc**
   - Lọc sách theo **tác giả**, **tên sách**.

5. **Security**
   - CSRF protection qua middleware của Laravel.
   - XSS protection tự động với Blade.
   - SQL Injection được ngăn bởi Eloquent ORM.
   - Validation toàn bộ dữ liệu đầu vào.
   - Sử dụng session và cookies an toàn.

6.  **Cơ sở dữ liệu**
   - Dữ liệu được lưu trữ trên MySQL Cloud thông qua **Aiven.io**.
   - Sử dụng `.env` để kết nối.

---

## 🧪 Công nghệ sử dụng chính

- Laravel 10.x
- Laravel Breeze
- MySQL (Aiven Cloud)
- PHP 8.2+
- HTML/CSS + Blade
- Eloquent ORM
- ...

---

## 🚀 Hướng dẫn cài đặt

```bash
git clone https://github.com/your-username/library-management.git
cd library-management
composer install
cp .env.example .env
php artisan key:generate

# Cấu hình DB trong file .env
# DB_CONNECTION=mysql
# DB_HOST=xxx
# DB_PORT=3306
# DB_DATABASE=your_db
# DB_USERNAME=your_user
# DB_PASSWORD=your_pass

php artisan migrate
npm install && npm run dev
php artisan serve
