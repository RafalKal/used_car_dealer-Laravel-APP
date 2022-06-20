<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    // |----- HOMEPAGE ROUTE -----|
    Route::get('/', 'HomeController@index')->name('home.index');

    // |----- ROUTES FOR GUEST USER -----|
    Route::group(['middleware' => ['guest']], function() {

        //REGISTER ROUTES
        Route::get('/register', 'AuthController@showRegister')->name('register.show');
        Route::post('/register', 'AuthController@register')->name('register.perform');

        //LOGIN ROUTES
        Route::get('/login', 'AuthController@showLogin')->name('login.show');
        Route::post('/login', 'AuthController@login')->name('login.perform');

    });

    // |----- ADDITIONAL ROUTES FOR SUPER ADMIN -----|
    Route::group(['middleware' => ['can:super-admin']], function (){

        //SHOW USERS ROUTE
        Route::get('/users', 'UsersController@getAll')->name('users.getAll');

        //CHANGE USER'S ROLE ROUTE
        Route::get('/users/role/change/{id}', 'UsersController@showChangeRole')->name('users.role.change');
        Route::post('/users/role/change/{id}', 'UsersController@changeRole')->name('users.role.change.perform');

        //REMOVE USER ROUTE
        Route::get('/users/remove/{id}', 'UsersController@remove')->name('users.remove');
    });

    // |----- ROUTES FOR ADMIN -----|
    Route::group(['middleware' => ['can:admin']], function (){

        //SHOW MANUFACTURERS ROUTE
        Route::get('/manufacturers', 'CarManufacturerController@getAll')->name('manufacturers.getAll');

        //CREATE NEW MANUFACTURER ROUTE
        Route::get('/manufacturers/new', 'CarManufacturerController@showNew')->name('manufacturers.new');
        Route::post('/manufacturers/new', 'CarManufacturerController@new')->name('manufacturers.new.perform');

        //EDIT CHOSEN MANUFACTURER ROUTE
        Route::get('/manufacturers/edit/{id}', 'CarManufacturerController@editShow')->name('manufacturers.edit');
        Route::post('/manufacturers/edit/{id}', 'CarManufacturerController@edit')->name('manufacturers.edit.perform');

        //REMOVE CHOSEN MANUFACTURER ROUTE
        Route::get('/manufacturers/remove/{id}', 'CarManufacturerController@remove')->name('manufacturers.remove');

        //SHOW FUEL TYPES ROUTE
        Route::get('/fuel_types', 'FuelTypeController@getAll')->name('fuel_type.getAll');

        //CREATE NEW FUEL TYPE ROUTE
        Route::get('/fuel_types/new', 'FuelTypeController@showNew')->name('fuel_types.new');
        Route::post('/fuel_types/new', 'FuelTypeController@new')->name('fuel_types.new.perform');

        //EDIT CHOSEN FUEL TYPE ROUTE
        Route::get('/fuel_types/edit/{id}', 'FuelTypeController@editShow')->name('fuel_types.edit');
        Route::post('/fuel_types/edit/{id}', 'FuelTypeController@edit')->name('fuel_types.edit.perform');

        //REMOVE CHOSEN FUEL TYPE ROUTE
        Route::get('/fuel_types/remove/{id}', 'FuelTypeController@remove')->name('fuel_types.remove');

        //SHOW TRANSMISSIONS TYPES ROUTE
        Route::get('/transmissions', 'TransmissionTypeController@getAll')->name('transmissions.getAll');

        //CREATE TRANSMISSION TYPE ROUTE
        Route::get('/transmissions/new', 'TransmissionTypeController@showNew')->name('transmissions.new');
        Route::post('/transmissions/new', 'TransmissionTypeController@new')->name('transmissions.new.perform');

        //EDIT CHOSEN TRANSMISSION TYPE ROUTE
        Route::get('/transmissions/edit/{id}', 'TransmissionTypeController@editShow')->name('transmissions.edit');
        Route::post('/transmissions/edit/{id}', 'TransmissionTypeController@edit')->name('transmissions.edit.perform');

        //REMOVE CHOSEN TRANSMISSION TYPE ROUTE
        Route::get('/transmissions/remove/{id}', 'TransmissionTypeController@remove')->name('transmissions.remove');

        //SHOW ORDERS TYPES ROUTE
        Route::get('/orders', 'OrderHistoryController@getAll')->name('order.getAll');

        //CREATE ORDERS TYPE ROUTE
        Route::get('/orders/new', 'OrderHistoryController@showNew')->name('order.new');
        Route::post('/orders/new', 'OrderHistoryController@new')->name('order.new.perform');

        //EDIT CHOSEN ORDER TYPE ROUTE
        Route::get('/orders/edit/{id}', 'OrderHistoryController@editShow')->name('order.edit');
        Route::post('/orders/edit/{id}', 'OrderHistoryController@edit')->name('order.edit.perform');

        //REMOVE CHOSEN ORDER TYPE ROUTE
        Route::get('/orders/remove/{id}', 'OrderHistoryController@remove')->name('order.remove');

        //SHOW MODELS ROUTE
        Route::get('/models', 'CarModelController@getAll')->name('models.getAll');

        //CREATE MODEL ROUTE
        Route::get('/models/new', 'CarModelController@showNew')->name('models.new');
        Route::post('/models/new', 'CarModelController@new')->name('models.new.perform');

        //EDIT CHOSEN MODEL ROUTE
        Route::get('/models/edit/{id}', 'CarModelController@editShow')->name('models.edit');
        Route::post('/models/edit/{id}', 'CarModelController@edit')->name('models.edit.perform');

        //REMOVE CHOSEN MODEL ROUTE
        Route::get('/models/remove/{id}', 'CarModelController@remove')->name('models.remove');

        //CREATE NEW CAR ROUTE
        Route::get('/cars/new', 'HomeController@showNew')->name('cars.new');
        Route::post('/cars/new', 'HomeController@new')->name('cars.new.perform');

        //EDIT CHOSEN CAR ROUTE
        Route::get('/cars/edit/{id}', 'HomeController@showEdit')->name('cars.edit');
        Route::post('/cars/edit/{id}', 'HomeController@edit')->name('cars.edit.perform');

        //REMOVE CHOSEN CAR ROUTE
        Route::get('/cars/remove/{id}', 'HomeController@remove')->name('cars.remove');
    });

    // |----- ROUTES FOR USER -----|
    Route::group(['middleware' => ['can:user']], function () {

        //
        Route::get('/profile', 'UsersController@profile')->name('user.profile');

        //EDIT PROFILE ROUTE
        Route::get('/profile/edit', 'UsersController@showProfileEdit')->name('user.profile.edit');
        Route::post('/profile/edit', 'UsersController@profileEdit')->name('user.profile.edit.perform');

        //REMOVE PROFILE ROUTE
        Route::get('/profile/remove', 'UsersController@removeProfile')->name('user.profile.remove');

        //NEW ORDER ROUTE
        Route::get('/order/new/{id}', 'OrderHistoryController@new')->name('order.new');

    });

    Route::group(['middleware' => ['auth']], function() {

        //LOGOUT ROUTE
        Route::get('/logout', 'AuthController@logout')->name('logout.perform');
    });
});
