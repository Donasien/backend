Dokumentasi API :
<br>
<br>
{app}/api/google : Untuk Menyimpan Data berupa email, username, token jika terjadi register, dan Mengupdate Data berupa token jika terjadi login
<br>
<br>
Response jika berhasil register (akun google yang belum pernah login google)
<br>
{
<br>
    "success": true,
    <br>
    "message": "Pendaftaran Berhasil",
    <br>
    "data": {
    <br>
        "email": "awimaulana@gmail.com",
        <br>
        "username": "awimaulana19",
        <br>
        "token": "190103awi"
        <br>
    }
    <br>
}
<br>
<br>
Response jika berhasil Login (akun google yang sudah pernah login google)
<br>
{
<br>
    "success": true,
    <br>
    "message": "Login Berhasil",
    <br>
    "data": {
    <br>
        "email": "awimaulana@gmail.com",
        <br>
        "token": "19awi"
        <br>
    }
    <br>
}
<br>
<br>
Response jika validasi Gagal (Terjadi kesalahan email tidak tercantum dan kesalahan lainnya)
<br>
{
<br>
    "success": false,
    <br>
    "message": "Pendaftaran Atau Login Gagal",
    <br>
    "data": {
    <br>
        "email": [
        <br>
            "The email field is required."
            <br>
        ]
        <br>
    }
    <br>
}
<br>
<br>
{app}/api/register : Untuk Menyimpan Data berupa email, username, jika terjadi register
<br>
{app}/api/login : Untuk Mengupdate Data berupa token jika terjadi login
<br>
{app}/api/logout : Untuk Menghapus Data berupa token jika terjadi logout
