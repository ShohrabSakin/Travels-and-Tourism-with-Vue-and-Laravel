@extends('layout/template2')<!-- THis page is same as edit page -->
@section('content')
<h1>Update Student</h1>
{!! Form::model($student,['method'=>'PATCH','route'=>['StUpload.update',$student->id],'files'=>true])!!}
<div class="form-group">
{!!Form::label('id','id:')!!}
{!!Form::text('id',null,['class'=>'form-control', 'readonly'=>'readonly'])!!}
</div>
<div class="form-group">
{!!Form::label('name','name:')!!}
{!!Form::text('name',null,['class'=>'form-control', 'readonly'=>'readonly'])!!}
</div>
<div class="form-group">
{!!Form::label('class','class:')!!}
{!!Form::text('class',null,['class'=>'form-control', 'readonly'=>'readonly'])!!}
<!-- <input type="text" class="form-control" readonly="readonly"/> -->
</div>
<div class="form-group">
{!!Form::label('picture','picture:')!!}
@if($student->picture =='')
<img src='{{url("/")}}/uploads/images.jpg' class='img-responsive' width='100%'/>
@else
<img src='{{url("/")}}/uploads/{{$student->id}}/{{$student->picture}}' class='img-responsive' width='100%'/>
@endif
{!! Form::file('picture', ['class' => 'form-control', 'readonly'=>'readonly']) !!}
</div>
<div class="form-group">
{!!Form::submit('Update',['class'=>'btn btn-primary'])!!}
</div>
{!!Form::close()!!}
@stop
