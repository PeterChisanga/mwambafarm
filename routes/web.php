<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChemicalController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PigController;
use App\Http\Controllers\GoatController;
use App\Http\Controllers\CattleController;
use App\Http\Controllers\SheepController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});



Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/cattle', [CattleController::class, 'index'])->name('cattle.index');
    Route::get('/cattle/register', [CattleController::class, 'showRegisterPage']);
    Route::post('/cattle/register', [CattleController::class, 'register']);
    Route::get('/cattle/edit/{cattle}', [CattleController::class, 'showEditPage']);
    Route::post('/cattle/edit/{cattle}', [CattleController::class, 'edit']);
    Route::delete('/cattle/delete/{cattle}', [CattleController::class, 'destroy']);
    Route::get('/cattle/females', [CattleController::class, 'getFemaleCattle']);
    Route::get('/cattle/males', [CattleController::class, 'getMaleCattle']);
    Route::get('/cattle/sale', [CattleController::class, 'getCattleForSale']);
    Route::get('/cattle/quarantine', [CattleController::class, 'getQuarantineCattle']);
    Route::get('/cattle/sold', [CattleController::class, 'getSoldCattle']);
    Route::get('/cattle/dead', [CattleController::class, 'getDeadCattle']);

    Route::get('/sheep', [SheepController::class, 'index'])->name('sheep.index');
    Route::get('/sheep/register', [SheepController::class, 'showRegisterPage']);
    Route::post('/sheep/register', [SheepController::class, 'register']);
    Route::get('/sheep/edit/{sheep}', [SheepController::class, 'showEditPage']);
    Route::post('/sheep/edit/{sheep}', [SheepController::class, 'edit']);
    Route::delete('/sheep/delete/{sheep}', [SheepController::class, 'destroy']);
    Route::get('/sheep/females', [SheepController::class, 'getFemaleSheep']);
    Route::get('/sheep/males', [SheepController::class, 'getMaleSheep']);
    Route::get('/sheep/sale', [SheepController::class, 'getSheepForSale']);
    Route::get('/sheep/quarantine', [SheepController::class, 'getQuarantineSheep']);
    Route::get('/sheep/sold', [SheepController::class, 'getSoldSheep']);
    Route::get('/sheep/dead', [SheepController::class, 'getDeadSheep']);

    Route::get('/goats', [GoatController::class, 'index'])->name('goats.index');
    Route::get('/goats/register', [GoatController::class, 'showRegisterPage']);
    Route::post('/goats/register', [GoatController::class, 'register']);
    Route::get('/goats/edit/{goat}', [GoatController::class, 'showEditPage']);
    Route::post('/goats/edit/{goat}', [GoatController::class, 'edit']);
    Route::delete('/goats/delete/{goat}', [GoatController::class, 'destroy']);
    Route::get('/goats/females', [GoatController::class, 'getFemaleGoats']);
    Route::get('/goats/males', [GoatController::class, 'getMaleGoats']);
    Route::get('/goats/sale', [GoatController::class, 'getGoatsForSale']);
    Route::get('/goats/quarantine', [GoatController::class, 'getQuarantineGoats']);
    Route::get('/goats/sold', [GoatController::class, 'getSoldGoats']);
    Route::get('/goats/dead', [GoatController::class, 'getDeadGoats']);

    Route::get('/pigs', [PigController::class, 'index'])->name('pigs.index');
    Route::get('/pigs/register', [PigController::class, 'showRegisterPage']);
    Route::post('/pigs/register', [PigController::class, 'register']);
    Route::get('/pigs/edit/{pig}', [PigController::class, 'showEditPage']);
    Route::post('/pigs/edit/{pig}', [PigController::class, 'edit']);
    Route::delete('/pigs/delete/{pig}', [PigController::class, 'destroy']);
    Route::get('/pigs/females', [PigController::class, 'getFemalePigs']);
    Route::get('/pigs/males', [PigController::class, 'getMalePigs']);
    Route::get('/pigs/fattenning', [PigController::class, 'getPigsForSale']);
    Route::get('/pigs/quarantine', [PigController::class, 'getQuarantinePigs']);
    Route::get('/pigs/sold', [PigController::class, 'getSoldPigs']);
    Route::get('/pigs/dead', [PigController::class, 'getDeadPigs']);

    Route::get('/feeds', [FeedController::class, 'index']);
    Route::get('/feeds/cattle', [FeedController::class, 'getCattleFeed']);
    Route::get('/feeds/goats', [FeedController::class, 'getGoatFeed']);
    Route::get('/feeds/sheep', [FeedController::class, 'getSheepFeed']);
    Route::get('/feeds/pigs', [FeedController::class, 'getPigFeed']);
    Route::get('/feeds/register', [FeedController::class, 'showRegisterPage']);
    Route::get('/feeds/edit/{feed}', [FeedController::class, 'showEditPage']);
    Route::post('/feeds/edit/{feed}', [FeedController::class, 'editFeed']);
    Route::post('/feeds/register', [FeedController::class, 'register']);
    Route::delete('/feeds/{feed}', [FeedController::class, 'deleteFeed']);

    Route::get('/chemicals/register', [ChemicalController::class, 'showRegisterPage']);
    Route::get('/chemicals/edit/{chemical}', [ChemicalController::class, 'showEditPage']);
    Route::post('/chemicals/edit/{chemical}', [ChemicalController::class, 'editChemical']);
    Route::post('/chemicals/register', [ChemicalController::class, 'register']);
    Route::delete('/chemicals/{chemical}', [ChemicalController::class, 'deleteChemical']);

    Route::get('/unavailable', function () {
        return view('unavailable');
    });


});

