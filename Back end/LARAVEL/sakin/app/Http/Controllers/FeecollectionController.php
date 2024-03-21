<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class FeecollectionController extends Controller
{
    
    public function GetFeecollections()
{
$query = DB::select('select * from feecollection');
echo json_encode($query);

//http://localhost:8000/Feecollection/getfeecollections

}


public function GetFeecollection()
{
$collectionid=request()->query('collectionid');//request()->query('EID'); //query string
$query = DB::select("select * from feecollection where collectionid='$collectionid'");
echo json_encode($query);

 // http://localhost:8000/Feecollection/getfeecollections?collectionid=C1

}


public function DeleteFeecollection()
{

$collectionid=request()->query('collectionid');//query string
//echo "delete from employee where EID='$EID'";
$query = DB::delete("delete from feecollection where collectionid='$collectionid'");
if(!empty($query))
$result["success"]="true";
else
{
$result["success"]="false";
}
echo json_encode($result);

 // http://localhost:8000/Feecollection/deletefeecollection?collectionid=C5

}


public function InsertFeecollection()

{  
    
    $bookingdate=request()->query('bookingdate');
    $date=date('Y-m-d');
// $collectionid=request()->query('collectionid');
$bookid=request()->query('bookid');
$Name=request()->query('Name');
$amount=request()->query('amount');



$query = DB::insert("insert into feecollection values((select uuid()),'$bookingdate','$date','$bookid','$Name','$amount')");
if(!empty($query))
$result["success"]="true";
else
{
$result["success"]="false";
}
echo json_encode($result);

 // http://localhost:8000/Feecollection/insertfeecollection?collectionid=C1&date=2023-05-09&bookid=B1&Name=Rahim&amount=50000

}

public function UpdateFeecollection()
{

    $bookingdate=request()->query('bookingdate');
    $date=date('Y-m-d');
// $collectionid=request()->query('collectionid');
$bookid=request()->query('bookid');
$Name=request()->query('Name');
$amount=request()->query('amount');


$query = DB::update("update feecollection set collectionid='$collectionid',bookingdate='$bookingdate',date='$date',bookid='$bookid',Name='$Name',amount='$amount' where collectionid='$collectionid'");
if(!empty($query))
$result["success"]="true";
else
{
$result["success"]="false";
}
echo json_encode($result);

 // http://localhost:8000/Feecollection/updatefeecollection?collectionid=C5&date=2023-05-13&bookid=B5&Name=Rahat&amount=15000

}

}
