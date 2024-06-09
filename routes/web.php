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
Route::group(['middleware' => ['guest']], function () {
    route::get("/", "pageController@login")->name("login");
    route::post("/login", "AuthController@ceklogin");
});



Route::group(['middleware' => ['auth']], function () {
    route::get("/logout", "AuthController@ceklogout");
    route::get("/home", "pageController@home"); //home page
    Route::get("/Komiks", "pageController@komiks"); //komiks page
    Route::get("/komiks/formadd", "pageController@formAdd");
    Route::post("/save", "pageController@save");
    route::get("/form-edit/{id}", "pageController@editForm");
    route::put("/update/{id}", "pageController@update");
    route::get("/form-delete/{id}", "pageController@delete");
    route::get("/user", "pageController@editUser");
    route::post("/updateuser", "pageController@updateUser");

});
