# PRODUCT REQUIREMENTS DOCUMENT (PRD)

# SÉLOR --- Contemporary Fashion Store

**Project Name:** SÉLOR\
**Project Type:** Web-Based Fashion Store\
**Framework:** Laravel 12\
**Frontend:** Blade Template, HTML, Custom CSS, JavaScript\
**Backend:** Laravel 12 (PHP)\
**Database:** MySQL\
**Architecture:** MVC (Model-View-Controller)\
**Version:** 1.0

------------------------------------------------------------------------

## 1. Project Overview

### 1.1 Deskripsi Project

SÉLOR merupakan website fashion store berbasis web yang dirancang untuk
memperkenalkan dan memasarkan produk pakaian unisex dengan konsep Korean
Minimalist Fashion.

Website ini memiliki dua bagian utama, yaitu halaman publik sebagai
media promosi dan katalog produk, serta halaman admin sebagai pusat
pengelolaan data produk dan kategori.

SÉLOR mengusung identitas visual minimalis, elegan, modern, dan premium
dengan tagline:

**"Defined by Simplicity."**

### 1.2 Tujuan Project

1.  Membangun website fashion store yang memiliki identitas visual
    profesional.
2.  Menyediakan katalog produk yang dinamis dan terhubung dengan
    database.
3.  Mempermudah pengelolaan produk dan kategori melalui halaman admin.
4.  Mengimplementasikan konsep MVC dan relasi Eloquent pada Laravel 12.
5.  Menerapkan pengelolaan gambar produk dan validasi data di sisi
    server.

### 1.3 Target Pengguna

-   **Public / Customer:** Pengunjung yang ingin melihat informasi dan
    katalog produk SÉLOR.
-   **Admin:** Pengelola toko yang bertanggung jawab atas pengelolaan
    produk dan kategori.

------------------------------------------------------------------------

## 2. Technology Stack

  Komponen                  Teknologi
  ------------------------- -----------------------
  Backend Framework         Laravel 12
  Programming Language      PHP
  Frontend                  HTML5, Blade
  Styling                   Pure CSS (Custom CSS)
  Client-side Interaction   Vanilla JavaScript
  Database                  MySQL
  ORM                       Eloquent ORM
  Image Storage             Laravel Storage
  Development Server        Laravel Artisan

**Catatan:** Tidak menggunakan Bootstrap, Tailwind CSS, atau framework
CSS lainnya. Seluruh komponen antarmuka dibangun menggunakan CSS secara
mandiri.

------------------------------------------------------------------------

## 3. System Architecture

Project menggunakan arsitektur MVC (Model-View-Controller).

### 3.1 Model

Model yang digunakan:

-   Category: Mengelola data kategori produk.
-   Product: Mengelola data produk fashion.

### 3.2 Controller

Controller yang digunakan:

-   HomeController: Mengambil data produk dan kategori untuk halaman
    publik.
-   Admin/DashboardController: Menampilkan ringkasan data pada dashboard
    admin.
-   Admin/ProductController: Mengelola CRUD produk.
-   Admin/CategoryController: Mengelola CRUD kategori.

### 3.3 View

Struktur tampilan menggunakan Blade Template:

-   Halaman publik menggunakan layout utama.
-   Halaman admin menggunakan layout dashboard tersendiri.
-   Komponen tampilan menggunakan Blade Components atau partials jika
    diperlukan.

------------------------------------------------------------------------

## 4. Database Design

Database menggunakan MySQL dengan minimal dua tabel yang saling
berelasi.

### 4.1 Tabel Categories

  Field         Type           Keterangan
  ------------- -------------- --------------------
  id            BIGINT         Primary Key
  name          VARCHAR(100)   Nama kategori
  slug          VARCHAR(120)   URL kategori
  description   TEXT           Deskripsi kategori
  created_at    TIMESTAMP      Waktu dibuat
  updated_at    TIMESTAMP      Waktu diperbarui

### 4.2 Tabel Products

  Field         Type            Keterangan
  ------------- --------------- ------------------------
  id            BIGINT          Primary Key
  category_id   BIGINT          Foreign Key
  name          VARCHAR(150)    Nama produk
  slug          VARCHAR(170)    URL produk
  description   TEXT            Deskripsi produk
  price         DECIMAL(12,2)   Harga produk
  stock         INTEGER         Jumlah stok
  size          VARCHAR(100)    Ukuran produk
  color         VARCHAR(100)    Warna produk
  image         VARCHAR(255)    Lokasi gambar
  is_featured   BOOLEAN         Status produk unggulan
  created_at    TIMESTAMP       Waktu dibuat
  updated_at    TIMESTAMP       Waktu diperbarui

### 4.3 Relasi Database

Relasi yang digunakan adalah One-to-Many:

-   Satu kategori dapat memiliki banyak produk.
-   Satu produk hanya dimiliki oleh satu kategori.

Relasi Eloquent:

**Category.php** - hasMany(Product::class)

**Product.php** - belongsTo(Category::class)

Foreign key `category_id` pada tabel products menghubungkan kedua tabel
tersebut.

### 4.4 Database Seeder

Seeder harus menyediakan minimal lima data produk agar halaman publik
langsung memiliki konten ketika project dijalankan.

Data awal yang disediakan:

**Kategori:** 1. Essentials 2. Tops 3. Outerwear 4. Bottoms

**Contoh Produk:**

  Nama Produk                Kategori           Harga
  -------------------------- ------------ -----------
  Essential Oversized Tee    Essentials     Rp189.000
  Relaxed Linen Shirt        Tops           Rp259.000
  Minimalist Knit Cardigan   Outerwear      Rp329.000
  Wide Leg Trousers          Bottoms        Rp289.000
  Basic Cotton Shirt         Tops           Rp219.000

Seeder juga harus menyediakan gambar produk yang valid atau mekanisme
fallback gambar agar katalog tetap tampil dengan baik.

------------------------------------------------------------------------

## 5. Public Website Requirements

Halaman publik menggunakan konsep One Page Website dengan navigasi yang
mengarah ke section tertentu menggunakan anchor.

Seluruh konten produk dan kategori harus diambil secara dinamis dari
database melalui Controller dan Model Eloquent.

### 5.1 Navbar

Komponen: - Logo SÉLOR. - Navigasi Home. - Navigasi Collections. -
Navigasi About. - Navigasi Contact. - Tombol Shop Now.

Navbar harus responsif dan memiliki navigasi mobile.

### 5.2 Hero Section

Menampilkan: - Tagline "Defined by Simplicity." - Deskripsi singkat
brand. - Tombol Explore Collection. - Gambar editorial fashion sebagai
visual utama.

### 5.3 Collections Section

Menampilkan kategori produk yang tersedia di database.

Informasi: - Nama kategori. - Jumlah atau daftar produk terkait. -
Navigasi menuju katalog.

### 5.4 Product Catalog Section

Menampilkan produk yang tersedia dari database.

Informasi setiap produk: - Foto produk. - Nama produk. - Harga. -
Kategori. - Status ketersediaan stok.

Fitur: - Menampilkan produk terbaru. - Menampilkan produk unggulan. -
Filter berdasarkan kategori. - Tampilan katalog berbentuk grid
responsif.

### 5.5 About Section

Menampilkan informasi brand SÉLOR:

-   Filosofi brand.
-   Identitas dan karakter fashion.
-   Konsep Korean Minimalist Fashion.
-   Tagline brand.

### 5.6 Contact Section

Menampilkan: - Informasi kontak. - Alamat atau lokasi usaha jika
tersedia. - Link WhatsApp atau media sosial. - Footer website.

------------------------------------------------------------------------

## 6. Admin Dashboard Requirements

Halaman admin digunakan untuk mengelola data yang ditampilkan pada
halaman publik.

Admin harus memiliki mekanisme autentikasi login dan logout. Halaman
pengelolaan hanya dapat diakses oleh pengguna yang sudah terautentikasi.

### 6.1 Login

Fitur: - Form email. - Form password. - Validasi login. - Session
authentication. - Logout.

### 6.2 Dashboard

Menampilkan ringkasan: - Total produk. - Total kategori. - Produk
unggulan. - Produk dengan stok rendah.

### 6.3 Product Management

Admin dapat melakukan operasi CRUD (Create, Read, Update, Delete).

**Create:** - Mengisi nama produk. - Memilih kategori. - Mengisi
deskripsi. - Mengisi harga. - Mengisi stok. - Mengisi ukuran dan
warna. - Mengunggah foto produk. - Menentukan status produk unggulan.

**Read:** - Menampilkan daftar produk. - Menampilkan foto, nama,
kategori, harga, dan stok.

**Update:** - Mengubah informasi produk. - Mengganti foto produk. -
Memperbarui stok dan harga.

**Delete:** - Menghapus produk. - Menghapus file gambar produk dari
storage jika sudah tidak digunakan.

### 6.4 Category Management

Admin dapat: - Menambahkan kategori. - Melihat daftar kategori. -
Mengubah kategori. - Menghapus kategori.

Kategori yang masih memiliki produk tidak boleh dihapus sebelum produk
terkait dipindahkan atau dihapus.

------------------------------------------------------------------------

## 7. Functional Requirements

  -----------------------------------------------------------------------
  ID                      Fitur                   Deskripsi
  ----------------------- ----------------------- -----------------------
  FR-01                   Public Homepage         Menampilkan informasi
                                                  brand dan katalog
                                                  produk

  FR-02                   Dynamic Product         Mengambil produk dari
                                                  database

  FR-03                   Dynamic Category        Mengambil kategori dari
                                                  database

  FR-04                   Product CRUD            Admin dapat mengelola
                                                  produk

  FR-05                   Category CRUD           Admin dapat mengelola
                                                  kategori

  FR-06                   Image Upload            Admin dapat mengunggah
                                                  gambar produk

  FR-07                   Server Validation       Validasi input
                                                  dilakukan di backend

  FR-08                   Authentication          Admin harus login untuk
                                                  mengakses dashboard

  FR-09                   Responsive Design       Website menyesuaikan
                                                  ukuran perangkat

  FR-10                   Database Seeder         Menyediakan minimal
                                                  lima produk awal
  -----------------------------------------------------------------------

------------------------------------------------------------------------

## 8. Validation Requirements

Validasi dilakukan menggunakan Laravel Validation pada sisi server.

### 8.1 Validasi Produk

  Field         Validation Rule
  ------------- ----------------------------------------------------
  name          required, string, max:150
  category_id   required, exists:categories,id
  description   required, string
  price         required, numeric, min:0
  stock         required, integer, min:0
  size          required, string, max:100
  color         required, string, max:100
  image         nullable, image, mimes:jpg,jpeg,png,webp, max:2048

### 8.2 Validasi Kategori

  Field         Validation Rule
  ------------- ---------------------------------------------------
  name          required, string, max:100
  slug          required, string, max:120, unique:categories,slug
  description   nullable, string

### 8.3 Ketentuan Validasi

-   Validasi wajib dilakukan pada backend menggunakan Laravel.
-   Pesan kesalahan ditampilkan pada halaman form.
-   Data tidak boleh disimpan jika tidak memenuhi aturan validasi.
-   Validasi gambar harus memastikan file merupakan gambar dengan format
    yang diperbolehkan.
-   Validasi harga dan stok harus memastikan tipe data sesuai.

------------------------------------------------------------------------

## 9. Image Upload Requirements

Pengelolaan gambar produk menggunakan Laravel Filesystem.

Ketentuan:

1.  Gambar diunggah melalui form produk.
2.  Format yang diperbolehkan: JPG, JPEG, PNG, dan WEBP.
3.  Ukuran maksimal gambar adalah 2 MB.
4.  File disimpan pada `storage/app/public/products`.
5.  Database hanya menyimpan path gambar.
6.  Gambar diakses melalui symbolic link `public/storage`.
7.  Penghapusan atau penggantian gambar harus menangani file lama agar
    tidak menumpuk.

Command untuk membuat symbolic link:

``` bash
php artisan storage:link
```

Contoh penyimpanan gambar:

``` php
$imagePath = $request->file('image')
    ->store('products', 'public');
```

------------------------------------------------------------------------

## 10. UI/UX Design Requirements

SÉLOR menggunakan pendekatan visual:

**Quiet Luxury × Korean Minimalism × Modern Editorial**

### 10.1 Color Palette

  Color        Hex       Usage
  ------------ --------- ----------------------
  Warm Ivory   #F5F3EE   Background
  Soft Beige   #DED8CD   Secondary Background
  Stone Grey   #AAA69D   Muted Elements
  Charcoal     #292A27   Primary Text
  Deep Olive   #55594B   Accent
  White        #FFFFFF   Surface

### 10.2 Typography

-   Heading: Cormorant Garamond.
-   Body: DM Sans.
-   Navigation: DM Sans Medium.
-   Product Information: DM Sans.

### 10.3 Design Principles

-   Menggunakan whitespace yang cukup.
-   Layout editorial dengan komposisi asimetris jika diperlukan.
-   Mengutamakan fotografi produk berkualitas.
-   Menghindari penggunaan gradient berlebihan.
-   Menggunakan border dan shadow secara minimal.
-   Mengutamakan konsistensi visual.
-   Menggunakan transisi dan animasi sederhana.
-   Memastikan keterbacaan dan aksesibilitas.

### 10.4 Responsive Design

Website wajib mendukung: - Desktop. - Tablet. - Smartphone.

Layout katalog produk harus menyesuaikan jumlah kolom berdasarkan ukuran
layar. Navigasi desktop harus berubah menjadi navigasi mobile pada layar
kecil.

------------------------------------------------------------------------

## 11. Non-Functional Requirements

1.  Website harus dapat berjalan pada Laravel 12.
2.  Pengambilan data menggunakan Eloquent ORM.
3.  Seluruh proses pengelolaan data harus melalui Controller.
4.  Halaman publik harus menampilkan data terbaru dari database.
5.  Halaman admin harus terlindungi oleh autentikasi.
6.  Website harus responsif pada berbagai ukuran layar.
7.  File gambar harus disimpan menggunakan Laravel Storage.
8.  Form harus menampilkan pesan validasi yang informatif.
9.  Kode program harus mengikuti struktur MVC Laravel.
10. Tampilan harus dibangun menggunakan custom CSS tanpa framework CSS.

------------------------------------------------------------------------

## 12. Project Directory Structure

Struktur file yang direncanakan:

``` text
selor/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── HomeController.php
│   │       └── Admin/
│   │           ├── DashboardController.php
│   │           ├── ProductController.php
│   │           └── CategoryController.php
│   └── Models/
│       ├── Product.php
│       └── Category.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── CategorySeeder.php
│       └── ProductSeeder.php
│
├── public/
│   ├── css/
│   │   ├── style.css
│   │   └── admin.css
│   ├── js/
│   │   └── app.js
│   └── storage/
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── public.blade.php
│       │   └── admin.blade.php
│       ├── public/
│       │   └── home.blade.php
│       └── admin/
│           ├── dashboard.blade.php
│           ├── products/
│           │   ├── index.blade.php
│           │   ├── create.blade.php
│           │   └── edit.blade.php
│           └── categories/
│               ├── index.blade.php
│               ├── create.blade.php
│               └── edit.blade.php
│
└── routes/
    └── web.php
```

------------------------------------------------------------------------

## 13. Acceptance Criteria

Project dinyatakan memenuhi kebutuhan UTS apabila:

-   [ ] Project menggunakan Laravel 12.
-   [ ] Database memiliki minimal dua tabel yang saling berelasi.
-   [ ] Migration dapat dijalankan tanpa error.
-   [ ] Model memiliki relasi Eloquent yang sesuai.
-   [ ] Controller mengambil data menggunakan Eloquent.
-   [ ] Halaman publik menggunakan data dinamis dari database.
-   [ ] Halaman publik disajikan dalam satu halaman (One Page).
-   [ ] Admin dapat login dan logout.
-   [ ] Admin dapat melakukan CRUD produk.
-   [ ] Admin dapat melakukan CRUD kategori.
-   [ ] Admin dapat mengunggah gambar produk.
-   [ ] Gambar tersimpan pada storage/public.
-   [ ] Validasi server-side berjalan sesuai ketentuan.
-   [ ] Website responsif pada desktop dan mobile.
-   [ ] Seeder menyediakan minimal lima produk contoh.
-   [ ] Perubahan data admin tercermin pada halaman publik.

------------------------------------------------------------------------

## 14. Project Scope & Limitations

Untuk menjaga pengerjaan tetap sesuai dengan ruang lingkup UTS, fitur
berikut tidak menjadi prioritas pada versi pertama:

-   Payment gateway.
-   Integrasi ekspedisi otomatis.
-   Sistem checkout dan transaksi online lengkap.
-   Tracking pengiriman.
-   Multi-role user.
-   Wishlist.
-   Sistem loyalty points.
-   Integrasi marketplace.

Fokus utama pengembangan adalah website katalog fashion dinamis dengan
sistem administrasi produk dan kategori.

------------------------------------------------------------------------

## 15. Final Project Objective

SÉLOR diharapkan menjadi website fashion store yang tidak hanya
berfungsi sebagai media informasi, tetapi juga sebagai sistem
pengelolaan katalog produk yang dinamis.

Melalui penerapan Laravel 12, Eloquent ORM, database migration,
server-side validation, dan Laravel Storage, project ini diharapkan
dapat menunjukkan implementasi pengembangan aplikasi web berbasis MVC
secara terstruktur.

**SÉLOR --- Defined by Simplicity.**
