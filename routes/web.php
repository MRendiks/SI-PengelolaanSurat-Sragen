<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Surat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PreviewController;
use App\Http\Controllers\SuratUserController;

Route::get('/', function () {
    return view('welcome');
});

# GUEST

route::get('/register', [RegisterController::class, 'get' ])->name('register')->middleware('guest');
route::post('/register', [RegisterController::class, 'create']);

route::get('/login', [LoginController::class, 'index' ])->name('login')->middleware('guest');

Route::get('/homesurat', function(){
    return view('homesurat');
})->name('home_surat')->middleware('guest');

Route::get('/homekegiatan', function(){
    return view('homekegiatan');
})->name('homekegiatan')->middleware('guest');

# Login

route::post('/login', function(){
    return view('login');
})->name('login');

Route::post('postlogin', [LoginController::class, 'attempt'])->name('postlogin');


Route::get('/logout', [LoginController::class, 'logout' ]);

# AUTH


Route::group(['middleware' => ['auth', 'ceklevel:admin,user']], function(){
    route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/{permohonan}/pdf', [SuratUserController::class, 'preview_pdf'])->name("preview_pdf");
});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function(){
    # SURAT
    route::get('/surat_admin',[SuratController::class,'index'])->name('surat_admin');
    route::get('/{id_surat}/editsurat',[SuratController::class,'edit']);
    route::post('/{id_suret}/editsurat',[SuratController::class,'update']);
    Route::get('/{id_surat}/delete_surat',[SuratController::class,'delete']);

    # KEGIATAN
    route::get('/kegiatan_admin', [KegiatanController::class, 'index_admin'])->name('kegiatan_admin');
    route::post('/tambah_kegiatan', [KegiatanController::class, 'store'])->name('tambah_kegiatan');
    route::delete('/{id_kegiatan}/delete_kegiatan', [KegiatanController::class, 'destroy'])->name('delete_kegiatan');
    route::put('/{id_kegiatan}/update_kegiatan', [KegiatanController::class, 'update'])->name('update_kegiatan');
    
    route::delete('/{id_surat}/delete_surat', [SuratController::class, 'destroy'])->name('delete_surat');
    route::put('/{id_surat}/update_surat', [SuratController::class, 'update'])->name('update_surat');

    route::get('/cetak_surat1/{id_surat}', [CetakController::class, 'cetak_1'])->name('cetak_1');
    route::get('/cetak_surat2/{id_surat}', [CetakController::class, 'cetak_2'])->name('cetak_2');
});

Route::group(['middleware' => ['auth', 'ceklevel:user']], function(){
    route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
    route::get('/surat', [SuratUserController::class, 'index'])->name('surat');
    route::post('/pengajuan',[SuratUserController::class, 'store'])->name('pengajuan');
    
    route::get('/{id_surat}/preview_surat1', [PreviewController::class, 'preview_1'])->name('preview_1');
    route::get('/{id_surat}/preview_surat2', [PreviewController::class, 'preview_2'])->name('preview_2');
    
    
});


Route::get('/input',[SuratController::class,'input'])->name('input');
Route::post('/input',[SuratController::class,'store'])->name('store');
