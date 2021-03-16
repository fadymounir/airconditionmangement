<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'employe', 'middleware' => ['auth','userType']], function () {
    /** start of home **/
    Route::get('/home','AdminPanel\Home\HomeController@homeUser')->name('employe.home.index');
    Route::post('/home/finishLog','AdminPanel\Home\HomeController@finishLog')->name('employe.home.finishLog');
    /**end of Home**/

    /**start of orders**/
    Route::get('/home/order/finishOrder/{order}','AdminPanel\employe\finishOrder@finishOrder')->name('employe.orders.finishOrder');
    Route::post('/home/finishOrder','AdminPanel\employe\finishOrder@finishOrderSubmit')->name('employe.orders.finishOrderSubmit');

    /**end of orders*/


    /** start of installation**/
    Route::get('/home/Installation/{orderId}','AdminPanel\employe\InstallationController@index')->name('employe.Installation.index');
    Route::post('/home/Installation/getRow','AdminPanel\employe\InstallationController@getRow')->name('employe.Installation.getRow');
    Route::post('/home/Installation/createNewInstallation','AdminPanel\employe\InstallationController@creeNewInstallation')->name('employe.Installation.createNewInstallation');
    /** end of installation**/


    /**start of Maintenance**/
    Route::get('/home/Maintenance/{orderId}','AdminPanel\employe\MaintenanceController@index')->name('employe.Maintenance.index');
    Route::post('/home/Maintenance/getRow','AdminPanel\employe\MaintenanceController@getRow')->name('employe.Maintenance.getRow');
    Route::post('/home/Maintenance/createNewMaintenance','AdminPanel\employe\MaintenanceController@createNewMaintenance')->name('employe.Maintenance.createNewMaintenance');
    Route::post('/home/Maintenance/getRowPurchaes','AdminPanel\employe\MaintenanceController@getRowPurchases')->name('employe.Maintenance.getRowPurchaes');
    /**end of Maintenance**/


    /**start of Pipes**/
    Route::get('/home/Pipes/{orderId}','AdminPanel\employe\PipesExtension@index')->name('employe.Pipes.index');
    Route::post('/home/Pipes/getRow','AdminPanel\employe\PipesExtension@getRow')->name('employe.Pipes.getRow');
    Route::post('/home/Pipes/createNewPipes','AdminPanel\employe\PipesExtension@createNewPipes')->name('employe.Pipes.createNewPipes');
    /**end of Pipes**/


    /**start of purchases*/
        Route::post('/home/addNewPurchases','AdminPanel\employe\Purchases@addNewPurchases')->name('employe.Purchases.addNewPurchases');
    /**end of purchases**/

    /**start of order element **/
    Route::post('/home/orderElement/getRow','AdminPanel\employe\orderElementController@getRow')->name('employe.orderElement.getRow');
     /**end of order Element**/

});


