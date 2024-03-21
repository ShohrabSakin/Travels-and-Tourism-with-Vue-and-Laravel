<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\studentsController;

use App\Http\Controllers\students1Controller;
use App\Http\Controllers\StUploadController;


//  My Project [ Travels & Tourism Work ]  //

use App\Http\Controllers\BookingController;

use App\Http\Controllers\FeecollectionController;

use App\Http\Controllers\FlightsController;

use App\Http\Controllers\HotelsController;

use App\Http\Controllers\HotelbookingController;

use App\Http\Controllers\PackagesController;

use App\Http\Controllers\TodayfeeController;

use App\Http\Controllers\VisitingplacesController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\FloorsController;

use App\Http\Controllers\RoomsController;

use App\Http\Controllers\ServicesController;

use App\Http\Controllers\Services2Controller;

use App\Http\Controllers\ServicepaymentController;

use App\Http\Controllers\CheckoutController;



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
    return view('myProject');
});

Route::get('/st', [studentsController::class, 'index']);
Route::get('/edit/', ['as' => 'students.edit', 'uses' => 'studentsController@edit']);
Route::get('/destroy/', ['as' => 'students.destroy', 'uses' => 'studentsController@destroy']);

Route::Resource('students1',students1Controller::class);
Route::Resource('StUpload',StUploadController::class);


// Project Routing //


// 1. Booking //

    Route::get('Booking/getbookings',[BookingController::class, 'GetBookings']);

    Route::get('Booking/getbooking',[BookingController::class, 'GetBooking']);

    Route::get('Booking/deletebooking',[BookingController::class, 'DeleteBooking']);

    Route::get('Booking/insertbooking',[BookingController::class, 'InsertBooking']);

    Route::get('Booking/updatebooking',[BookingController::class, 'UpdateBooking']);

    Route::get('Booking/SearchBooking',[BookingController::class, 'SearchBooking']);


// 2. Feecollection  //

Route::get('Feecollection/getfeecollections',[FeecollectionController::class, 'GetFeecollections']);

Route::get('Feecollection/getfeecollection',[FeecollectionController::class, 'GetFeecollection']);

Route::get('Feecollection/deletefeecollection',[FeecollectionController::class, 'DeleteFeecollection']);

Route::get('feecollection/insertfeecollection',[FeecollectionController::class, 'InsertFeecollection']);

Route::get('Feecollection/updatefeecollection',[FeecollectionController::class, 'UpdateFeecollection']);



//  3. Flights    //

Route::get('Flights/getflights',[FlightsController::class, 'GetFlights']);

Route::get('Flights/getflight',[FlightsController::class, 'GetFlight']);

Route::get('Flights/deleteflights',[FlightsController::class, 'DeleteFlights']);

Route::get('Flights/insertflights',[FlightsController::class, 'InsertFlights']);

Route::get('Flights/updateflights',[FlightsController::class, 'UpdateFlights']);

Route::get('Flights/getflights2',[FlightsController::class, 'GetFlights2']);


//  4. Hotels   // 

Route::get('Hotels/gethotels',[HotelsController::class, 'GetHotels']);

Route::get('Hotels/gethotel',[HotelsController::class, 'GetHotel']);

Route::get('Hotels/deletehotels',[HotelsController::class, 'DeleteHotels']);

Route::get('Hotels/inserthotels',[HotelsController::class, 'InsertHotels']);

Route::get('Hotels/updatehotels',[HotelsController::class, 'UpdateHotels']);

Route::get('Hotels/gethotels2',[HotelsController::class, 'GetHotels2']);


//  4. Hotel Booking   // 

Route::get('Hotelbooking/gethotelbookings',[HotelbookingController::class, 'GetHotelbookings']);

Route::get('Hotelbooking/gethotelbooking',[HotelbookingController::class, 'GetHotelbooking']);

Route::get('Hotelbooking/deletehotelbooking',[HotelbookingController::class, 'DeleteHotelbooking']);

Route::get('Hotelbooking/inserthotelbooking',[HotelbookingController::class, 'InsertHotelbooking']);

Route::get('Hotelbooking/updatehotelbooking',[HotelbookingController::class, 'UpdateHotelbooking']);



// 5. Packages  //

Route::get('Packages/getpackages',[PackagesController::class, 'GetPackages']);

Route::get('Packages/getpackage',[PackagesController::class, 'GetPackage']);

Route::get('Packages/deletepackages',[PackagesController::class, 'DeletePackages']);

Route::get('Packages/insertpackages',[PackagesController::class, 'InsertPackages']);

Route::get('Packages/updatepackages',[PackagesController::class, 'UpdatePackages']);

Route::get('Packages/getservice2',[PackagesController::class, 'GetService2']);


// 6.  Todayfee   //

Route::get('Todayfee/gettodayfees',[TodayfeeController::class, 'GetTodayfees']);

Route::get('Todayfee/deletetodayfee',[TodayfeeController::class, 'DeleteTodayfee']);

Route::get('Todayfee/inserttodayfee',[TodayfeeController::class, 'InsertTodayfee']);

Route::get('Todayfee/updatetodayfee',[TodayfeeController::class, 'UpdateTodayfee']);


// 7. Visitingplaces // 

Route::get('Visitingplaces/getvisitingplaces',[VisitingplacesController::class, 'GetVisitingplaces']);

Route::get('Visitingplaces/getvisitingplace',[VisitingplacesController::class, 'GetVisitingplace']);

Route::get('Visitingplaces/deletevisitingplaces',[VisitingplacesController::class, 'DeleteVisitingplaces']);

Route::get('Visitingplaces/insertvisitingplaces',[VisitingplacesController::class, 'InsertVisitingplaces']);

Route::get('Visitingplaces/updatevisitingplaces',[VisitingplacesController::class, 'UpdateVisitingplaces']);


// 8. Category  // 

Route::get('Category/getcategorys',[CategoryController::class, 'GetCategorys']);

Route::get('Category/getcategory',[CategoryController::class, 'GetCategory']);

Route::get('Category/deletecategory',[CategoryController::class, 'DeleteCategory']);

Route::get('Category/insertcategory',[CategoryController::class, 'InsertCategory']);

Route::get('Category/updatecategory',[CategoryController::class, 'UpdateCategory']);


// 9. Floors //

Route::get('Floors/getfloors',[FloorsController::class, 'GetFloors']);

Route::get('Floors/getfloor',[FloorsController::class, 'GetFloor']);

Route::get('Floors/deletefloors',[FloorsController::class, 'DeleteFloors']);

Route::get('Floors/insertfloors',[FloorsController::class, 'InsertFloors']);

Route::get('Floors/updatefloors',[FloorsController::class, 'UpdateFloors']);


// 10. Rooms //

Route::get('Rooms/getrooms',[RoomsController::class, 'GetRooms']);

Route::get('Rooms/getroom',[RoomsController::class, 'GetRoom']);

Route::get('Rooms/deleterooms',[RoomsController::class, 'DeleteRooms']);

Route::get('Rooms/insertrooms',[RoomsController::class, 'InsertRooms']);

Route::get('Rooms/updaterooms',[RoomsController::class, 'UpdateRooms']);


// 11. Services  // 

Route::get('Services/getservices',[ServicesController::class, 'GetServices']);

Route::get('Services/getservice',[ServicesController::class, 'GetService']);

Route::get('Services/deleteservices',[ServicesController::class, 'DeleteServices']);

Route::get('Services/insertservices',[ServicesController::class, 'InsertServices']);

Route::get('Services/updateservices',[ServicesController::class, 'UpdateServices']);



// 12. Services 2 // 

Route::get('Services2/getServices2',[Services2Controller::class, 'GetServices2']);

Route::get('Services2/getService2',[Services2Controller::class, 'GetService2']);

Route::get('Services2/deleteServices2',[Services2Controller::class, 'DeleteServices2']);

Route::get('Services2/insertServices2',[Services2Controller::class, 'InsertServices2']);

Route::get('Services2/updateServices2',[Services2Controller::class, 'UpdateServices2']);



// 13. Service Payment // 

Route::get('Servicepayment/getservicepayments',[ServicepaymentController::class, 'GetServicepayments']);

Route::get('Servicepayment/getservicepayment',[ServicepaymentController::class, 'GetServicepayment']);

Route::get('Servicepayment/deleteservicepayment',[ServicepaymentController::class, 'DeleteServicepayment']);

Route::get('Servicepayment/insertservicepayment',[ServicepaymentController::class, 'InsertServicepayment']);

Route::get('Servicepayment/updateservicepayment',[ServicepaymentController::class, 'UpdateServicepayment']);

Route::get('Servicepayment/gethotelbookid',[ServicepaymentController::class, 'GetBookid']);

Route::get('Servicepayment/getrecordsfrombookid',[ServicepaymentController::class, 'Getrecordsfrombookid']);

Route::get('Servicepayment/getservicename',[ServicepaymentController::class, 'GetServicename']);


// 12. Check-Out  //


Route::get('Checkout/getcheckouts',[CheckoutController::class, 'GetCheckouts']);

Route::get('Checkout/getcheckout',[CheckoutController::class, 'GetCheckout']);

Route::get('Checkout/deletecheckout',[CheckoutController::class, 'DeleteCheckout']);

Route::get('Checkout/InsertCheckout',[CheckoutController::class, 'InsertCheckout']);

Route::get('Checkout/updatecheckout',[CheckoutController::class, 'UpdateCheckout']);