<?php

use App\Http\Controllers\Api\V1\RegistersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/registers', [RegistersController::class, 'index']);
