# 🍽️ Laravel Restaurant Management System

[![Laravel](https://img.shields.io/badge/Laravel-10.10-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=for-the-badge&logo=php)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql)](https://mysql.com)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

A fully-featured web application for restaurant management, built with Laravel.  
It includes a customer-friendly frontend for ordering and a secure admin dashboard to manage food items, categories, and orders.

---

## 📸 Screenshots

### Customer Interface
- **Menu Browsing**: Clean and intuitive menu display with categories
- **Cart System**: Easy-to-use shopping cart functionality
- **Order Placement**: Seamless checkout process
- **Responsive Design**: Optimized for mobile, tablet, and desktop

### Admin Dashboard
- **Analytics Dashboard**: Real-time statistics on orders and revenue
- **Menu Management**: Full CRUD operations for food items and categories
- **Order Management**: Track and update order statuses
- **User Management**: Role-based access control

---

## ✅ Features

### 👨‍🍳 Customer Interface
- Browse food menu by category
- Add items to cart and place orders
- Responsive design for mobile and desktop
- Smooth and clean UI
- Real-time cart updates
- Order tracking

### 🛠️ Admin Dashboard
- Secure login with role-based access
- Dashboard with order & menu statistics
- Create, edit, or delete menu categories
- Add and manage food items with images
- Track and update customer orders
- View complete order history
- Revenue and sales analytics
- User management

---

## 🧪 Tech Stack

- **Backend**: Laravel 10.10 (PHP 8.1+)
- **Frontend**: Blade Templates, Bootstrap 5, Vite
- **Database**: MySQL 8.0+
- **Authentication**: Laravel Auth (Built-in)
- **ORM**: Eloquent ORM
- **Build Tool**: Vite
- **Package Manager**: Composer, NPM

---

## 🚀 Getting Started

Follow these steps to install and run the project locally:

### Prerequisites
- PHP >= 8.1
- Composer >= 2.0
- Node.js >= 16.0
- MySQL >= 8.0
- Git

### 1. Clone the Repository
```bash
git clone https://github.com/Hassankrecht/restaurant-laravel-system.git
cd restaurant-laravel-system
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database
Edit the `.env` file and set your database credentials:
```env
DB_DATABASE=restaurant_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 5. Run Migrations
```bash
php artisan migrate
php artisan db:seed
```

### 6. Build Assets
```bash
npm run dev
```

### 7. Start Development Server
```bash
php artisan serve
```

Now visit `http://localhost:8000` in your browser.

---

## 📁 Project Structure

```
restaurant-laravel-system/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   ├── Models/
│   └── ...
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── css/
│   ├── js/
│   └── img/
├── resources/
│   ├── views/
│   └── ...
├── routes/
│   ├── web.php
│   └── api.php
└── ...
```

---

## 🔧 Configuration

### Admin Credentials
After running database seeders, you can login with:
- **Email**: admin@example.com
- **Password**: password

*Note: Please change these credentials in production.*

### Environment Variables
Key environment variables in `.env`:
- `APP_NAME`: Application name
- `APP_ENV`: Environment (local/production)
- `APP_DEBUG`: Debug mode (true/false)
- `DB_*`: Database configuration
- `MAIL_*`: Email configuration

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

---

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 👨‍💻 Author

**Hassan Krecht**
- GitHub: [@Hassankrecht](https://github.com/Hassankrecht)
- Project: [restaurant-laravel-system](https://github.com/Hassankrecht/restaurant-laravel-system)

---

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP Framework for Web Artisans
- [Bootstrap](https://getbootstrap.com) - Front-end framework
- All contributors and supporters of this project

---

## 📞 Support

If you have any questions or issues, please:
- Open an issue on [GitHub Issues](https://github.com/Hassankrecht/restaurant-laravel-system/issues)
- Contact the author via GitHub

---

**⭐ If you find this project helpful, please consider giving it a star!**
