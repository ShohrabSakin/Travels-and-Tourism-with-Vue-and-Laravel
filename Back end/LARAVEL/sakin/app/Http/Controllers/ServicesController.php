<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    
    public function GetServices()
    {
    $query = DB::select('select * from services');
    echo json_encode($query);
    
      //http://localhost:8000/Services/getservices
    
    }
    
    public function GetService()
    {
    $servid=request()->query('servid');//request()->query('EID'); //query string
    $query = DB::select("select * from services where servid='$servid'");
    echo json_encode($query);
    
    // http://localhost:8000/Services/getservices?servid=S6
    
    }
    
    
    
    public function DeleteServices()
    {
    $servid=request()->query('servid');//query string
    //echo "delete from employee where EID='$EID'";
    $query = DB::delete("delete from services where servid='$servid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
      //http://localhost:8000/Services/deleteservices.php?servid=S6
    
    }
    
    
    public function InsertServices()
    
    {  
        
        $servid=request()->query('servid');
        $servname=request()->query('servname');
        $picture=request()->query('picture');
    
    $query = DB::insert("insert into services(servid,servname,picture) values('$servid','$servname','$picture')");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Services/insertservices.php?servid=S1&servname=Luxury&picture
    
    }
    
    
    public function UpdateServices()
    {
    
        $servid=request()->query('servid');
        $servname=request()->query('servname');
        $picture=request()->query('picture');

    
    $query = DB::update("update services set servid='$servid',servname='$servname',picture='$picture' where servid='$servid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     //http://localhost:8000/Services/updateservicepayment.php?serviceid=S1&date=2023-01-01&roomno=R1&personid=P1&servicename=Hotel&price=20000
    
    }

}
