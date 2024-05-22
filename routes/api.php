<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
/********************API*********************/

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
/*================customers=============*/
// Route::middleware('auth:sanctum')->group(function () {
/***/
Route::get('customers', [CustomerController::class,'index']);
Route::post('customers', [CustomerController::class,'create']);
Route::get('customers/{id}', [CustomerController::class,'show']);
Route::delete('customers/{id}', [CustomerController::class,'delete' ]);
Route::patch('customers/{id}', [CustomerController::class,'update']);
Route::post('customers/export', [CustomerController::class,'export']);

/*================customers-notes=============*/
Route::get('customers/{customerId}/notes', [NotesController::class,'index']);
Route::post('customers/{customerId}/notes', [NotesController::class,'create']);
Route::get('customers/{customerId}/notes/{Id}', [NotesController::class, 'show']);
Route::patch('customers/{customerId}/notes/{id}', [NotesController::class,'update']);
Route::delete('customers/{customerId}/notes/{id}', [NotesController::class,'delete']);
/*================customers-projects=============*/
Route::post('customers/{customerId}/projects', [ProjectController::class,'createProject']);
Route::get('customers/{customerId}/projects', [ProjectController::class,'index']);
// Route::get('customers/{customerId}/projects/{id}', [ProjectController::class,'show']);
//Route::patch('customers/{customerId}/projects/{id}', [ProjectController::class,'update']);
//Route::delete('customers/{customerId}/projects/{id}', [ProjectController::class,'delete']);
/***/
// });
/*===========================================*/
Route::post('users', [UserController::class,'create'] );
