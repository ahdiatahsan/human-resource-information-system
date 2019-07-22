# Human Resource Information System

Human Resource Information System (HRIS) adalah program aplikasi komputer yang mengorganisir tata kelola dan tata laksana manajemen Sumber Daya Manusia di perusahaan guna mendukung proses pengambilan keputusan atau biasa disebut Decision Support System dengan menyediakan berbagai informasi yang diperlukan.

# Info Aplikasi

1. Aplikasi ini dibuat menggunakan Laravel 5.7
2. Folder vendor tidak diupload, silahkan gunakan aplikasi ini dengan menambahkan folder vendor Laravel 5.7
3. Aplikasi ini menggunakan database mysql
4. Pastikan Anda telah menginstall composer atau aplikasi sejenis untuk menjalankan Laravel

# Konfigurasi Awal

1. Download atau Clone repositor ini
2. Buka cmd atau terminal sejenis, lalu aktifkan direktori yang telah Anda download
3. Kemudian jalankan perintah "php artisan serve" untuk menjalankan server dari Laravel untuk dapat mengakses 
   aplikasi yang telah didownload tadi.
4. Buatlah sebuah database pada phpmyadmin dengan nama "hris", dapat menggunakan nama lain dengan catatan
   Anda harus merubah konfigurasi database yang ada pada file ".env"
5. Setelah itu jalankan perintah "php artisan migrate" pada cmd atau terminal sejenis untuk memasukkan file 
   migrasi yang berisi skema tabel yang akan dibuat di server database (MySQL)
6. Data Super Admin akan terbuat secara otomatis setelah melakukan step 5 tadi. Berikut rincian data login 
   sebagai Super Admin --> email : superadmin@mail.com, password : 123123
7. Buka browser Anda dan masukkan url "localhost:8000" untuk menjalankan aplikasi
8. Login / Masuk dengan menggunakan akun Super Admin tadi, dengan begitu Anda dapat mengolah aplikasi secara 
   penuh seperti menambahkan admin dan user baru.

Catatan : jika beberapa component tidak termuat pada halaman website, koneksikan internet saat menjalankan 
          aplikasi kembali.

