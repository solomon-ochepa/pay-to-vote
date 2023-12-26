<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Output\BufferedOutput;

Route::/*middleware(['auth', 'verified', 'role:admin'])->*/prefix('artisan')->group(function () {
    Route::get('/', function (Request $request) {
        $output = new BufferedOutput();

        Artisan::call(($request->command ?? 'optimize:clear').' -n', [], $output);
        output($output->fetch());
    });

    // Run migration
    Route::get('/migrate', function (Request $request) {
        $output = new BufferedOutput;

        Artisan::call('migrate', ['--path' => $request->path], $output);
        output($output->fetch());

        Artisan::call('module:migrate', [], $output);
        output($output->fetch());
    });

    // migrate:fresh     Drop all tables and re-run all migrations
    Route::get('/migrate-fresh', function (Request $request) {
        $output = new BufferedOutput;

        Artisan::call('migrate:fresh', ['--path' => $request->path], $output);
        output($output->fetch());
    });

    // migrate:install   Create the migration repository
    Route::get('/migrate-install', function (Request $request) {
        $output = new BufferedOutput;

        Artisan::call('migrate:install', [], $output);
        output($output->fetch());
    });

    // migrate:refresh   Reset and re-run all migrations
    Route::get('/migrate-refresh', function (Request $request) {
        $output = new BufferedOutput;

        Artisan::call('migrate:refresh', ['--path' => $request->path], $output);
        output($output->fetch());
    });

    // migrate:reset     Rollback all database migrations
    Route::get('/migrate-reset', function (Request $request) {
        $output = new BufferedOutput;

        Artisan::call('migrate:reset', [], $output);
        output($output->fetch());
    });

    // migrate:rollback  Rollback the last database migration
    Route::get('/migrate-rollback', function (Request $request) {
        $output = new BufferedOutput;

        Artisan::call('migrate:rollback', [], $output);
        output($output->fetch());
    });

    // migrate:status    Show the status of each migration
    Route::get('/migrate-status', function (Request $request) {
        $output = new BufferedOutput;

        Artisan::call('migrate:status', [], $output);
        output($output->fetch());
    });

    // db:seed
    Route::get('/seed', function (Request $request) {
        $output = new BufferedOutput;

        Artisan::call('db:seed', [], $output);
        output($output->fetch());
    });

    // module:seed
    Route::get('/module-seed', function (Request $request) {
        $output = new BufferedOutput;

        Artisan::call('module:seed', [], $output);
        output($output->fetch());
    });

    Route::get('/storage', function () {
        $output = new BufferedOutput;

        Artisan::call('storage:link -n', [], $output);
        output($output->fetch());
    });

    Route::get('/session', function () {
        $output = new BufferedOutput;

        Artisan::call('session:table -n', [], $output);
        output($output->fetch());
    });

    Route::get('/sitemap', function () {
        $output = new BufferedOutput;

        Artisan::call('make:sitemap -n', [], $output);
        output($output->fetch());
    });
});

function output($text)
{
    $text = trim($text);
    $text = str_replace("\n\r\n", '<br /><br />', $text);
    $text = str_replace("\n\n", '<br />', $text);
    echo $text.'<hr />';
}
