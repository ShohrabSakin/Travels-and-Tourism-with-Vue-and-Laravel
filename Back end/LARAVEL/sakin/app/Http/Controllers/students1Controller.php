<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\students1;
use Request;


class students1Controller extends Controller
{
    public function index() {
        $student1=students1::all();//select * from students
        return view('students1.index')->with('st',$student1);//students1 is the folder and index.blade.php is the view.
        //st variable will convey $students to the view for @foreach(st as ...)
        }
        //shows one record
        public function show($pk) //Read
        {
        $student1=students1::where('id', '=', $pk)->first();//select * from students where id=$pk limit 1
        return view('students1.show',compact('student1'));//students1 is the folder and show.blade.php is the view.
        //show is completely as like as index, with and compact are alternatives to each other, in case of compact two variables are the same, alias name is supported in with, example: st
        }
        //update: to show for edit the record
        public function edit($id) {
        $students1=students1::find($id);//students1::where('id', '=', $pk)->first();
        return view('students1.edit',compact('students1'));
        //edit is completely as like as show
        }
        //update: edit function to edit the record(Edit Button)
        public function update(Request $request, $id) {
        $studentUpdate=Request::all();
        $student=students1::find($id);
        $student->update($studentUpdate);//update students set name=$name,class=$class where id=$id
        return redirect('students1');//alternative of retirn view
        }
        //delete
        public function destroy($id) {
        students1::find($id)->delete();//delete from students where id=$id
        return redirect('students1');//index is optional in loading view line
        }
        //insert: show view to insert record
        public function create() {
        return view('students1.create');
        }
        //insert: operation(Create Button)
        public function store(Request $request) {
        $s=Request::all();//$request::all={'id':'AC-004','name':'shamsul','class':'eight'}
        students1::create($s);//insert into students set id='AC-004',name='Shamsul',class='Eight'
        return redirect('students1');
        }
        
}
