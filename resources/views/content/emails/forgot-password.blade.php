@component("mail::message")
    Dear {{ $users->name }} / Departemen {{ $users->department }}!

    Kami mendapatkan permintaan reset kata sandi dari email {{ $users->email }}

    Untuk mengakses reset kata sandi akun IM Online anda, klik tombol dibawah ini:
    {{ url("reset/" . $users->remember_token) }}

    Jika mengeklik tautan di atas tidak berhasil, salin dan tempel link tersebut di jendela browser baru.


    Jika anda merasa tidak mengajukan ini, kemungkinan ada pengguna lain yang salah memasukkan alamat email Anda saat
    mencoba mengatur ulang kata sandi. Jika Anda tidak mengajukan permintaan, Anda tidak perlu mengambil tindakan lebih
    lanjut dan dapat mengabaikan email ini.

    Terima kasih!
    Internal Memo Online
@endcomponent
