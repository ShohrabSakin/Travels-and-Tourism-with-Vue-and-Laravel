<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    
    public function GetCheckouts()
    {
    $query = DB::select('select * from checkout');
    echo json_encode($query);
    
      // http://localhost:8000/Checkout/getcheckouts
    
    }
    
    public function GetCheckout() 
    {
    $bookid=request()->query('bookid');//request()->query('EID'); //query string
    $query = DB::select("select * from checkout  where bookid='$bookid'");
    echo json_encode($query);
    
    // http://localhost:8000/Checkout/getcheckouts?bookid=B10
    
    }
    
    
    public function DeleteCheckout()
    {
    $bookid=request()->query('bookid');//query string
    //echo "delete from employee where EID='$EID'";
    $query = DB::delete("delete from checkout where bookid='$bookid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
      // http://localhost:8000/Checkout/deletecheckout?bookid=B3
    
    }
    
    
    public function InsertCheckout()
    
    {  
        $bookid=request()->query('bookid');
        $date=request()->query('date');
        $fromdate=request()->query('fromdate');
        $todate=request()->query('todate');
        $roomno=request()->query('roomno');
        $price=request()->query('price');
        
        $day=request()->query('day');
        $total=request()->query('total');
        $totalservice=request()->query('totalservice');
        $linetotal=request()->query('linetotal');
        $linediscount=request()->query('linediscount');
        $linenet=request()->query('linenet');
        $linepaid=request()->query('linepaid');
        $linedue=request()->query('linedue');


    
    $query = DB::insert("insert into checkout(bookid,date,fromdate,todate,roomno,price,day,total,totalservice,linetotal,linediscount,linenet,linepaid,linedue) values('$bookid','$date','$fromdate','$todate','$roomno','$price','$day','$total','$totalservice','$linetotal','$linediscount','$linenet','$linepaid','$linedue')");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Checkout/insertcheckout.php?bookid=B10&date=2023-06-05&fromdate=2023-02-02&todate=2023-03-03&roomno=R1&price=20000&day=1&total=100&totalservice=200&linetotal=300&linediscount=50&linenet=250&linepaid=260&linedue=400
    
    }
    
    
    public function UpdateCheckout()
    {
    
        $bookid=request()->query('bookid');
        $date=request()->query('date');
        $fromdate=request()->query('fromdate');
        $todate=request()->query('todate');
        $roomno=request()->query('roomno');
        $price=request()->query('price');
        
        $day=request()->query('day');
        $total=request()->query('total');
        $totalservice=request()->query('totalservice');
        $linetotal=request()->query('linetotal');
        $linediscount=request()->query('linediscount');
        $linenet=request()->query('linenet');
        $linepaid=request()->query('linepaid');
        $linedue=request()->query('linedue');


      
    
    
    $query = DB::update("update checkout  set bookid='$bookid',date='$date',fromdate='$fromdate',todate='$todate',roomno='$roomno',price='$price',day='$day',total='$total',totalservice='$totalservice',linetotal='$linetotal',linediscount='$linediscount',linenet='$linenet',linepaid ='$linepaid',linepaid ='$linedue'  where bookid='$bookid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Checkout/updatecheckout.php?bookid=B10&date=2023-06-05&fromdate=2023-02-02&todate=2023-03-03&roomno=R1&price=20000&day=1&total=100&totalservice=200&linetotal=300&linediscount=50&linenet=250&linepaid=260&linedue=400
    
    }
    
}
