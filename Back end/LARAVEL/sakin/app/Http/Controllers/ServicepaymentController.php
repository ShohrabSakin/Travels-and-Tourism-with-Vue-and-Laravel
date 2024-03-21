<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ServicepaymentController extends Controller
{
    
    public function GetServicepayments()
    {
    $query = DB::select('select * from servicepayment');
    echo json_encode($query);
    
      // http://localhost:8000/Servicepayment/getservicepayments
    
    }
    
    public function GetServicepayment() //  Sir change for check-out work //
    {
    $bookingid=request()->query('bookingid');//request()->query('EID'); //query string
    $query = DB::select("select * from servicepayment where bookid='$bookingid'");
    echo json_encode($query);
    
    // http://localhost:8000/Servicepayment/getservicepayment?serviceid=S5
    
    }
    
    public function GetBookid()  // <--  Dropdown Code  ----> // 
    {
    $bookid=request()->query('bookid');//request()->query('EID'); //query string
    $query = DB::select("select bookid from hotelbooking");
    echo json_encode($query);
    
    // http://localhost:8000/Servicepayment/gethotelbookid
    
    }


    public function Getrecordsfrombookid() // <-- --- Left div change [ Registration ID, Room No ] ----> //
    {
    $bookid=request()->query('bookid'); //query string
    $query = DB::select("select * from hotelbooking where bookid='$bookid' limit 1");

     echo json_encode($query);

       // http://localhost:8000/Servicepayment/getrecordsfrombookid
    }


    public function GetServicename()  // <--  Dropdown Code  ----> // 
    {
    $servname=request()->query('servname');//request()->query('EID'); //query string
    $query = DB::select("select servname from services");
    echo json_encode($query);
    
    // http://localhost:8000/Servicepayment/gethotelbookid
    
    }

    
    public function DeleteServicepayment()
    {
    $serviceid=request()->query('serviceid');//query string
    //echo "delete from employee where EID='$EID'";
    $query = DB::delete("delete from servicepayment where serviceid='$serviceid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
      // http://localhost:8000/Servicepayment/deleteservicepayment?serviceid=S5
    
    }
    
    
    public function InsertServicepayment()
    
    {  
        
        $serviceid=request()->query('serviceid');
        $date=request()->query('date');
        $bookid=request()->query('bookid');
        $regid=request()->query('regid');
        $roomno=request()->query('roomno');
        $servicename=request()->query('servicename');
        $price=request()->query('price');

    
    $query = DB::insert("insert into servicepayment(serviceid,date,bookid,regid,roomno,servicename,price) values('$serviceid','$date','$bookid','$regid','$roomno','$servicename','$price')");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Servicepayment/insertservicepayment.php?serviceid=S1&date=2023-01-01&bookid=B1&regid=R1&roomno=R1&servicename=Hotel&price=20000
    
    }
    
    
    public function UpdateServicepayment()
    {
    
      $serviceid=request()->query('serviceid');
        $date=request()->query('date');
        $bookid=request()->query('bookid');
        $regid=request()->query('regid');
        $roomno=request()->query('roomno');
        $servicename=request()->query('servicename');
        $price=request()->query('price');

      
    
    
    $query = DB::update("update servicepayment set serviceid='$serviceid',date='$date',bookid='$bookid',regid='$regid',roomno='$roomno',servicename='$servicename',price='$price' where serviceid='$serviceid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Servicepayment/updateservicepayment.php?serviceid=S1&date=2023-01-01&bookid=B1&regid=R1&roomno=R1&servicename=Hotel&price=20000
    
    }
    
}
