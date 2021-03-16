<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['prefix' => 'adminpanel', 'middleware' => ['auth','userTypeAdmin']], function () {
    /** start of home **/
    Route::get('/', 'AdminPanel\Home\HomeController@index')->name('adminpanel.home.index');
    Route::post('/fetchingStats','AdminPanel\Home\HomeController@fetchingStats')->name('adminpanel.home.fetchingStats');
    /**end of Home **/


    /**start of users**/
    Route::get('/users','AdminPanel\Users\usersController@index')->name('adminpanel.users.index');
    Route::get('/users/addEdit/{userId?}','AdminPanel\Users\usersController@addEDit')->name('adminpanel.users.addEditUsers');
    Route::post('/users/addEditAction','AdminPanel\Users\usersController@additAction')->name('adminpanel.users.addeditUsersAction');
    Route::post('/users/actions','AdminPanel\Users\usersController@usersActions')->name('adminapenl.users.usersActions');
    Route::post('/users/openLog','AdminPanel\Users\usersController@openLog')->name('adminpanel.users.openLog');
    /**end of users**/



    /** start of purchases **/
    Route::get('/purchases','AdminPanel\Purchases\purchasesConytoller@index')->name('adminpanel.purchases.index');
    Route::post('/purchases/addEdit','AdminPanel\Purchases\purchasesConytoller@addEdit')->name('adminpanel.purchases.addEdit');
    Route::post('/purchases/getRecord','AdminPanel\Purchases\purchasesConytoller@getRecord')->name('adminpanel.purchases.getRecord');
    Route::post('/purchases/delete','AdminPanel\Purchases\purchasesConytoller@deleteeRcord')->name('adminpanel.purchases.deleteeRcord');
    /**end of purchases**/


    /**start of users Purchases**/
    Route::get('/PurchasesUsers','AdminPanel\Purchases\usersPurchasesController@index')->name('adminpanel.PurchasesUsers.index');
    /**end of users purchases**/


    /** start of Orders  **/
    Route::get('/Orders','AdminPanel\Orders\ordersController@index')->name('adminpanel.orders.index');


    Route::post('/orders/createNewOrder','AdminPanel\Orders\ordersController@createNewORder')->name('adminpanel.orders.createNewOrder');
    Route::get('/orders/createProductOffer','AdminPanel\Orders\ordersController@createProductOffer')->name('adminpanel.orders.createProdictOffer');
    Route::post('/orders/createProductOffer/getRow','AdminPanel\Orders\ordersController@getRowProduct')->name('adminpanel.orders.createNewOrder.getRow');
    Route::post('/orders/createProductOffer/Submit','AdminPanel\Orders\ordersController@createProductOfferSubmit')->name('adminpanel.orders.createNewOrder.createProductOfferSubmit');
    Route::post('/orders/createOrderDetail','AdminPanel\Orders\ordersController@createOrderDetail')->name('adminpanel.orders.createOrderDetail');
    Route::post('/orders/reopenOrder','AdminPanel\Orders\ordersController@reopenOrder')->name('adminpanel.orders.reopen');
    Route::post('/order/getRecord','AdminPanel\Orders\ordersController@getRecord')->name('adminpanel.orders.getRecord');

    /**End Of Orders**/



    /** start of products **/

    Route::get('/products','AdminPanel\Products\productsController@index')->name('adminpanel.products.index');
    Route::post('/products/addEdit','AdminPanel\Products\productsController@addEdit')->name('adminpanel.products.addedit');
    Route::post('/products/getRecord','AdminPanel\Products\productsController@getRecord')->name('adminpanel.products.getRecord');
    Route::post('/products/deleteProduct','AdminPanel\Products\productsController@deleteProduct')->name('adminpanel.products.deleteProduct');
    Route::post('/products/addQuantity','AdminPanel\Products\productsController@addQuantity')->name('adminpanel.products.addQuantity');
    /**end of products**/



    /** start of Cities **/
     Route::get('/cities','AdminPanel\Cities\cityController@index')->name('adminpanel.cities.index');
     Route::post('/cities/deleterecord','AdminPanel\Cities\cityController@deleteRecord')->name('adminpanel.cities.deleteeRcord');
     Route::post('/cities/addEdit','AdminPanel\Cities\cityController@addEdit')->name('adminpanel.cities.addEdit');
     Route::post('/cities/getrecord','AdminPanel\Cities\cityController@getRecord')->name('adminpanel.cities.getRecord');
    /**end of Cities**/

    /** start of maintenanceService **/
    Route::get('/maintenanceService','AdminPanel\MaintenanceService\maintenanceServiceController@index')->name('adminpanel.maintenanceService.index');
    Route::post('/maintenanceService/addEdit','AdminPanel\MaintenanceService\maintenanceServiceController@addEdit')->name('adminpanel.maintenanceService.addEdit');
    Route::post('/maintenanceService/getRecord','AdminPanel\MaintenanceService\maintenanceServiceController@getRecord')->name('adminpanel.maintenanceService.getRecord');
    Route::post('/maintenanceService/delete','AdminPanel\MaintenanceService\maintenanceServiceController@deleteeRcord')->name('adminpanel.maintenanceService.deleteeRcord');
    /**end of maintenanceService **/

    /**start of waarenty*/
    Route::get('/ordersWarrenty','AdminPanel\OrdersWarrenty\ordersWarrenty@index')->name('adminpanel.ordersWarrenty.index');
    /**end of warrenty*/

    /** start of problemsDescribingOrders **/
    Route::get('/problemsDescribing','AdminPanel\ProblemsDescribingOrders\problemsDescribingController@index')->name('adminpanel.problemsDescribingOrders.index');
    Route::post('/problemsDescribing/deleterecord','AdminPanel\ProblemsDescribingOrders\problemsDescribingController@deleteRecord')->name('adminpanel.problemsDescribingOrders.deleteeRcord');
    Route::post('/problemsDescribing/addEdit','AdminPanel\ProblemsDescribingOrders\problemsDescribingController@addEdit')->name('adminpanel.problemsDescribingOrders.addEdit');
    Route::post('/problemsDescribing/getrecord','AdminPanel\ProblemsDescribingOrders\problemsDescribingController@getRecord')->name('adminpanel.problemsDescribingOrders.getRecord');

    /**end of problemsDescribingOrders**/




    #startofegion
    Route::get('/reviews','AdminPanel\Reviews\reviewsController@index')->name('adminpanel.rates.index');
    #endofregion

    #startofTimeLine
    /** start of TimeLine **/
    Route::get('/timeLine','AdminPanel\TimeLine\timeLineCntroller@index')->name('adminpanel.timeLine.index');
    #endofTimeLine
    /**end of TimeLine**/


    /**start of Users Log**/
    Route::get('/logs','AdminPanel\UsersLogs\usersLogs@index')->name('adminpanel.logs.index');
    /**end of Users Log**/


});



// this public route so the users can download thier bill
Route::get('/adminpanel/orders/getOrderBill/{orderId}','AdminPanel\Orders\ordersController@getOrderBill')->name('adminpanel.orders.getOrderBill');
Route::post('/adminpanel/orders/getOrderDescriotion','AdminPanel\Orders\ordersController@getOrderDescription')->name('adminpanel.orders.getOrderDescription');
Route::post('/adminpanel/Orders/getOrderDetail','AdminPanel\Orders\ordersController@getOrderDetail')->name('adminpanel.orders.getOrderDetail');
Route::post('/adminpanel/orders/showMaintenanceProblems','AdminPanel\Orders\ordersController@showMaintenanceProblems')->name('adminapenl.orders.showMaintenanceProblems');
Route::post('/adminpanel/orders/deleteEleemt','AdminPanel\Orders\ordersController@deleteElement')->name('adminpanel.orders.deleteElement');
Route::get('/adminpanel/orders/rateOrder/{orderId}','AdminPanel\Orders\reviewsController@index')->name('adminpanel.orders.rateOrder');
Route::post('/adminpanel/orders/submitRate','AdminPanel\Orders\reviewsController@submitRate')->name('adminpanel.orders.submitRate');
Route::get('/adminpanel/getReports/{date}','AdminPanel\Home\HomeController@getReports')->name('adminpanel.home.getReports');
Route::get('/adminpanel/getLogs/{date}','AdminPanel\Home\HomeController@getLogs')->name('adminpanel.home.getLogs');
