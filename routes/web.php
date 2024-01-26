<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/products', [ProductController::class, 'store']);
Route::get('/products', [ProductController::class, 'index']);
Route::put('/products/{id}', [ProductController::class, 'update']);


// Handle OPTIONS requests for CORS
Route::options('/{any}', function () {
    return response('', 200)
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Authorization');
})->where('any', '.*');
// routes/web.php

// Route::get('products/{file}', function ($file) {
//     $path = public_path('uploads/' . $file);

//     if (!file_exists($path)) {
//         abort(404);
//     }

//     return response()->file($path);
// })->where('file', '.*');

