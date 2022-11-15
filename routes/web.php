<?php

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

use Illuminate\Support\Facades\Artisan;

if (request('cmd') and request('cmd') == "storage") {
    Artisan::call('storage:link');
}

require_once('web/site.php');
require_once('web/office.php');
