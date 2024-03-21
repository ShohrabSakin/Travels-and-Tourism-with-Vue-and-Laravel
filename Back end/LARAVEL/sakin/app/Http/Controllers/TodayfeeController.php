<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TodayfeeController extends Controller
{
    
    // public function GetTodayfees()
    // {
    // $query = DB::select('select * from packages');
    // echo json_encode($query);
    
    // // http://localhost:8000/Todayfee/getpackages
    
    // }
    
    
    public function GetTodayfees()
    {
    $today=request()->query('today');//request()->query('EID'); //query string
    $query = DB::select("select * from feecollection where date='$today'");
    echo json_encode($query);
    
     // http://localhost:8000/Todayfee/gettodayfees?pkgid=P9
    
    }
    
  
   
    public function DeleteTodayfee()
    {
    
    $collectionid=request()->query('collectionid');//query string
    //echo "delete from employee where EID='$EID'";
    $query = DB::delete("delete from todayfee where collectionid='$collectionid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Todayfee/deletetodayfee?collectionid=C5
    
    }
    
    
    public function InsertTodayfee()
    
    {  
        
        $collectionid=request()->query('collectionid');
        $date=request()->query('date');
        // $date=date('Y-m-d');
        $bookid=request()->query('bookid');
        $Name=request()->query('Name');
        $amount=request()->query('amount');
       
    
    
    
    $query = DB::insert("insert into todayfee values('$collectionid','$date','$bookid','$Name','$amount')");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Todayfee/inserttodayfee?collectionid=C1&date=2023-05-09&bookid=B1&Name=Rahim&amount=50000
    
    }
    
    public function UpdateTodayfee()
    {
    
        $collectionid=request()->query('collectionid');
        $date=request()->query('date');
        // $date=date('Y-m-d');
        $bookid=request()->query('bookid');
        $Name=request()->query('Name');
        $amount=request()->query('amount');
    
    
    $query = DB::update("update todayfee set collectionid='$collectionid',date='$date',bookid='$bookid',Name='$Name',amount='$amount' where collectionid='$collectionid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Todayfee/updatetodayfee?collectionid=C5&date=2023-05-13&bookid=B5&Name=Rahat&amount=15000
    
    }


}
