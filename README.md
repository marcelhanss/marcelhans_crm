Aplikasi CRM (Customer Relationship Management) sederhana yang dibuat sebagai bagian dari technical test magang.

Penjelasan Singkat ERD

User
Memiliki role: sales atau manager
Sales bertugas mengelola Leads
Manager bertugas menyetujui Project

Leads
Dibuat oleh Sales
Menjadi sumber data Customer

Customer
Berasal dari Lead

Product
Produk layanan yang ditawarkan (misal: paket internet)

Project
Menghubungkan Lead, Customer, dan Product
Disetujui oleh Manager (approved_by)

Tool 
Framework: Laravel 11
Database: Postgres 14
Seeder: Laravel Seeder

USERSEEDER 
Sales:
name	 : Marcel
email    : sales@ptsmart.test
password : sales

Manager:
name	 : Hans
email    : manager@ptsmart.test
password : manager

LEADSEEDER
PT Marcel Hans
CV Hans Network
(Keduanya otomatis terhubung ke user dengan role Sales)

PRODUCTSEEDER
Provider 20 Mbps
Provider 50 Mbps
Seeder ini memastikan aplikasi dapat langsung digunakan tanpa input manual awal

Cara menjalankan Proyek
git clone <repository-url>
cd project-folder
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve

Akses aplikasi di:
http://127.0.0.1:8000

Author
Marcel Hans
Mahasiswa Teknik Informatika