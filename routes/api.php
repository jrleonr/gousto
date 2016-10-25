<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//api/recipe/type/asian
Route::get('recipe/type/{value}', 'RecipeController@getRecipesByCuisine');

Route::resource('recipe', 'RecipeController');


