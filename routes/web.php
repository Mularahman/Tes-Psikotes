<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaquizController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
route::post('/loginuser', [LoginController::class, 'login']);
route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
route::get('/register', [LoginController::class, 'register'])->middleware('guest');
route::post('/registeruser', [LoginController::class, 'store'])->middleware('guest');
route::get('/forgetpassword', [ForgetController::class, 'forget'])->name('forget.password.get');
route::post('/forgetpassword', [ForgetController::class, 'submitforget'])->name('forget.password.post');
route::get('/resetpassword/{token}', [ForgetController::class, 'reset'])->name('reset.password.get');
route::post('/resetpassword', [ForgetController::class, 'submitreset'])->name('reset.password.post');

Route::group(['middleware' => ['auth','admin']], function() {

    Route::get('/dashboard', [DashboardController::class,'index']);
    route::get('/tuntas', [DashboardController::class, 'tuntas']);
    route::get('/tuntas/cetak', [DashboardController::class, 'cetaktuntas']);
    route::get('/tidaktuntas', [DashboardController::class, 'tidaktuntas']);
    route::get('/tidaktuntas/cetak', [DashboardController::class, 'cetaktidaktuntas']);
    route::get('/ratarata', [DashboardController::class, 'ratarata']);
    route::get('/ratarata/export', [DashboardController::class, 'export']);
    route::get('/ratarata/cetak', [DashboardController::class, 'cetak']);

    Route::get('/peserta', [UserController::class,'index']);
    Route::post('/tambahpeserta', [UserController::class,'store']);
    Route::post('/editpeserta/{id}', [UserController::class,'edit']);
    Route::put('/updatepeserta/{id}', [UserController::class,'update']);
    Route::delete('/hapuspeserta/{id}', [UserController::class,'destroy']);

    route::get('/quizadmin', [QuizController::class, 'index']);
    route::post('/tambahquiz', [QuizController::class, 'store']);
    route::delete('/hapusquiz/{id}', [QuizController::class, 'destroy']);
    route::put('/updatequiz/{id}', [QuizController::class, 'update']);

    route::get('/soal/{id}', [SoalController::class, 'index'])->name('soal');
    route::get('/tambahsoal/{id}', [SoalController::class, 'create']);
    route::post('/tambahsoal/{id}', [SoalController::class, 'store']);
    route::post('/tambahsoal/{id}/import', [SoalController::class, 'import']);
    route::delete('/hapussoal/{id}', [SoalController::class, 'destroy']);
    route::get('/editsoal/{id}', [SoalController::class, 'edit']);
    route::PUT('/updatesoal/{id}', [SoalController::class, 'update']);
    route::get('/soal/{id}/cetak', [SoalController::class, 'cetak']);

    route::get('/pesertaquiz/{id}', [PesertaquizController::class, 'index'])->name('pesertaquiz');
    route::get('/enrolle/{id}', [PesertaquizController::class, 'create']);
    route::get('/enrolle/{id}/cetak', [PesertaquizController::class, 'cetakuser']);
    route::get('/enrolle/{id}/export', [PesertaquizController::class, 'exportuser']);
    route::post('/enrolle/{id}', [PesertaquizController::class, 'store']);
    route::delete('/hapusenroll/{id}', [PesertaquizController::class, 'destroy']);
    route::post('/hapusenroll', [PesertaquizController::class, 'delete'])->name('delete.selected');

    route::get('/hasilquiz/{id}', [PesertaquizController::class, 'hasil']);
    route::get('/hasilquiz/{id}/cetak', [PesertaquizController::class, 'cetak']);
    route::get('/hasilquiz/{id}/export', [PesertaquizController::class, 'export']);

    // Route::get('/laporan', [LaporanController::class,'index']);

    route::get('/laporan', [LaporanController::class, 'results']);
    route::get('/laporan/export', [LaporanController::class, 'export']);
    route::get('/laporan/cetak', [LaporanController::class, 'cetak']);
});

route::get('/home', [FrontendController::class, 'home'])->name('home');
route::get('/', [FrontendController::class, 'home']);

Route::group(['middleware' => ['auth',]], function() {
    route::get('/myprofile/{id}', [ProfileController::class, 'myprofile']);
    route::put('/updateprofile/{id}', [ProfileController::class, 'updateprofile']);
    route::post('/update/{id}', [ProfileController::class, 'updatePassword'])->name('update.password.post');
    route::get('/nilai/{id}', [ProfileController::class, 'nilai']);

    route::get('/{quiz:slug}', [FrontendController::class, 'numerik']);
    route::get('/{userid}/{quiz:slug}/{token}', [FrontendController::class, 'quiz'])->middleware('sesi')->name('quiz');
    // route::get('/{userid}/{id}/{token}', [FrontendController::class, 'quizz'])->middleware('sesi')->name('quizz');
    route::post('/jawab', [JawabanController::class, 'index'])->name('jawab');
    route::get('/{quiz:slug}/hasil', [FrontendController::class, 'selesai'])->name('hasil');

    route::get('/hasil/{quiz:token}', [FrontendController::class, 'hasil'])->name('hasils');
});


