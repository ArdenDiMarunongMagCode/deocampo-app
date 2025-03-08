<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Services\UserService;
use App\Services\ProductService;
use App\Http\Controllers\UserController;
use App\Services\TaskService;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jhondel-hater', function (Request $request){
    $input = "bulok si jhondel sobra";
    return $input;
});

Route::get('/jhondel-hater-sobra', function (UserService $userService){
    return $userService->listUsers();
});

Route::get('/jhondel-hater-part3', [UserController::class, 'index']);

Route::get('/jhondel-hater-part4', function (UserService $userService){
    $input = "Response";
    return Response::json($userService->listUsers());
});


Route::get('/name/{name}/comment/{comment}', function ( String $name,  String $comment) {
    return 'Name: ' . $name . ', Comment: ' . $comment;
});

Route::get('/post/{id}', function (string $id){
    return $id;
})->where('id', '[0-9]+');

Route::get('/search/{search}', function (string $search){
    return $search;
})->where('search', '.*');




Route::get('/test/route', function () {
    return route('test-route');
})->name('test-route');



Route::middleware(['user-middleware'])->group(function () {
    Route::get('route-middleware-group/first', function (Request $request) {
        echo 'first';
    });

    Route::get('route-middleware-group/second', function (Request $request) {
        echo 'second';
    });
});

Route::controller(UserController::class)->group(function(){
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'show');
});


//csrf
Route::get('/token' , function (Request $request){
    $token = $request->session()->token();
    return view('token', ['token' => $token]);
});

Route::post('/token' , function (Request $request){
    return $request->all();
});


Route::get('/user', [UserController::class, 'index']) ->middleware('user-middleware');

Route::resource('products', ProductController::class);

Route::get('/product-list', function (ProductService $productService) {
    $data['products'] = $productService->listProducts();
    return view ('products.list', $data);
});
