<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PackagesController extends Controller
{
    
    public function GetPackages()
    {
    $query = DB::select('select * from packages');
    echo json_encode($query);
    
    // http://localhost:8000/Packages/getpackages
    
    }
    
    
    public function GetPackage()
    {
    $pkgid=request()->query('pkgid');//request()->query('EID'); //query string
    $query = DB::select("select * from packages where pkgid='$pkgid'");
    echo json_encode($query);
    
     // http://localhost:8000/Packages/getpackages?pkgid=P9
    
    }
    
    public function GetService2()
    {
    $fromwhere=request()->query('fromwhere'); //query string
    $towhere=request()->query('towhere');
    $fromdate=request()->query('fromdate');
    $todate=request()->query('todate');
    $query = DB::select("select * from packages where fromwhere='$fromwhere' and towhere='$towhere' and fromdate>='$fromdate' and todate<='$todate' order by pkgid");
    
    echo json_encode($query);
    
    // http://localhost:8080/Packages/GetService2?fromwhere=Paris&towhere=London&fromdate=2023-05-09&todate=2023-06-02
    
    }
   
    
    
    public function DeletePackages()
    {
    
    $pkgid=request()->query('pkgid');//query string
    //echo "delete from employee where EID='$EID'";
    $query = DB::delete("delete from packages where pkgid='$pkgid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Packages/deletepackages?pkgid=P9
    
    }
    
    
    public function InsertPackages()
    
    {  
        
        $pkgid=request()->query('pkgid');
    $pkgname=request()->query('pkgname');
    $destination=request()->query('destination');
    $duration=request()->query('duration');
    $price=request()->query('price');
    $picture=request()->query('picture');
    $type=request()->query('type');
    $fromwhere=request()->query('fromwhere');
    $towhere=request()->query('towhere');
    $fromdate=request()->query('fromdate');
    $todate=request()->query('todate');
       
    
    
    
    $query = DB::insert("insert into packages values('$pkgid','$pkgname','$destination','$duration','$price','$picture','$type','$fromwhere','$towhere','$fromdate','$todate')");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Packages/insertpackages?pkgid=P1&pkgname=Adventure&destination=Spain&duration=3-Days&price=1000&picture&type=Seasonal&fromwhere=Paris&towhere=London&fromdate=2023-05-09&todate=2023-06-02
    
    }
    
    public function UpdatePackages()
    {
    
        $pkgid=request()->query('pkgid');
        $pkgname=request()->query('pkgname');
        $destination=request()->query('destination');
        $duration=request()->query('duration');
        $price=request()->query('price');
        $picture=request()->query('picture');
        $type=request()->query('type');
        $fromwhere=request()->query('fromwhere');
        $towhere=request()->query('towhere');
        $fromdate=request()->query('fromdate');
        $todate=request()->query('todate');
    
    
    $query = DB::update("update packages set pkgid='$pkgid',pkgname='$pkgname',destination='$destination',duration='$duration',price='$price',picture='$picture',type='$type',fromwhere='$fromwhere',towhere='$towhere' ,fromdate='$fromdate',todate='$todate' where pkgid='$pkgid'");
    if(!empty($query))
    $result["success"]="true";
    else
    {
    $result["success"]="false";
    }
    echo json_encode($result);
    
     // http://localhost:8000/Packages/updatepackages?pkgid=P1&pkgname=Adventure&destination=Spain&duration=3-Days&price=1000&picture&type=Seasonal&fromwhere=Paris&towhere=London&fromdate=2023-05-09&todate=2023-06-02
    
    }

}
