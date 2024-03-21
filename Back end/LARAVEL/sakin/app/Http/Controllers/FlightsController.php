<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class FlightsController extends Controller
{
    
        
    public function GetFlights()
{
$query = DB::select('select * from flights');
echo json_encode($query);

//http://localhost:8000/Flights/getflights

}


public function GetFlight()
{
$flightid=request()->query('flightid');//request()->query('EID'); //query string
$query = DB::select("select * from flights where flightid='$flightid'");
echo json_encode($query);

 // http://localhost:8000/Flights/getflights?flightid=F10

}


public function GetFlights2()
    {
    $fromwhere=request()->query('fromwhere'); //query string
    $towhere=request()->query('towhere');
    $fromdate=request()->query('fromdate');
    $todate=request()->query('todate');
    $query = DB::select("select * from flights where fromwhere='$fromwhere' and towhere='$towhere' and fromdate>='$fromdate' and todate<='$todate' order by flightid");
  
    echo json_encode($query);
    
    // http://localhost:8000/Flights/GetFlights2?fromwhere=Paris&towhere=London&fromdate=2023-05-09&todate=2023-06-02
    
    }


public function DeleteFlights()
{

$flightid=request()->query('flightid');//query string
//echo "delete from employee where EID='$EID'";
$query = DB::delete("delete from flights where flightid='$flightid'");
if(!empty($query))
$result["success"]="true";
else
{
$result["success"]="false";
}
echo json_encode($result);

 // http://localhost:8000/Flights/deleteflights?flightid=F10

}


public function InsertFlights()

{  
    
    $flightid=request()->query('flightid');
    
    $fromwhere=request()->query('fromwhere');
   $towhere=request()->query('towhere');
   $fromdate=request()->query('fromdate');
   $todate=request()->query('todate');
   $price=request()->query('price');



$query = DB::insert("insert into flights values('$flightid','$fromwhere','$towhere','$fromdate','$todate','$price')");
if(!empty($query))
$result["success"]="true";
else
{
$result["success"]="false";
}
echo json_encode($result);

 // http://localhost:8000/Flights/insertflights?flightid=F1&fromwhere=Paris&towhere=London&fromdate=2023-05-09&todate=2023-06-02&price=20000

}

public function UpdateFlights()
{

    $flightid=request()->query('flightid');
    
    $fromwhere=request()->query('fromwhere');
   $towhere=request()->query('towhere');
   $fromdate=request()->query('fromdate');
   $todate=request()->query('todate');
   $price=request()->query('price');


$query = DB::update("update flights set flightid='$flightid',fromwhere='$fromwhere',towhere='$towhere',fromdate='$fromdate',todate='$todate',price='$price' where flightid='$flightid'");
if(!empty($query))
$result["success"]="true";
else
{
$result["success"]="false";
}
echo json_encode($result);

 // http://localhost:8000/Flights/updateflights?flightid=F1&fromwhere=Paris&towhere=London&fromdate=2023-05-09&todate=2023-06-02&price=20000

}

}
