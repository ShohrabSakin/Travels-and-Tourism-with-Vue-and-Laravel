<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    
    public function GetRooms()
    {
    $query = DB::select('select * from  rooms');
    echo json_encode($query);
    
      // http://localhost:8000/Rooms/getrooms
    
    }
    
    public function GetRoom()
    {
    $roomno=request()->query('roomno');//request()->query('EID'); //query string
    $query = DB::select("select * from  rooms where roomno='$roomno'");
    echo json_encode($query);
    
    // http://localhost:8000/Rooms/getrooms?roomno=R5
    
    }
    
    
    
    public function DeleteRooms()
    {
    $roomno=request()->query('roomno');//query string
    //echo "delete from employee where EID='$EID'";
    $query = DB::delete("delete from floors where roomno='$roomno'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
      // http://localhost:8000/Rooms/deleterooms.php?roomno=R5
    
    }
    
    
    public function InsertRooms()
    
    {  
        
        $roomno=request()->query('roomno');
        $floorid=request()->query('floorid');
        $title=request()->query('title');
        $price=request()->query('price');
        $picture=request()->query('picture');

    
    $query = DB::insert("insert into rooms(roomno,floorid,title,price,picture) values('$roomno','$floorid','$title','$price','$picture')");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Rooms/insertrooms.php?roomno=R1&floorid=F1&title=Super Delux&price=20000&picture=
    
    }
    
    
    public function UpdateRooms()
    {
    
        $roomno=request()->query('roomno');
        $floorid=request()->query('floorid');
        $title=request()->query('title');
        $price=request()->query('price');
        $picture=request()->query('picture');

      
    
    
    $query = DB::update("update rooms set roomno='$roomno',floorid='$floorid',title='$title',price='$price',picture='$picture' where roomno='$roomno'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Rooms/updaterooms.php?roomno=R1&floorid=F1&title=Super Delux&price=20000&picture=
    
    }
}
