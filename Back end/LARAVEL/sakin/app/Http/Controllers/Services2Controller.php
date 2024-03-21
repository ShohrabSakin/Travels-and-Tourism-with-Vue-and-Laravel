<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Services2Controller extends Controller
{
    
    public function GetServices2()
    {
    $query = DB::select('select * from services2');
    echo json_encode($query);
    
      //http://localhost:8000/Services2/getServices2
    
    }
    
    public function GetService2()
    {
    $id=request()->query('id');//request()->query('EID'); //query string
    $query = DB::select("select * from services2 where id='$id'");
    echo json_encode($query);
    
    // http://localhost:8000/Services2/getServices2?id=S5
    
    }
    
    
    public function DeleteServices2()
    {
    $id=request()->query('id');//query string
    //echo "delete from employee where EID='$EID'";
    $query = DB::delete("delete from services2 where id='$id'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
      //http://localhost:8000/Services2/deleteServices2.php?id=S5
    
    }
    
    
    public function InsertServices2()
    
    {  
        
        $id=request()->query('id');
        $name=request()->query('name');
        $description=request()->query('description');
        $price=request()->query('price');

    
    $query = DB::insert("insert into services2(id,name,description,price) values('$id','$name','$description','$price')");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Services2/insertServices2.php?id=S1&name=Hotels&description=Luxury-Hotels&price=20000
    
    }
    
    
    public function UpdateServices2()
    {
    
        $id=request()->query('id');
        $name=request()->query('name');
        $description=request()->query('description');
        $price=request()->query('price');

    
    $query = DB::update("update services2 set id='$id',name='$name',description='$description',price='$price' where id='$id'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     //http://localhost:8000/Services2/updateServices2.php?id=S1&name=Hotels&description=Luxury-Hotels&price=20000
    
    }

}
