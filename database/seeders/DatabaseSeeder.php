<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'member'
        ]);
        User::factory(49)->create();

        DB::table('quizzes')->insert([
            'quiz' => 'Logika Numerik',
            'deskripsi' => 'Tes Logika Numerik berfungsi untuk mengukur kemampuan seseorang menghitung atau logis-matematis.',
            'jenisquiz' => 'Tes Matematika',
            'token' =>  Str::random(5),
            'slug' =>  Str::slug('Logika Numerik'),
            'info' => 'Tes ini adalah tes untuk menilai kemampuan anda melihat susunan format angka dalam sebuah susunan angka. Cari dan pilih jawaban yang benar.',
            'info2' => 'Pola angka matematika berbentuk operasi hitung matematika sederhana, baik berupa penjumlahan, pengurangan, perkalian, pembagian, maupun perpangkatan.',
            'info3' => 'Semua soal memiliki skor yang sama. Anda dapat mengerjakan atau
            melewatkan soal yang anda ingin jawab. Ayo, coba kerjakan tes Analogi numerik ini.
            Selamat mengerjakan !',
            'date' => '2023-12-15',
            'time' => '00:20:00',


        ]);
        DB::table('quizzes')->insert([
            'quiz' => 'Analogi Verbal',
            'deskripsi' => 'Tes Analogi Verbal  berfungsi untuk mengukur kemampuan seseorang di bidang pemahaman mengenai bahasa.',
            'jenisquiz' => 'Tes Analogi',
            'token' =>  Str::random(5),
            'slug' =>  Str::slug('Analogi Verbal'),
            'info' => 'Tes analogi verbal terdiri dari tiga bagian tes yaitu (1) Padanan dan keterhubungan kata, (2) Sinonim kata, dan (3) Antonim (kata berlawanan). Masing-masing bagian terdiri dari 20 soal.',
            'info2' => 'Tes analogi menilai kemampuan Anda dalam mengartikan makna, fungsi dan pemakaian kata yang mempunyai padanan hubungan fungsi atau analogi dengan kata yang lain.',
            'info3' => 'Semua soal memiliki skor yang sama. Anda dapat mengerjakan atau melewatkan soal yang anda ingin jawab. Ayo, coba kerjakan tes Analogi Verbal ini. Selamat mengerjakan !',
            'date' => '2023-12-15',
            'time' => '00:30:00',


        ]);
        DB::table('quizzes')->insert([
            'quiz' => 'Penalaran',
            'deskripsi' => 'Tes ini untuk mengetahui seberapa efektif penalaran dan pemecahan masalah dengan kriteria logis dan masuk akal.',
            'jenisquiz' => 'Tes Kemampuan Penalaran',
            'token' =>  Str::random(5),
            'slug' =>  Str::slug('Penalaran'),
            'info' => 'Tes ini untuk mengetahui seberapa efektif penalaran dan pemecahan masalah dengan kriteria logis dan masuk akal. Cari dan pilih jawaban yang benar.',
            'info2' => 'Tiap soal terdiri dari beberapa pertanyaan/premis. Bacalah dengan saksama pernyataan-pernyataan yang ada, kemudian kesimpulan yang dapat ditarik dari pernyataan tersebut.',
            'info3' => 'Semua soal memiliki skor yang sama. Anda dapat mengerjakan atau
            melewatkan soal yang anda ingin jawab. Ayo, coba kerjakan tes kemampuan penalaran ini.Selamat mengerjakan !',
            'date' => '2023-12-15',
            'time' => '00:15:00',


        ]);
    }
}
