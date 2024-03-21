@extends('layout/template2')
@section('content')
<h1>Create Students</h1>
{!! Form::open(['url'=>'students1'])!!}
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
{!!Form::submit('Save',['class'=>'btn btn-primary'])!!}
</div>
{!!Form::close()!!}
@stop
