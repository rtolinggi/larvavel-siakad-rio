<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'Kata sandi atau email salah',
    'password' => 'Kata sandi yang diberikan salah.',
    'failed_change_password' => 'Kata sandi saat ini tidak cocok.',
    'success_change_password' => 'Kata sandi berhasi diubah',
    'not_match_change_password' => 'Kata sandi yang diberikan tidak cocok dengan kata sandi Anda saat ini.',
    'success_cahange_profile' => 'Profil berhasil diperbarui',
    'password_confirmation_title' => 'Konfirmasi Kata Sandi',
    'password_confirmation_body' => 'Untuk melanjutkan otentikasi dua faktor, silahkan masukan kata sandi anda',
    'throttle' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam :seconds detik.',
    'forgot_password' => [
        'title' => 'Atur Kata Sandi',
        'body' => 'Kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda'
    ],
    'verify_email' => [
        'title' => 'Verifikasi Email',
        'body' => 'Untuk melanjutkan, silakan periksa email Anda.',
        'send' => 'Link verifikasi terkirim, cek email anda!',
        'reset' => 'Kami telah mengirimkan tautan pengaturan ulang kata sandi Anda melalui email.',
    ],
    'send_email' => [
        'title' => 'Mari konfirmasikan bahwa itu memang Anda!',
        'subject' => 'Verifikasi Alamat Email',
        'first_line' => 'Terima kasih :name telah mendaftar dengan :app. Silakan klik di bawah ini untuk mengonfirmasi akun Anda:',
        'action' => 'Verifikasi Email',
        'description' => 'Jika Anda tidak membuat akun, tidak diperlukan tindakan lebih lanjut.',
    ],
    'action' => [
        'login' => 'Masuk',
        'register' => 'Daftar',
        'logout' => 'Keluar',
        'other_login' => 'Masuk dengan akun lainya'
    ],
    'link' => [
        'forgot_password' => 'Lupa Kata Sandi?',
        'dont_have_account' => "Belum punya akun?",
        'register' => 'Daftar',
    ],
    'field' => [
        'name' => 'Nama',
        'email' => 'Email',
        'password' => 'Kata Sandi',
        'password_confirmation' => 'Konfirmasi Kata Sandi',
        'current_password' => 'Kata sandi saat ini',
        'new_password' => 'Katra sandi baru',
        'remember_me' => 'Ingat Saya',
    ],
    'confirmation' => [
        'logout' => [
            'title' => 'Apakah anda yakin untuk keluar?',
            'text' => 'menutup aplikasi..'
        ]
    ]

];
