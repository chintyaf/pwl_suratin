<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('layouts.index');
// })->name('dashboard');


Route::get('/create-account', function () {
    return view('admin.add-account');
})->name('add-account');

// Route::get('/dashboard', function () {
//     return "hi";
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return Auth::check() ? "Logged in" : "Not logged in";
})->name('dashboard');

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


Route::middleware('auth')->group(function () {});

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::middleware('role:0')->group(function () {
//         Route::prefix('dashboard/admin')->group(function () {
//             Route::get('/', function () {
//                 return view('dashboard.admin');
//             })->name('dashboard');
//             // Add more admin routes here
//         });
//     });
// });


// Route::middleware(['auth', 'verified', 'role:0'])->group(function () {
//     Route::get('/create-account', function () {
//         return view('admin.add-account');
//     })->name('add-account');

//     Route::get('/dashboard', function () {
//         return view('layouts.index');
//     })->name('dashboard');
// });



// Route::middleware(['auth', 'verified', 'role:2'])->group(function () {
//     Route::get('/dashboard/user', function () {
//         return view('dashboard.user');
//     })->name('dashboard.user');
// });




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
