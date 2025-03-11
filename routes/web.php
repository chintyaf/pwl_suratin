<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MOController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.index');
})->name('dashboard');

// Route::get('/dashboard', function () {
//     return Auth::check() ? "Logged in" : "Not logged in";
// })->name('dashboard');


Route::get('/create-account', function () {
    return view('admin.add-account');
})->name('add-account');

Route::controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('dashboard', 'index')->name('admin.dashboard');
});

Route::controller(MOController::class)->prefix('mo')->group(function () {
    Route::get('dashboard', 'index')->name('mo.dashboard');
});

Route::controller(KaprodiController::class)->prefix('kaprodi')->group(function () {
    Route::get('dashboard', 'index')->name('kaprodi.dashboard');
});

Route::controller(MahasiswaController::class)->prefix('mahasiswa')->group(function () {
    Route::get('dashboard', 'index')->name('mahasiswa.dashboard');
});




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
Route::get('/sk/detail', function () {
    return view('surat.sk_lulus.detail');
});



Route::get('/form-lhs', function () {
    return view('mahasiswa.form-lhs');
})->name('form-lhs');

Route::get('/form-sk-mhs-aktif', function () {
    return view('mahasiswa.form-skma');
})->name('form-sk-mhs-aktif');

Route::get('/form-sp-tugas-mk', function () {
    return view('mahasiswa.form-surat-pengantar');
})->name('form-sp-tugas-mk');

Route::get('/form-sk-lulus', function () {
    return view('mahasiswa.form-surat-lulus');
})->name('form-sk-lulus');

Route::get('/mahasiswa/history', function () {
    return view('mahasiswa.history');
})->name('history-mahasiswa');

// Route::get('/dashboard-mahasiswa', function () {
//     return view('mahasiswa.dashboard');
// })->name('dashboard-mahasiswa');

// Ga bisa AUTH =)

// Route::get('/dashboard', function () {
//     return Auth::check() ? "Logged in" : "Not logged in";
// })->name('dashboard');

// ADMIN
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         $user = Auth::user();

//         return $user;
//         if (!$user) {
//             return response()->json(['error' => 'User not authenticated'], 401);
//         }

//         if ($user->id_role === '0') {
//             return redirect()->route('admin.dashboard');
//         } elseif ($user->id_role === '1') {
//             return redirect('/dashboard/user');
//         }

//         return redirect('/');
//     })->name('dashboard');

//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });


require __DIR__ . '/auth.php';
