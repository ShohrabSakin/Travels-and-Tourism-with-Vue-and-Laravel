@extends('layout.template2')<!-- html,head,body,div id="container" -->
@section('content')
<h1>Update Student</h1>
{!! Form::model($students1,['method'=>'PATCH','route'=>['students1.update',$students1->id]])!!}
<div class="form-group">
{!!Form::label('id','id:')!!}
{!!Form::text('id',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('name','name:')!!}
{!!Form::text('name',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('class','class:')!!}
{!!Form::text('class',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::submit('Update',['class'=>'btn btn-primary'])!!}
</div>
{!!Form::close()!!}
@stop
