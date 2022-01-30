<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post ('login', [LoginController::class, 'store']);
Route::post ('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return Inertia::render('Home');
    });
    
    Route::get('/users', function () {
        $search = Request::input('search');
    
        $users = User::query()
            ->select('id','name','email')
            ->when($search, function($query, $search){
                // $query->where('name','like', "%{$search}%"); //stringInterpolation
                $query->where('name','like', '%' .$search . '%');
            })
            ->paginate(10)
            ->withQueryString();
    
        $filters = Request::only([ 'search' ]);
        
        return Inertia::render('Users/Index', [
            'users'     => $users,
            'filters'   => $filters,
            'can'       => [
                'createUser'    => Auth::user()->can('create', User::class),
                'editUser'      => Auth::user()->can('edit', User::class),
            ]
        ]);
    });
    
    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->can('create', User::class);
    
    Route::post('/users', function () {
        // validate request
        $attributes  = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        
        // create user
        User::create($attributes); 
        
        // redirect
        return redirect('/users');
    });
    
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
});

// Route::get('/users', function () {
//     return Inertia::render('Users', [
//         'users' => User::query()
//         ->when(Request::input('search'), function ( $query, $search ){
//             $query->where('name','like', "%{$search}%"); //stringInterpolation
//             // $query->where('name','like', '%' .$search . '%');
//         })
//         ->paginate(10)
//         ->withQueryString()
//         ->through(fn($user) => [
//             'id'    => $user->id,
//             'name'  => $user->name,
//             'email' => $user->email
//         ])
//     ]);
// }); 