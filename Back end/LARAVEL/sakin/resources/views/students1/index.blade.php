@extends('layout/template2')
@section('content')
<h1>Students List</h1>
<a href="{{url('/students1/create')}}" class="btn btn-success">Create Student</a>| 
<hr>
<table class="table table-striped table-bordered table-hover">
<thead>
<tr class="bg-info">
<th>ID</th>
<th>Students Name</th>
<th>Class</th>
<th>Picture</th>
<th colspan="3">Actions</th>
</tr>
</thead>
<tbody>
@foreach ($st as $student)
<!-- st came from students1controller -->
<tr>
<td>{{ $student->id }}</td>
<td>{{ $student->name }}</td>
<td>{{ $student->class }}</td>
@if($student->picture =='')
<td><img src='uploads/x.jpg' class='img-responsive' width='100%'/>
<div class="text-center"><a href="{{route('StUpload.edit',$student->id)}}" class="btn btn-primary">Upload Picture</a></div>
</td>
@else
<td><img src='uploads/{{$student->id}}/{{$student->picture}}' class='img-responsive' width='100%'/>
<div class="text-center"><a href="{{route('StUpload.edit',$student->id)}}" class="btn btn-primary">Change Picture</a></div></td>
@endif
<td><a href="{{url('students1',$student->id)}}" class="btn btn-primary">Read <!-- students.show --></a></td>
<td><a href="{{route('students1.edit',$student->id)}}" class="btn btn-warning">Update</a></td>
<td>
{!! Form::open(['method' => 'DELETE', 'route' => ['students1.destroy', $student->id]]) !!}
{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
{!! Form::close() !!}
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
