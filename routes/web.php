<?php

use App\Actions\UpdateFakerSeedAction;
use Database\Factories\PersonFactory;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'people' => PersonFactory::times(10)->make(),
    ]);
});

Route::get('/people', function (Request $request) {
    $people = PersonFactory::times(10)->make();
    $size = mb_strlen($people->toJson(), '8bit');

    if (!$request->has('noSleep')) {
        sleep(3);
    }

    return [
        'people' => $people,
        'size' => $size,
    ];
});

Route::post('/simulate', function () {
    sleep(1);

    $action = new UpdateFakerSeedAction;
    $action();
});
