<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('user/{user_id}/notes',  [NoteController::class , 'index']);
Route::apiResource('note',NoteController::class);
