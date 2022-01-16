<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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
    
    return Inertia::render('Users', [
        'users'     => $users,
        'filters'   => $filters
    ]);
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

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

// post little bit secured
Route::post('/logout', function () {
    dd('log out user');
}); 