<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;


Route::middleware('auth:api')->get('/agenda', function (Request $request) {
    return $request->agenda();
});

Route::get('agendas', [AgendaController::class, 'index']);

Route::get('agenda/{id}', [AgendaController::class, 'show']);

Route::post('agenda', [AgendaController::class, 'store']);

Route::put('agendas{id}', [AgendaController::class, 'update']);

Route::delete('agenda/{id}', [AgendaController::class,'destroy']);