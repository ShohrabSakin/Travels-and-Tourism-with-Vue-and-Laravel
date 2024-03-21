<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function GetBookings()
{
$query = DB::select('select * from booking');
echo json_encode($query);

  //http://localhost:8000/Booking/getbookings

}

public function GetBooking()
{
$bookid=request()->query('bookid');//request()->query('EID'); //query string
$query = DB::select("select * from booking where bookid='$bookid'");
echo json_encode($query);

// http://localhost:8000/Booking/getbookings?bookid=B3

}


public function SearchBooking()
{
$d1=request()->query('d1'); //query string
$d2=request()->query('d2');

$query = DB::select("select * from booking where date between '$d1' and '$d2'");
echo json_encode($query);

 // http://localhost:8080/Booking/SearchBooking?

}



public function DeleteBooking()
{
$bookid=request()->query('bookid');//query string
//echo "delete from employee where EID='$EID'";
$query = DB::delete("delete from booking where bookid='$bookid'");
if(!empty($query))
$result["success"]="true";
else
{
$result["success"]="false";
}
echo json_encode($result);

  //http://localhost:8000/Booking/deletebooking?bookid=B3

}


public function InsertBooking()

{  
    
    $bookid=request()->query('bookid');
    $pkgid=request()->query('pkgid');
    $type=request()->query('type');
    $Name=request()->query('Name');
    $Number=request()->query('Number');
    $NID=request()->query('NID');
    $chooseGuests=request()->query('chooseGuests');
    $date=request()->query('date');
    $chooseDestination=request()->query('chooseDestination');

$query = DB::insert("insert into booking(bookid,pkgid,type,Name,Number,NID,chooseGuests,date,chooseDestination) values((SELECT uuid()),'$pkgid','$type','$Name','$Number','$NID','$chooseGuests','$date','$chooseDestination')");
if(!empty($query))
$result["success"]="true";
else
{
$result["success"]="false";
}
echo json_encode($result);

 //http://localhost:8000/Booking/insertbooking?bookid=B1&pkgid=P1&type=Personal&Name=Abir&Number=0791756441&NID=N1&chooseGuests=3&date=2023-09-05&chooseDestination=Switzerland

}


public function UpdateBooking()
{

    $bookid=request()->query('bookid');
    $pkgid=request()->query('pkgid');
    $type=request()->query('type');
    $Name=request()->query('Name');
    $Number=request()->query('Number');
    $NID=request()->query('NID');
    $chooseGuests=request()->query('chooseGuests');
    $date=request()->query('date');
    $chooseDestination=request()->query('chooseDestination');


$query = DB::update("update booking set bookid='$bookid',pkgid='$pkgid',type='$type',Name='$Name',Number='$Number',NID='$NID',chooseGuests='$chooseGuests',date='$date',chooseDestination='$chooseDestination'  where bookid='$bookid'");
if(!empty($query))
$result["success"]="true";
else
{
$result["success"]="false";
}
echo json_encode($result);

 //http://localhost:8000/Booking/updatebooking?bookid=B1&pkgid=P1&type=Personal&Name=Abir&Number=0791756441&NID=N1&chooseGuests=3&date=2023-09-05&chooseDestination=Switzerland

}

}
