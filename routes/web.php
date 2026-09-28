<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class,'index']);
//create User
Route::get('/addform', [UserController::class,'getUserForm']);
Route::post('/saveNewUser', [UserController::class,'storeUserForm']);

//delete record
Route::delete('/delete/{id}', [UserController::class,'deleteUser']);

//update form
Route::get('/update/{id}', [UserController::class,'getUpdateForm']);
Route::put('/updateUser/{id}', [UserController::class,'updateUser']);
