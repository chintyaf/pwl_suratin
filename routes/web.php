<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MOController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratPengantarController;
use App\Http\Controllers\SuratKeteranganLulusController;
use App\Http\Controllers\LaporanHasilStudiController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SuratKeteranganMahasiswaAktifController;
use App\Http\Controllers\TypeSuratController;
use App\Models\User;

Route::get('/register-admin', function () {
    if (User::where('id_role', '0')->exists()) {
        return redirect()->route('login');
    }

    return view('admin.register');
});

Route::post('/register-admin/create', [UserController::class, 'storeAdmin'])->name('storeAdmin');



Route::get('/testieee', function () {
    return view('user.add', ['id_role' => '0']);
});

// DASHBOARD
Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $routes = [
        '0' => 'admin.dashboard',
        '1' => 'kaprodi.dashboard',
        '2' => 'mo.dashboard',
        '3' => 'mhs.dashboard',
    ];

    return isset($routes[Auth::user()->id_role])
        ? redirect()->route($routes[Auth::user()->id_role])
        : abort(403, 'Unauthorized');
})->name('dashboard');


// ADMIN
Route::middleware(['auth', 'verified', 'role:0'])->group(function () {
    Route::controller(AdminController::class)->prefix('admin')->group(function () {
        Route::get('dashboard', 'index')->name('admin.dashboard');
    });

    // Create account
    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('', 'index')->name('user.index');

        Route::get('add', 'add')->name('user.add');
        Route::post('store', 'store')->name('user.store');
        Route::get('edit/{nip}', 'edit')->name('user.edit');
        Route::put('update/{nip}', 'update')->name('user.update');
        Route::get('delete/{id}', 'delete')->name('user.delete');

        Route::get('disable/{id}', 'disable')->name('user.disable');

        Route::get('import', 'importForm')->name('user.importForm');
        Route::post('import/store', 'importStore')->name('user.importStore');
    });

        // Program Studi
        Route::controller(ProdiController::class)->prefix('program-studi')->group(function () {
            Route::get('', 'index')->name('program_studi.index');

            Route::get('add', 'add')->name('program_studi.add');
            Route::post('store', 'store')->name('program_studi.store');
            Route::get('edit/{id}', 'edit')->name('program_studi.edit');
            Route::put('update/{id}', 'update')->name('program_studi.update');
            Route::delete('delete/{id}', 'delete')->name('program_studi.delete');
        });

        // Tipe Surat
        Route::controller(TypeSuratController::class)->prefix('type-surat')->group(function () {
            Route::get('', 'index')->name('type_surat.index');

            Route::get('add', 'add')->name('type_surat.add');
            Route::post('store', 'store')->name('type_surat.store');
            Route::get('edit/{nip}', 'edit')->name('type_surat.edit');
            Route::put('update/{nip}', 'update')->name('type_surat.update');
            Route::delete('delete/{id}', 'delete')->name('type_surat.delete');
        });

        // Mata Kuliah
        Route::controller(MatkulController::class)->prefix('mata-kuliah')->group(function () {
            Route::get('', 'index')->name('mata_kuliah.index');

            Route::get('add', 'add')->name('mata_kuliah.add');
            Route::post('store', 'store')->name('mata_kuliah.store');
            Route::get('edit/{id}', 'edit')->name('mata_kuliah.edit');
            Route::put('update/{id}', 'update')->name('mata_kuliah.update');
            Route::delete('delete/{id}', 'delete')->name('mata_kuliah.delete');
        });


});

Route::get('/box-modal', function () {
    return view('layouts.partials.box');
});


// KAPRODI
Route::middleware(['auth', 'verified', 'role:1'])->group(function () {
    Route::controller(KaprodiController::class)->prefix('kaprodi')->group(function () {
        Route::get('dashboard', 'index')->name('kaprodi.dashboard');
    });
});


// MO
Route::middleware(['auth', 'verified', 'role:2'])->group(function () {
    Route::controller(MOController::class)->prefix('mo')->group(function () {
        Route::get('dashboard', 'index')->name('mo.dashboard');
    });
});

// MAHASISWA
Route::middleware(['auth', 'verified', 'role:3'])->group(function () {
    Route::controller(MahasiswaController::class)->prefix('mhs')->group(function () {
        Route::get('dashboard', 'index')->name('mhs.dashboard');
        Route::get('history', 'history')->name('mhs.history-surat');
    });

    // Route::get('/mahasiswa/history', function () {
    //     return view('mhs.history');
    // })->name('history-mahasiswa');

    Route::get('/mahasiswa/notification', function () {
        return view('mhs.notifikasi');
    })->name('notif-mhs');

    Route::get('/surat_pengantar/create', [SuratPengantarController::class, 'create'])->name('surat_pengantarCreate');
    Route::post('/surat_pengantar/create', [SuratPengantarController::class, 'store'])->name('surat_pengantarStore');

    Route::get('/surat_keterangan_mahasiswa_aktif/create', [SuratKeteranganMahasiswaAktifController::class, 'create'])->name('surat_keterangan_mahasiswa_aktifCreate');
    Route::post('/surat_keterangan_mahasiswa_aktif/create', [SuratKeteranganMahasiswaAktifController::class, 'store'])->name('surat_keterangan_mahasiswa_aktifStore');

    Route::get('/surat_keterangan_lulus/create', [SuratKeteranganLulusController::class, 'create'])->name('surat_keterangan_lulusCreate');
    Route::post('/surat_keterangan_lulus/create', [SuratKeteranganLulusController::class, 'store'])->name('surat_keterangan_lulusStore');

    Route::get('/laporan_hasil_studi/create', [LaporanHasilStudiController::class, 'create'])->name('laporan_hasil_studiCreate');
    Route::post('/laporan_hasil_studi/create', [LaporanHasilStudiController::class, 'store'])->name('laporan_hasil_studiStore');

    Route::get('/mahasiswa/surat/{id}', [SuratController::class, 'detailSuratMahasiswa']);

    Route::get('/surat/{id}/edit', [SuratController::class, 'edit'])->name('surat.edit');
    Route::put('/surat/{id}', [SuratController::class, 'update'])->name('surat.update');

    Route::delete('/surat/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');
    Route::get('/dokumen/{id}/unduh', [SuratController::class, 'unduh'])->name('dokumen.unduh');

});

// Route::get('/surat-detail', function () {
//     return view('surat.box');
// });

Route::get('/surat-detail/{surat}', [SuratController::class, 'suratBox'])->name('suratDetail');




Route::controller(SuratController::class)->group(function () {
    Route::get('/detail/{surat}', 'detailView')->name('surat.detailView');
    Route::put('/detail/{surat}', 'updateStatus')->name('surat.updateStatus');
    Route::put('/detail/{surat}/upload', 'uploadSurat')->name('surat.upload');


    Route::get('/surat/view/{surat}', 'viewSurat')->name('surat.view');
    Route::get('/surat/download/{surat}', 'downloadSurat')->name('surat.download');

    Route::get('/edit/{surat}', 'editSurat')->name('surat.editSurat');
    Route::get('/laporan-hasil-studi/edit/{surat}', [LaporanHasilStudiController::class, 'edit'])->name('laporan_hasil_studi.edit');
    Route::put('/laporan-hasil-studi/edit/{surat}', [LaporanHasilStudiController::class, 'update'])->name('laporan_hasil_studi.update');
    Route::delete('/laporan-hasil-studi/remove/{surat}', [LaporanHasilStudiController::class, 'destroy'])->name('laporan_hasil_studi.destroy');


    Route::get('/surat_keterangan_lulus/edit/{surat}', [SuratKeteranganLulusController::class, 'edit'])->name('surat_keterangan_lulus.edit');
    Route::put('/surat_keterangan_lulus/edit/{surat}', [SuratKeteranganLulusController::class, 'update'])->name('surat_keterangan_lulus.update');
    Route::delete('/surat_keterangan_lulus/remove/{surat}', [SuratKeteranganLulusController::class, 'destroy'])->name('surat_keterangan_lulus.destroy');

    Route::get('/surat_keterangan_mahasiswa_aktif/edit/{surat}', [SuratKeteranganMahasiswaAktifController::class, 'edit'])->name('surat_keterangan_mahasiswa_aktif.edit');
    Route::put('/surat_keterangan_mahasiswa_aktif/edit/{surat}', [SuratKeteranganMahasiswaAktifController::class, 'update'])->name('surat_keterangan_mahasiswa_aktif.update');
    Route::delete('/surat_keterangan_mahasiswa_aktif/remove/{surat}', [SuratKeteranganMahasiswaAktifController::class, 'destroy'])->name('surat_keterangan_mahasiswa_aktif.destroy');

    Route::get('/surat_pengantar/edit/{surat}', [SuratPengantarController::class, 'edit'])->name('surat_pengantar.edit');
    Route::put('/surat_pengantar/edit/{surat}', [SuratPengantarController::class, 'update'])->name('surat_pengantar.update');
    Route::delete('/surat_pengantar/remove/{surat}', [SuratPengantarController::class, 'destroy'])->name('surat_pengantar.destroy');

});

// SURAT
// surat detil


// surat form
Route::get('/form-lhs', function () {
    return view('surat.lhs.form-lhs');
})->name('form-lhs');

Route::get('/form-sk-mhs-aktif', function () {
    return view('surat.sk_mhs_aktif.form-skma');
})->name('form-sk-mhs-aktif');


Route::get('/form-sp-tugas-mk',
[SuratPengantarController::class, 'create'])->name('form-sp-tugas-mk');

// Route::get('/form-sp-tugas-mk', function () {
//     return view('surat.sp_tugas_mk.form-surat-pengantar');
// })->name('form-sp-tugas-mk');

Route::get('/form-sk-lulus', function () {
    return view('surat.sk_lulus.form-surat-lulus');
})->name('form-sk-lulus');

require __DIR__ . '/auth.php';
