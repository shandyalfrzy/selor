# SÉLOR --- DESIGN SYSTEM

## Visual Guidelines & UI Implementation Rules

**Project:** SÉLOR Contemporary Fashion Store\
**Tagline:** Defined by Simplicity.\
**Design Direction:** Quiet Luxury × Korean Minimalism × Modern
Editorial\
**Target:** Unisex fashion\
**Implementation:** Laravel 12, Blade, HTML, Custom CSS, Vanilla
JavaScript\
**Version:** 1.0

------------------------------------------------------------------------

## 1. Purpose & Design Principles

Dokumen ini menjadi acuan wajib bagi developer atau AI agent saat
merancang dan mengimplementasikan seluruh antarmuka SÉLOR. Tujuannya
adalah menjaga konsistensi visual, kualitas layout, dan karakter brand
pada halaman publik maupun admin.

SÉLOR bukan marketplace generik dan bukan dashboard template. Website
harus terasa seperti website brand fashion independen yang matang:
tenang, editorial, terkurasi, dan berorientasi pada fotografi produk.

### 1.1 Brand Attributes

-   **Minimal:** hanya elemen yang memiliki fungsi visual atau
    informasional.
-   **Refined:** detail tipografi, jarak, dan alignment diperhatikan.
-   **Timeless:** hindari tren UI sesaat yang cepat terlihat usang.
-   **Editorial:** gunakan komposisi seperti majalah fashion, bukan
    tumpukan card.
-   **Approachable:** tetap mudah digunakan dan tidak mengorbankan
    keterbacaan.

### 1.2 Non-Negotiable Rules

1.  Gunakan custom CSS. Jangan menggunakan Bootstrap, Tailwind CSS,
    Bulma, Foundation, atau framework CSS lain.
2.  Jangan membuat tampilan generik berupa kumpulan card rounded dengan
    shadow.
3.  Jangan menggunakan gradient dekoratif, glassmorphism, neon, atau
    efek glow.
4.  Jangan menambahkan elemen hanya untuk membuat halaman terlihat
    ramai.
5.  Jangan menggunakan emoji sebagai ikon antarmuka.
6.  Gunakan satu sistem spacing, warna, tipografi, radius, dan
    breakpoint yang konsisten.
7.  Utamakan hierarchy, whitespace, grid, alignment, dan kualitas
    gambar.
8.  Semua halaman harus responsif dan tetap usable pada layar kecil.
9.  Jangan mengubah identitas visual SÉLOR tanpa alasan dan persetujuan.
10. Jika suatu komponen belum memiliki aturan, ikuti prinsip visual
    dokumen ini dan buat implementasi yang paling sederhana.

------------------------------------------------------------------------

## 2. Brand Identity

### 2.1 Brand Name

**SÉLOR**

Penulisan brand harus konsisten menggunakan huruf kapital dan aksen pada
huruf É. Jangan menulis SELOR pada elemen brand yang terlihat oleh
pengguna, kecuali pada identifier teknis, URL, nama file, atau kode.

### 2.2 Tagline

**Defined by Simplicity.**

Gunakan tagline pada hero, brand statement, atau footer jika relevan.
Jangan mengulang tagline di setiap section.

### 2.3 Brand Positioning

SÉLOR adalah contemporary unisex fashion store yang menawarkan pakaian
minimalis, modern, dan versatile untuk penggunaan sehari-hari.

### 2.4 Logo Usage

-   Gunakan file logo resmi yang disediakan dalam project.
-   Jangan mengetik ulang logo menggunakan font biasa jika aset logo
    tersedia.
-   Pertahankan rasio aspek logo; jangan meregangkan atau memiringkan.
-   Sediakan ruang kosong di sekitar logo minimal setara tinggi huruf
    kapital pada wordmark.
-   Gunakan varian gelap pada background terang dan varian terang pada
    background gelap.
-   Jangan menambahkan outline, shadow, gradient, atau dekorasi pada
    logo.
-   Untuk navbar, gunakan versi horizontal jika tersedia.
-   Untuk favicon, gunakan monogram resmi jika tersedia.
-   Jika file logo belum tersedia, gunakan wordmark teks sementara
    dengan Cormorant Garamond dan letter spacing; jangan membuat simbol
    baru secara sembarangan.

------------------------------------------------------------------------

## 3. Color System

Palet utama menggunakan earth-neutral. Warna harus terasa hangat,
natural, dan tenang.

  Token                  Hex         Usage
  ---------------------- ----------- ---------------------------------
  `--color-ivory`        `#F5F3EE`   Background utama publik
  `--color-white`        `#FFFFFF`   Surface dan form
  `--color-beige`        `#DED8CD`   Secondary background
  `--color-stone`        `#AAA69D`   Muted text dan divider tertentu
  `--color-charcoal`     `#292A27`   Teks utama, tombol utama
  `--color-olive`        `#55594B`   Accent terbatas
  `--color-border`       `#D8D4CC`   Border dan separator
  `--color-muted-text`   `#77766F`   Teks sekunder
  `--color-danger`       `#A4493F`   Error dan destructive feedback
  `--color-success`      `#536B55`   Status berhasil

### 3.1 Color Usage Rules

-   Ivory menjadi background dominan untuk storefront.
-   Charcoal digunakan untuk teks utama dan CTA utama.
-   White digunakan untuk surface yang membutuhkan kontras, termasuk
    form.
-   Beige digunakan sebagai pembeda section, bukan sebagai warna
    dekoratif di semua elemen.
-   Olive hanya menjadi aksen kecil, misalnya label atau detail status.
-   Danger dan success hanya untuk feedback sistem.
-   Jangan menggunakan semua warna dalam satu section.
-   Jangan menggunakan warna accent sebagai background besar tanpa
    kebutuhan yang jelas.

### 3.2 Suggested Color Balance

Sebagai panduan visual, bukan aturan hitung yang kaku:

-   60% Ivory / White
-   25% Charcoal dan area gelap
-   10% Beige / Stone
-   5% Olive dan status

Pastikan teks memiliki kontras yang cukup terhadap background.

------------------------------------------------------------------------

## 4. Typography System

### 4.1 Font Families

**Display / Editorial:** Cormorant Garamond\
Digunakan untuk headline besar, editorial statement, dan beberapa judul
section.

**UI / Body:** DM Sans\
Digunakan untuk body text, navigasi, tombol, form, tabel, label, harga,
dan seluruh informasi antarmuka.

Fallback:

``` css
--font-display: "Cormorant Garamond", Georgia, serif;
--font-body: "DM Sans", Arial, sans-serif;
```

Jika font eksternal tidak dapat dimuat, fallback harus tetap menjaga
keterbacaan. Jangan menambahkan banyak jenis font lain.

### 4.2 Type Scale

  Token          Desktop   Mobile Usage
  ------------ --------- -------- ----------------------
  Display XL        72px     44px Hero headline
  Display L         56px     38px Editorial headline
  Heading 1         40px     32px Page / section title
  Heading 2         30px     26px Section heading
  Heading 3         22px     20px Subsection
  Body L            18px     17px Intro / lead
  Body M            16px     15px Body default
  Body S            14px     14px Supporting text
  Caption           12px     12px Metadata / label

### 4.3 Typography Rules

-   Gunakan Cormorant Garamond untuk ekspresi editorial, bukan untuk
    seluruh teks.
-   Gunakan DM Sans untuk informasi yang harus cepat dipindai.
-   Body text default minimal 15--16px pada desktop.
-   Jangan menggunakan terlalu banyak font weight.
-   Gunakan uppercase dan letter spacing untuk eyebrow label kecil,
    bukan untuk paragraf.
-   Hindari paragraf panjang dengan lebar penuh layar.
-   Line-height body disarankan 1.5--1.7.
-   Heading harus memiliki hierarchy yang jelas dan tidak semuanya
    berukuran besar.

------------------------------------------------------------------------

## 5. Layout & Grid

### 5.1 Container

Gunakan container terpusat dengan lebar maksimum sekitar 1440px.

``` css
.container {
    width: min(100% - 64px, 1440px);
    margin-inline: auto;
}
```

Penyesuaian horizontal: - Desktop: 32--64px, mengikuti lebar viewport. -
Tablet: 28--32px. - Mobile: 18--22px.

Jangan membuat konten menempel ke tepi layar.

### 5.2 Grid

-   Gunakan CSS Grid untuk katalog produk dan layout editorial.
-   Gunakan Flexbox untuk navbar, toolbar, dan alignment satu dimensi.
-   Grid produk desktop umumnya 3--4 kolom, tablet 2--3 kolom, mobile 2
    kolom jika gambar masih terbaca.
-   Mobile sangat kecil dapat menggunakan 1 kolom jika komposisi produk
    membutuhkan ruang.
-   Jaga gap antar elemen konsisten.
-   Hindari semua section memakai pola grid yang sama. Variasikan
    komposisi dengan tetap menjaga keteraturan.

### 5.3 Whitespace

Whitespace merupakan bagian penting dari identitas SÉLOR.

-   Beri jarak yang cukup antara navbar, hero, dan section.
-   Gunakan jarak vertikal section yang konsisten.
-   Jangan memadatkan seluruh informasi dalam satu viewport.
-   Jangan membuat ruang kosong besar tanpa tujuan komposisi.
-   Gunakan whitespace untuk membentuk hierarchy, bukan sebagai
    pengganti konten.

### 5.4 Section Spacing

  Context                        Desktop     Mobile
  -------------------------- ----------- ----------
  Section vertical padding     88--112px   56--72px
  Large section gap                 64px       40px
  Component gap                 24--32px   16--24px
  Compact gap                    8--16px    8--12px

------------------------------------------------------------------------

## 6. Spacing, Radius, Border & Shadow

Gunakan skala spacing berbasis kelipatan 4px.

  Token            Value
  -------------- -------
  `--space-1`        4px
  `--space-2`        8px
  `--space-3`       12px
  `--space-4`       16px
  `--space-5`       20px
  `--space-6`       24px
  `--space-8`       32px
  `--space-10`      40px
  `--space-12`      48px
  `--space-16`      64px
  `--space-20`      80px
  `--space-24`      96px

### 6.1 Radius

SÉLOR menggunakan bentuk yang tegas dan subtle.

-   Default: 2--4px.
-   Form control: 2--4px.
-   Image: umumnya square corner atau radius sangat kecil.
-   Pill shape hanya untuk filter chip jika benar-benar diperlukan.
-   Hindari rounded-full pada hampir semua tombol dan card.

### 6.2 Border

-   Gunakan border 1px dengan warna `--color-border`.
-   Border dipakai untuk memisahkan konten atau menegaskan struktur.
-   Hindari border pada semua elemen jika tidak diperlukan.
-   Gunakan separator horizontal tipis untuk tabel, navigasi, atau
    section editorial.

### 6.3 Shadow

-   Default: tanpa shadow.
-   Shadow hanya boleh digunakan untuk elemen yang benar-benar perlu
    terangkat, seperti dropdown atau modal.
-   Hindari shadow besar dan gelap pada card produk.
-   Jangan menggunakan glow.

------------------------------------------------------------------------

## 7. Imagery & Product Photography

Fotografi merupakan elemen visual utama SÉLOR. Kualitas gambar sangat
memengaruhi kesan premium.

### 7.1 Photography Direction

Gunakan visual dengan karakter: - Korean contemporary fashion
editorial. - Natural atau soft studio lighting. - Neutral background:
ivory, beige, grey, charcoal. - Pose natural dan tidak berlebihan. -
Styling unisex, clean, dan effortless. - Komposisi rapi dengan ruang
visual yang cukup. - Warna pakaian dan tone foto konsisten.

### 7.2 Product Image Rules

-   Gunakan foto produk yang jelas dan relevan.
-   Utamakan rasio gambar 3:4 untuk katalog pakaian.
-   Gunakan `object-fit: cover` untuk foto editorial dan kartu produk.
-   Gunakan `object-fit: contain` jika seluruh bentuk produk harus
    terlihat.
-   Pastikan posisi crop konsisten antar produk dalam satu katalog.
-   Jangan meregangkan gambar.
-   Sediakan alt text yang deskriptif.
-   Jika gambar tidak tersedia, gunakan placeholder lokal yang
    konsisten, bukan broken image icon.
-   Jangan memakai gambar random yang tidak sesuai nama atau kategori
    produk.

### 7.3 Image Consistency

Jangan mencampur foto studio putih terang, foto outdoor gelap,
ilustrasi, dan gambar AI dengan gaya yang sangat berbeda dalam satu
product grid. Jika sumber gambar berbeda, samakan rasio, crop, dan tone
visual sejauh memungkinkan.

------------------------------------------------------------------------

## 8. Component Guidelines

### 8.1 Buttons

**Primary Button** - Background charcoal. - Text ivory/white. - Bentuk
rectangular dengan radius kecil. - Tinggi sekitar 44--48px. - Hover:
perubahan warna subtle atau opacity. - Fokus keyboard harus terlihat.

**Secondary Button** - Background transparan. - Border charcoal atau
border neutral. - Text charcoal. - Hover menggunakan background beige
atau ivory yang sedikit lebih gelap.

**Text Link** - Tanpa container button jika tidak diperlukan. - Gunakan
underline atau perubahan warna saat hover. - Sertakan indikator visual
yang jelas bahwa teks dapat diklik.

Jangan membuat setiap tombol berbeda gaya. Gunakan variasi primary,
secondary, dan text link saja.

### 8.2 Navigation

Public navbar: - Logo SÉLOR di sisi kiri. - Navigasi utama di tengah
atau kanan. - Aksi seperti shopping bag di sisi kanan jika fitur
tersedia. - Background ivory atau white. - Tinggi dan padding
proporsional. - Sticky navbar boleh digunakan jika tidak mengganggu area
konten. - Mobile menggunakan menu yang mudah dibuka dan ditutup.

Admin navigation: - Sidebar pada desktop. - Sidebar dapat berubah
menjadi drawer atau menu mobile. - Menu aktif harus terlihat jelas. -
Jangan menggunakan sidebar penuh warna atau dekorasi berlebihan.

### 8.3 Product Card

Product card harus editorial dan image-first.

Urutan: 1. Foto produk. 2. Nama produk. 3. Kategori atau detail singkat
jika relevan. 4. Harga. 5. Status stok hanya jika diperlukan.

Aturan: - Jangan membungkus seluruh product card dengan panel putih,
shadow, dan radius besar. - Jangan menampilkan terlalu banyak badge. -
Gunakan foto dengan rasio konsisten. - Hover image boleh menggunakan
pergantian foto kedua jika tersedia; jika tidak, cukup subtle image
treatment. - Seluruh card atau area produk harus memiliki perilaku
interaksi yang jelas. - Jangan menampilkan rating palsu atau jumlah
pembelian yang tidak bersumber dari data.

### 8.4 Forms

-   Label harus terlihat dan terhubung dengan input.
-   Placeholder bukan pengganti label.
-   Tinggi input sekitar 44--48px.
-   Gunakan border neutral.
-   Fokus input menggunakan outline atau border charcoal yang jelas.
-   Error ditampilkan dekat field terkait.
-   Helper text menggunakan warna muted.
-   Tampilkan required state dengan jelas.
-   File input harus memiliki petunjuk format dan ukuran file.
-   Form admin harus nyaman digunakan, bukan sekadar form default
    browser yang tidak ditata.

### 8.5 Tables

-   Gunakan tabel untuk data admin yang bersifat tabular.
-   Header jelas, tidak terlalu dekoratif.
-   Gunakan separator tipis.
-   Row height cukup untuk keterbacaan.
-   Aksi edit dan delete dikelompokkan secara konsisten.
-   Pada mobile, gunakan horizontal overflow yang terkontrol atau ubah
    menjadi layout list; jangan memaksa tabel menjadi terlalu sempit.

### 8.6 Status & Feedback

Gunakan status hanya jika ada makna: - Success: hijau muted. - Warning:
amber muted bila diperlukan. - Error: merah muted. - Neutral:
stone/grey.

Feedback harus menjelaskan hasil tindakan. Gunakan confirmation sebelum
tindakan destruktif seperti menghapus produk atau kategori.

### 8.7 Modal & Dropdown

-   Gunakan hanya jika dibutuhkan.
-   Background overlay netral dan tidak terlalu gelap.
-   Konten modal ringkas dan fokus.
-   Dropdown harus memiliki state hover, focus, dan active.
-   Pastikan dapat dioperasikan dengan keyboard sejauh memungkinkan.

------------------------------------------------------------------------

## 9. Public Storefront Page Guidelines

Halaman publik adalah one-page website. Navigasi mengarah ke section
dengan anchor dan seluruh konten produk/kategori diambil dari database.

### 9.1 Header / Navbar

-   Logo SÉLOR harus menjadi identitas utama.
-   Navigasi: Home, Collections, About, Contact.
-   Shop Now dapat menjadi CTA.
-   Jangan memenuhi navbar dengan terlalu banyak link.
-   Pastikan navbar tidak menutupi anchor section saat navigasi.

### 9.2 Hero

Hero harus menjadi bagian paling kuat secara visual.

Isi: - Eyebrow kecil, misalnya `CONTEMPORARY UNISEX FASHION`. - Headline
`Defined by Simplicity.` - Deskripsi singkat brand. - CTA
`Explore Collection`. - Foto editorial fashion yang dominan.

Aturan: - Hindari hero dengan banyak tombol. - Jangan menempatkan
terlalu banyak teks di atas foto. - Jangan memakai gradient overlay yang
berat. - Gunakan komposisi editorial yang seimbang antara teks dan
visual. - Headline harus responsif dan tidak terpotong.

### 9.3 Collections

-   Tampilkan kategori yang tersedia di database.
-   Gunakan foto atau komposisi visual kategori jika aset tersedia.
-   Jangan membuat kategori statis yang tidak sesuai database.
-   Beri affordance yang jelas untuk melihat koleksi.

### 9.4 Product Catalog

-   Produk diambil dari database melalui Controller dan Eloquent.
-   Tampilkan produk unggulan atau produk terbaru berdasarkan data.
-   Filter kategori harus memiliki state aktif.
-   Jika tidak ada produk, tampilkan empty state yang dirancang, bukan
    section kosong.
-   Harga menggunakan format Rupiah yang konsisten.
-   Produk habis stok harus memiliki status yang jelas.

### 9.5 About / Brand Story

Gunakan teks singkat dan visual yang mendukung. Ceritakan filosofi
SÉLOR, pendekatan desain, dan penggunaan pakaian sehari-hari. Hindari
klaim berlebihan yang tidak dapat dibuktikan.

### 9.6 Contact & Footer

-   Tampilkan kanal kontak yang benar-benar tersedia.
-   Jangan menampilkan alamat, nomor telepon, atau akun sosial palsu.
-   Footer harus ringkas dan memiliki hirarki informasi.
-   Cantumkan brand wordmark dan tagline secara proporsional.

------------------------------------------------------------------------

## 10. Admin Interface Guidelines

Admin merupakan area operasional. Visualnya harus tetap satu keluarga
dengan brand SÉLOR, tetapi prioritasnya adalah efisiensi, keterbacaan,
dan kecepatan kerja.

### 10.1 Admin Layout

-   Gunakan background ivory atau white.
-   Sidebar menggunakan charcoal atau neutral light.
-   Konten utama memiliki ruang yang cukup.
-   Gunakan heading yang jelas dan breadcrumb bila membantu.
-   Jangan meniru dashboard SaaS generik dengan banyak gradient dan
    kartu statistik berwarna-warni.

### 10.2 Dashboard

Tampilkan ringkasan yang relevan: - Total produk. - Total kategori. -
Produk unggulan. - Produk dengan stok rendah.

Statistik boleh menggunakan panel sederhana dengan border tipis. Jangan
membuat angka atau grafik fiktif. Semua ringkasan harus berasal dari
database.

### 10.3 Product Management

-   Daftar produk harus mudah dipindai.
-   Thumbnail gambar berukuran konsisten.
-   Informasi utama: nama, kategori, harga, stok, dan status.
-   Aksi create, edit, delete mudah ditemukan.
-   Form create/edit dikelompokkan secara logis.
-   Preview gambar ditampilkan sebelum atau setelah upload jika
    memungkinkan.
-   Tampilkan error validasi pada field yang sesuai.

### 10.4 Category Management

-   Tampilkan nama kategori, slug, dan jumlah produk jika tersedia.
-   Form kategori sederhana.
-   Berikan informasi jika kategori masih digunakan oleh produk.
-   Konfirmasi sebelum penghapusan.

### 10.5 Admin Responsive Behavior

-   Desktop: sidebar tetap dan area konten fleksibel.
-   Tablet: sidebar dapat dipersempit atau menjadi drawer.
-   Mobile: navigasi admin menjadi drawer/top navigation.
-   Form menggunakan satu kolom pada mobile.
-   Tabel tidak boleh menyebabkan seluruh halaman overflow horizontal.

------------------------------------------------------------------------

## 11. Responsive Breakpoints

Gunakan breakpoint CSS yang konsisten:

``` css
/* Mobile first */
@media (min-width: 576px) { }
@media (min-width: 768px) { }
@media (min-width: 1024px) { }
@media (min-width: 1280px) { }
```

Panduan: - `<576px`: smartphone kecil; satu kolom untuk form, navigasi
mobile. - `576px–767px`: smartphone besar; katalog dapat memakai dua
kolom. - `768px–1023px`: tablet; grid dan navigasi menyesuaikan. -
`1024px–1279px`: laptop; layout desktop dengan container lebih
fleksibel. - `>=1280px`: desktop lebar; gunakan max-width agar baris
teks tidak terlalu panjang.

Jangan hanya mengecilkan ukuran desktop. Susun ulang layout sesuai
prioritas konten pada layar kecil.

------------------------------------------------------------------------

## 12. Motion & Interaction

Animasi harus subtle, cepat, dan memiliki tujuan.

Boleh: - Transisi warna tombol. - Perubahan opacity ringan. - Image
hover yang halus. - Menu mobile dengan transisi sederhana. - Smooth
scrolling untuk anchor navigation.

Hindari: - Parallax berlebihan. - Animasi masuk pada setiap elemen. -
Cursor custom yang mengganggu. - Animasi looping dekoratif. - Efek 3D
atau glow. - Animasi yang membuat interaksi terasa lambat.

Hormati preferensi `prefers-reduced-motion`.

------------------------------------------------------------------------

## 13. Accessibility & Usability

-   Gunakan struktur heading berurutan.
-   Semua input memiliki label.
-   Gambar informatif memiliki alt text.
-   Tombol memiliki nama aksi yang jelas.
-   Pastikan kontras teks memadai.
-   Jangan mengandalkan warna saja untuk menyampaikan status.
-   Focus state keyboard harus terlihat.
-   Link dan tombol harus memiliki area klik yang cukup.
-   Navigasi mobile harus dapat digunakan dengan keyboard.
-   Gunakan elemen HTML semantik seperti `header`, `nav`, `main`,
    `section`, `footer`, `button`, dan `form`.

------------------------------------------------------------------------

## 14. CSS Architecture & Implementation Rules

### 14.1 CSS Only

Gunakan: - HTML5 - Blade - CSS murni - Vanilla JavaScript jika interaksi
membutuhkan

Jangan gunakan: - Bootstrap - Tailwind CSS - Bulma - Foundation -
Materialize - UI component framework - Utility CSS framework

Icon boleh menggunakan aset SVG lokal atau inline SVG yang konsisten.
Hindari emoji sebagai pengganti icon.

### 14.2 CSS Variables

Definisikan design tokens di satu tempat, misalnya
`public/css/style.css` atau file token terpisah yang di-import oleh
stylesheet utama.

``` css
:root {
    --color-ivory: #F5F3EE;
    --color-white: #FFFFFF;
    --color-beige: #DED8CD;
    --color-stone: #AAA69D;
    --color-charcoal: #292A27;
    --color-olive: #55594B;
    --color-border: #D8D4CC;
    --color-muted-text: #77766F;
    --color-danger: #A4493F;
    --color-success: #536B55;

    --font-display: "Cormorant Garamond", Georgia, serif;
    --font-body: "DM Sans", Arial, sans-serif;

    --container-width: 1440px;
    --radius-sm: 2px;
    --radius-md: 4px;

    --space-1: 4px;
    --space-2: 8px;
    --space-3: 12px;
    --space-4: 16px;
    --space-6: 24px;
    --space-8: 32px;
    --space-12: 48px;
    --space-16: 64px;
    --space-20: 80px;

    --transition-fast: 160ms ease;
    --transition-normal: 240ms ease;
}
```

### 14.3 Naming Convention

Gunakan class berbasis komponen dan konteks, misalnya:

``` css
.site-header {}
.site-header__logo {}
.site-header__nav {}
.hero {}
.hero__content {}
.hero__title {}
.product-grid {}
.product-card {}
.product-card__image {}
.product-card__name {}
.admin-sidebar {}
.admin-content {}
.form-field {}
.form-field__error {}
```

Hindari nama class yang terlalu umum seperti `.box1`, `.red`, `.left`,
atau `.style2`.

### 14.4 CSS Quality

-   Hindari inline style kecuali ada kebutuhan data dinamis yang
    spesifik.
-   Hindari duplikasi aturan CSS.
-   Pisahkan stylesheet publik dan admin bila lebih mudah dirawat.
-   Gunakan CSS Grid dan Flexbox secara tepat.
-   Jangan menggunakan absolute positioning untuk menyusun seluruh
    layout.
-   Jangan menetapkan tinggi tetap pada section yang berisi konten
    dinamis.
-   Gunakan `min-height`, `max-width`, `aspect-ratio`, dan unit fluid
    jika sesuai.
-   Pastikan tidak ada horizontal overflow pada viewport umum.
-   Gunakan `box-sizing: border-box`.
-   Jangan menambahkan library hanya untuk menyelesaikan layout
    sederhana.

------------------------------------------------------------------------

## 15. Content & Microcopy

Bahasa antarmuka harus singkat, jelas, dan natural.

### 15.1 Brand Voice

-   Tenang.
-   Percaya diri.
-   Sederhana.
-   Tidak berlebihan.
-   Tidak menggunakan hard-selling yang agresif.

### 15.2 Example Copy

  Context               Recommended Copy
  --------------------- ------------------------------------------------
  Hero eyebrow          CONTEMPORARY UNISEX FASHION
  Hero headline         Defined by Simplicity.
  Hero description      Thoughtful essentials for everyday expression.
  Main CTA              Explore Collection
  Product section       The Collection
  Featured section      Selected Pieces
  Empty product         No pieces available at the moment.
  Out of stock          Currently unavailable
  Add product           Add New Product
  Save changes          Save Changes
  Delete confirmation   Are you sure you want to delete this item?

Jangan menggunakan lorem ipsum pada hasil akhir. Jangan membuat klaim
seperti sustainable, handmade, premium material, atau locally crafted
kecuali informasi tersebut benar-benar tersedia.

------------------------------------------------------------------------

## 16. Do & Don't

  -----------------------------------------------------------------------
  DO                                  DON'T
  ----------------------------------- -----------------------------------
  Gunakan whitespace yang terencana   Memenuhi layar dengan dekorasi

  Gunakan foto produk konsisten       Mencampur foto dengan tone berbeda

  Gunakan tipografi editorial         Menggunakan banyak jenis font

  Gunakan border tipis                Shadow besar di setiap card

  Gunakan layout asimetris secara     Membuat layout acak
  terukur                             

  Gunakan CTA yang jelas              Menampilkan banyak tombol bersaing

  Gunakan warna neutral               Gradient ungu/biru generik

  Gunakan icon SVG konsisten          Menggunakan emoji untuk icon

  Buat admin mudah dipakai            Mengutamakan dekorasi daripada
                                      fungsi

  Tampilkan data asli dari database   Mengarang angka statistik atau
                                      rating
  -----------------------------------------------------------------------

------------------------------------------------------------------------

## 17. Definition of Done --- UI Review Checklist

Sebelum sebuah halaman dianggap selesai, developer atau agent wajib
memeriksa:

### Brand Consistency

-   [ ] Logo dan penulisan SÉLOR konsisten.
-   [ ] Warna sesuai color tokens.
-   [ ] Tipografi sesuai typography system.
-   [ ] Tidak ada dekorasi yang bertentangan dengan brand.

### Layout & Visual Quality

-   [ ] Alignment dan spacing konsisten.
-   [ ] Hierarchy heading dan body jelas.
-   [ ] Whitespace cukup dan terencana.
-   [ ] Tidak semua konten dibungkus card.
-   [ ] Foto memiliki rasio dan treatment konsisten.
-   [ ] Tidak ada elemen yang terlihat seperti placeholder tanpa
    sengaja.

### Components & Interaction

-   [ ] Button memiliki hover, focus, dan active state.
-   [ ] Form memiliki label dan error state.
-   [ ] Navigasi berfungsi.
-   [ ] Empty state dan feedback tersedia.
-   [ ] Tabel dan form admin mudah digunakan.

### Responsive & Accessibility

-   [ ] Tampilan diuji pada mobile, tablet, dan desktop.
-   [ ] Tidak ada horizontal overflow yang tidak disengaja.
-   [ ] Teks tetap terbaca pada layar kecil.
-   [ ] Gambar memiliki alt text.
-   [ ] Focus keyboard terlihat.
-   [ ] Reduced motion dihormati.

### Technical

-   [ ] Tidak menggunakan CSS framework.
-   [ ] CSS menggunakan design tokens.
-   [ ] Tidak ada CSS duplikat yang tidak perlu.
-   [ ] Konten dinamis tidak merusak layout.
-   [ ] Tidak ada gambar rusak atau link mati.

------------------------------------------------------------------------

## 18. Instructions for AI Coding Agents

Dokumen ini adalah sumber kebenaran utama untuk keputusan visual SÉLOR.

Sebelum membuat atau mengubah UI:

1.  Baca dokumen ini secara menyeluruh.
2.  Periksa struktur project dan stylesheet yang sudah ada sebelum
    membuat file baru.
3.  Gunakan design tokens yang telah ditentukan.
4.  Gunakan komponen dan pola layout yang konsisten.
5.  Jangan mengganti palet, font, radius, atau arah visual atas
    inisiatif sendiri.
6.  Jangan menambahkan framework CSS atau UI library.
7.  Jangan membuat komponen dekoratif yang tidak dibutuhkan.
8.  Gunakan data nyata dari backend untuk konten dinamis.
9.  Pastikan tampilan tetap baik ketika teks panjang, gambar kosong,
    stok habis, atau data tidak tersedia.
10. Setelah implementasi, periksa tampilan pada desktop dan mobile serta
    perbaiki masalah layout.

Jika ada kebutuhan desain yang belum tercakup, pilih solusi yang paling
sederhana, konsisten dengan Quiet Luxury × Korean Minimalism × Modern
Editorial, dan tidak mengorbankan usability.

**Final principle:** SÉLOR harus terlihat intentional, bukan decorated.
Setiap warna, jarak, gambar, dan komponen harus memiliki alasan desain.

------------------------------------------------------------------------

**SÉLOR --- Defined by Simplicity.**
