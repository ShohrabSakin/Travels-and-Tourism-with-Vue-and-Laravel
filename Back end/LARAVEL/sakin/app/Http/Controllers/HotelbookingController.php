<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HotelbookingController extends Controller
{
    
    public function GetHotelbookings()
    {
    $query = DB::select('select * from hotelbooking');
    echo json_encode($query);
    
      // http://localhost:8000/Hotelbooking/gethotelbookings
    
    }
    
    public function GetHotelbooking()
    {
    $bookid=request()->query('bookid');//request()->query('EID'); //query string
    $query = DB::select("select * from hotelbooking where bookid='$bookid'");
    echo json_encode($query);
    
    // http://localhost:8000/Hotelbooking/gethotelbooking?bookid=B3
    
    }
    
    
    public function DeleteHotelbooking()
    {
    $bookid=request()->query('bookid');//query string
    //echo "delete from employee where EID='$EID'";
    $query = DB::delete("delete from hotelbooking where bookid='$bookid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
      // http://localhost:8000/Hotelbooking/deletehotelbooking.php?bookid=B3
    
    }
    
    
    public function InsertHotelbooking()
    
    {  
        
        $bookid=request()->query('bookid');
        $date=request()->query('date');
        $fromdate=request()->query('fromdate');
        $todate=request()->query('todate');
        $name=request()->query('name');
        $guardian=request()->query('guardian');
        $nid=request()->query('nid');
        $address=request()->query('address');
        $mobile=request()->query('mobile');
        $roomno=request()->query('roomno');
        $regid=request()->query('regid');
        $picture=request()->query('picture');

    
    $query = DB::insert("insert into hotelbooking(bookid,date,fromdate,todate,name,guardian,nid,address,mobile,roomno,regid,picture) values('$bookid','$date','$fromdate','$todate','$name','$guardian','$nid','$address','$mobile','$roomno','$regid','$picture')");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Hotelbooking/inserthotelbooking.php?bookid=B1&date=2023-06-05&fromdate=2023-02-02&todate=2023-03-03&name=Ahil&guardian=3&nid=3&address=Chittagong&mobile=012&roomno=R1&regid=R1&picture
    
    }
    
    
    public function UpdateHotelbooking()
    {
    
      $bookid=request()->query('bookid');
      $date=request()->query('date');
      $fromdate=request()->query('fromdate');
      $todate=request()->query('todate');
      $name=request()->query('name');
      $guardian=request()->query('guardian');
      $nid=request()->query('nid');
      $address=request()->query('address');
      $mobile=request()->query('mobile');
      $roomno=request()->query('roomno');
      $regid=request()->query('regid');
      $picture=request()->query('picture');

    
    $query = DB::update("update hotelbooking set bookid='$bookid',date='$date',fromdate='$fromdate',todate='$todate',name='$name',guardian='$guardian',nid='$nid',address='$address',mobile='$mobile',roomno='$roomno',regid='$regid',picture='$picture'  where bookid='$bookid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Hotelbooking/updatehotelbooking.php?bookid=B1&date=2023-06-05&fromdate=2023-02-02&todate=2023-03-03&name=Ahil&guardian=3&nid=3&address=Chittagong&mobile=012&roomno=R1&regid=R1&picture
    
    }

}
