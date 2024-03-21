<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HotelsController extends Controller
{
    
    public function GetHotels()
    {
    $query = DB::select('select * from hotels');
    echo json_encode($query);
    
    // http://localhost:8000/Hotels/gethotels
    
    }
    
    
    public function GetHotel()
    {
    $hotelid=request()->query('hotelid');//request()->query('EID'); //query string
    $query = DB::select("select * from hotels where hotelid='$hotelid'");
    echo json_encode($query);
    
     // http://localhost:8000/Hotels/gethotels?hotelid=H8
    
    }
    
    public function GetHotels2()
    {
    $hotelname=request()->query('hotelname'); //query string
    $rating=request()->query('rating');
    $query = DB::select("select * from hotels where hotelname='$hotelname' and rating='$rating' order by hotelid");
    
    echo json_encode($query);
    
    // http://localhost:8080/Hotels/GetHotels2?hotelname=Radisson Blu&rating=5-Star
    
    }
   
    
    
    public function DeleteHotels()
    {
    
    $hotelid=request()->query('hotelid');//query string
    //echo "delete from employee where EID='$EID'";
    $query = DB::delete("delete from hotels where hotelid='$hotelid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Hotels/deletehotels?hotelid=H8
    
    }
    
    
    public function InsertHotels()
    
    {  
        
        $hotelid=request()->query('hotelid');
        
        $hotelname=request()->query('hotelname');
       $price=request()->query('price');
       $rating=request()->query('rating');
       $picture=request()->query('picture');
       
    
    
    
    $query = DB::insert("insert into hotels values('$hotelid','$hotelname','$price','$rating','$picture')");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Hotels/inserthotels?hotelid=H1&hotelname=Radisson&price=50000&rating=5-Star&picture
    
    }
    
    public function UpdateHotels()
    {
    
        $hotelid=request()->query('hotelid');
        
        $hotelname=request()->query('hotelname');
       $price=request()->query('price');
       $rating=request()->query('rating');
       $picture=request()->query('picture');
    
    
    $query = DB::update("update hotels set hotelid='$hotelid',hotelname='$hotelname',price='$price',rating='$rating',picture='$picture' where hotelid='$hotelid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Hotels/updatehotels?hotelid=H1&hotelname=Radisson&price=50000&rating=5-Star&picture
    
    }

}
