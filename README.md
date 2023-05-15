Dokumentasi API :
<br>
<br>
{app}/api/google : Untuk Menyimpan Data berupa email, username, token jika terjadi register, dan Mengupdate Data berupa token jika terjadi login
<br>
Response jika berhasil register (akun google yang belum pernah login google)
<br>
{
    "success": true,
    "message": "Pendaftaran Berhasil",
    "data": {
        "email": "awimaulana@gmail.com",
        "username": "awimaulana19",
        "token": "190103awi"
    }
}
<br>
Response jika berhasil Login (akun google yang sudah pernah login google)
<br>
{
    "success": true,
    "message": "Login Berhasil",
    "data": {
        "email": "awimaulana@gmail.com",
        "token": "19awi"
    }
}
<br>
Response jika validasi Gagal (Terjadi kesalahan email tidak tercantum dan kesalahan lainnya)
<br>
{
    "success": false,
    "message": "Pendaftaran Atau Login Gagal",
    "data": {
        "email": [
            "The email field is required."
        ],
        "token": [
            "The token field is required."
        ]
    }
}
<br>
<br>
{app}/api/register : Untuk Menyimpan Data berupa email, username, jika terjadi register
<br>
{app}/api/login : Untuk Mengupdate Data berupa token jika terjadi login
<br>
{app}/api/logout : Untuk Menghapus Data berupa token jika terjadi logout
