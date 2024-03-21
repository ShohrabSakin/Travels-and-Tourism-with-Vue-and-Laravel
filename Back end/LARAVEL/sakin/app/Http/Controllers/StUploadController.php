<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use App\Models\students1;


class StUploadController extends Controller
{
        //view to browse the file
    public function edit($id)
    {
    $student=students1::find($id);
    return view('StUpload.edit',compact('student'));
    }
    //Upload: Upload Button Work
    public function update(Request $request, $id)
    {
    request()->validate([
    'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
    ]);
    $path = 'uploads/'.$id;
    if(!file_exists($path)) File::makeDirectory($path);
    $imageName =request()->picture->getClientOriginalName();
    request()->picture->move($path, $imageName);
    $a1 = students1::where('id', $id)->first();
    $a1->picture = request()->picture->getClientOriginalName();
    $a1->save();
    //3upper 3 lines action: update students1 set picture=.... where id=...
    return redirect('students1');
    }

}
