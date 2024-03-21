<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class FloorsController extends Controller
{
    
    public function GetFloors()
    {
    $query = DB::select('select * from floors');
    echo json_encode($query);
    
      // http://localhost:8000/Floors/getfloors
    
    }
    
    public function GetFloor()
    {
    $id=request()->query('id');//request()->query('EID'); //query string
    $query = DB::select("select * from floors where id='$id'");
    echo json_encode($query);
    
    // http://localhost:8000/Floors/getfloors?id=F5
    
    }
    
    
    
    public function DeleteFloors()
    {
    $id=request()->query('id');//query string
    //echo "delete from employee where EID='$EID'";
    $query = DB::delete("delete from floors where id='$id'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
      // http://localhost:8000/Floors/deletefloors?id=F5
    
    }
    
    
    public function InsertFloors()
    
    {  
        
        $id=request()->query('id');
        $name=request()->query('name');

    
    $query = DB::insert("insert into floors(id,name) values('$id','$name')");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Floors/insertfloors.php?id=F1&name=1st-floor
    
    }
    
    
    public function UpdateFloors()
    {
    
        $id=request()->query('id');
        $name=request()->query('name');

      
    
    
    $query = DB::update("update floors set id='$id',name='$name' where id='$id'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Floors/updatefloors.php?id=F1&name=1st-floor
    
    }

}
