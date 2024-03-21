<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    
    public function GetCategorys()
    {
    $query = DB::select('select * from category');
    echo json_encode($query);
    
    //http://localhost:8000/Category/getflights
    
    }
    
    
    public function GetCategory()
    {
    $catid=request()->query('catid');//request()->query('EID'); //query string
    $query = DB::select("select * from category where catid='$catid'");
    echo json_encode($query);
    
     // http://localhost:8000/Category/getflights?flightid=F10
    
    }
    

    
    public function DeleteCategory()
    {
    
    $catid=request()->query('catid');//query string
    //echo "delete from employee where EID='$EID'";
    $query = DB::delete("delete from category where catid='$catid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Category/deleteflights?flightid=F10
    
    }
    
    
    public function InsertCategory()
    
    {  
        
        $catid=request()->query('catid');
        $catname=request()->query('catname');
        $picture=request()->query('picture');
    
    
    
    $query = DB::insert("insert into category values('$catid','$catname','$picture')");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Category/insertflights?flightid=F1&fromwhere=Paris&towhere=London&fromdate=2023-05-09&todate=2023-06-02&price=20000
    
    }
    
    public function UpdateCategory()
    {
    
        $catid=request()->query('catid');
        $catname=request()->query('catname');
        $picture=request()->query('picture');
    
    
    $query = DB::update("update category set catid='$catid',catname='$catname',picture='$picture'  where catid='$catid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Category/updateflights?flightid=F1&fromwhere=Paris&towhere=London&fromdate=2023-05-09&todate=2023-06-02&price=20000
    
    }

}
