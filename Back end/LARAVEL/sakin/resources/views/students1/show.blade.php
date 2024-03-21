@extends('layout/template2')
@section('content')
<h1>Student Fees Show</h1>
<form class="form-horizontal">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Name</label>
<div class="col-sm-10">
<input type="text" id="name" class="form-control" placeholder="{{$student1->name}}" readonly="readonly">
</div>
</div>
<div class="form-group">
<label for="class" class="col-sm-2 control-label">Class</label>
<div class="col-sm-10">
<input type="text" id="class" class="form-control" placeholder="{{$student1->class}}" readonly="readonly">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<a href="{{url('students1')}}" class="btn btn-primary">Back</a>
</div>
</div>
</form>
@stop
