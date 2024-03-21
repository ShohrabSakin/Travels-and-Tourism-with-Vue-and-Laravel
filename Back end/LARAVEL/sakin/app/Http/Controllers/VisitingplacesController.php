<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class VisitingplacesController extends Controller
{
    
    public function GetVisitingplaces()
    {
    $query = DB::select('select * from visitingplaces');
    echo json_encode($query);
    
    //http://localhost:8000/Visitingplaces/getvisitingplaces
    
    }
    
    
    public function GetVisitingplace()
    {
    $visitid=request()->query('visitid');//request()->query('EID'); //query string
    $query = DB::select("select * from visitingplaces where visitid='$visitid'");
    echo json_encode($query);
    
     // http://localhost:8000/Visitingplaces/getvisitingplaces?visitid=V8
    
    }
    
    
    
    public function DeleteVisitingplaces()
    {
    
    $catid=request()->query('catid');//query string
    //echo "delete from employee where EID='$EID'";
    $query = DB::delete("delete from visitingplaces where catid='$catid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Visitingplaces/deletevisitingplaces?catid=C8
    
    }
    
    
    public function InsertVisitingplaces()
    
    {  
        
        $visitid=request()->query('visitid');
        $catid=request()->query('catid');
        $placename=request()->query('placename');
        $country=request()->query('country');
        $route=request()->query('route');
        $picture=request()->query('picture');
    
    
    
    $query = DB::insert("insert into visitingplaces values('$visitid','$catid','$placename','$country','$route','$picture')");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Visitingplaces/insertvisitingplaces?visitid=V1&catid=C6&placename=Sydney&country=Australia&route=By-Air&picture
    
    }
    
    public function UpdateVisitingplaces()
    {
    
        $visitid=request()->query('visitid');
        $catid=request()->query('catid');
        $placename=request()->query('placename');
        $country=request()->query('country');
        $route=request()->query('route');
        $picture=request()->query('picture');
    
    
    $query = DB::update("update visitingplaces set visitid='$visitid',catid='$catid',placename='$placename',country='$country',route='$route',picture='$picture'  where catid='$catid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Visitingplaces/updatevisitingplaces?visitid=V1&catid=C1&placename=Sydney&country=Australia&route=By-Air&picture
    
    }

}
