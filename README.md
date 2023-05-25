Dokumentasi API :
<br>
<br>
{app}/api/google (POST) : Mengirim data email, fullname, token Untuk Menyimpan Data berupa email, fullname, token jika terjadi register (Akun Google Yang Baru Login), dan Mengirim data email, token Untuk Mengupdate Data berupa token jika terjadi login (Akun Google Yang Sudah Login)
<br>
<br>
{app}/api/register (POST) : Mengirim data email, fullname, token Untuk Menyimpan Data berupa email, fullname, token jika terjadi register
<br>
<br>
{app}/api/login (POST) : Mengirim data email, token Untuk Mengupdate Data berupa token jika terjadi login
<br>
<br>
{app}/api/logout (POST) : Mengirim data token Untuk Menghapus Data berupa token jika terjadi logout
<br>
<br>
{app}/api/profile (GET) : Mengirim token di parameter Untuk Menampilkan Data profile
<br>
<br>
{app}/api/profile (POST) : Mengirim data token dan data yang ingin di edit (fullname, email, address, phone, kk, rekening) Untuke update Profile
<br>
<br>
{app}/api/submit-donation (POST) : Mengirim data token dan data yang akan disubmit (fullname, gender, kk, phone, address, title, target_amount, end_date, description, cover_photo, ktp_photo, medical_photo, disease_photo, house_photo) Untuk submit galang donasi
<br>
<br>
{app}/api/donation-status (GET) : Mengirim token di parameter Untuk Menampilkan Data Status Galang Donasi
