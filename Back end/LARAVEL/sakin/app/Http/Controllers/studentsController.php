<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\students;

class studentsController extends Controller
{
    public function index() {
        $student = students::all(); //select * from students
        return view('students.index')->with('st', $student); //$this->load->view("students/index",$data)
        //echo $student;
        }
        public function show($pk) //Read
        {
        }
        public function edit($pk) {
        }
        public function update(Request $request, $pk) {
        }
        public function destroy($id) {
        }
        public function create($id) {
        }
        public function store(Request $request) {
        }
        
}
