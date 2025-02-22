<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\UserService;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Response;
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