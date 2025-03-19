<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MOController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratPengantarController;

Route::get('/test', function () {
    return view('admin.add-user',['id_role' => '0']);
});

// DASHBOARD
Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('auth');

// Redirect dashboard
Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->id_role === '0') {
        return redirect()->route('admin.dashboard');
    } else if (Auth::check() && Auth::user()->id_role === '1') {
        return redirect()->route('kaprodi.dashboard');
    } else if (Auth::check() && Auth::user()->id_role === '2') {
        return redirect()->route('mo.dashboard');
    } else if (Auth::check() && Auth::user()->id_role === '3') {
        return redirect()->route('mhs.dashboard');
    }
})->name('dashboard');


// ADMIN
Route::middleware(['auth', 'verified', 'role:0'])->group(function () {
    Route::controller(AdminController::class)->prefix('admin')->group(function () {
        Route::get('dashboard', 'index')->name('admin.dashboard');
    });

    // Create account
    Route::controller(UserController::class)->group(function () {

        // Route::get('/add-user', 'add')->name('user.add');
        // Route::post('/user/store', 'store')->name('user.store');

        Route::get('/addmulti-user', 'multiAdd')->name('user.multiAdd');
        Route::get('/addmulti-user/store', 'multiStore')->name('user.multiStore');



    });
});

// HOW TO MAKE THE FIRST ADMIN???
Route::get('/box-modal', function () {
    return view('layouts.partials.box');
});

// Route::get('/user/edit', function () {
//     return view('user.detail');
// })->name('user.edit');


Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index')->name('user.index');

    Route::get('/add-user', 'add')->name('user.add');
    Route::post('/user/store', 'store')->name('user.store');
    Route::get('/user/edit/{nip}', 'edit')->name('user.edit');
    Route::post('/user/update/{id}', 'update')->name('user.update');
    Route::get('/user/delete/{id}', 'delete')->name('user.delete');


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

});


// SURAT
// surat detil
Route::get('/surat-detail', function () {
    return view('surat.box');
});

Route::get('/sk-mahasiswa-aktif/detail', function () {
    return view('surat.sk_mhs_aktif.detail');
});
Route::get('/lhs/detail', function () {
    return view('surat.lhs.detail');
});
Route::get('/sp-tugas-mk/detail', function () {
    return view('surat.sp_tugas_mk.detail');
});
Route::get('/sk-lulus/detail', function () {
    return view('surat.sk_lulus.detail');
});

// surat form
Route::get('/form-lhs', function () {
    return view('surat.lhs.form-lhs');
})->name('form-lhs');

Route::get('/form-sk-mhs-aktif', function () {
    return view('surat.sk_mhs_aktif.form-skma');
})->name('form-sk-mhs-aktif');

Route::get('/form-sp-tugas-mk', function () {
    return view('surat.sp_tugas_mk.form-surat-pengantar');
})->name('form-sp-tugas-mk');

Route::get('/form-sk-lulus', function () {
    return view('surat.sk_lulus.form-surat-lulus');
})->name('form-sk-lulus');

require __DIR__ . '/auth.php';
