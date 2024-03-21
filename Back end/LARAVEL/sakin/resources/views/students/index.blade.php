<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>All Students</title>
<!-- <script src="{!! asset('assets/js/bootstrap.min.js') !!}" type="text/javascript"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="{!! asset('assets/js/jquery.3.2.1.min.js') !!}" type="text/javascript">
</script>
<!-- <link href="{!! asset('assets/css/bootstrap.min.css') !!}" rel="stylesheet"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h1>Students List</h1>
<a href="{{url('/students/create')}}" class="btn btn-success">Create Student</a>
<hr>
<table class="table table-striped table-bordered table-hover">
<thead>
<tr class="bg-info">
<th>ID</th>
<th>Students Name</th>
<th>Class</th>

<th colspan="3">Actions</th>
</tr>
</thead>
<tbody>
@foreach ($st as $student)
<tr>
<td>{{ $student->id }}</td>
<td>{{ $student->name }}</td>
<td>{{ $student->class }}</td>
<td><a href="{{url('students',$student->id)}}" class="btn btn-primary">Read</a></td>
<td><a href="{{route('students.edit',$student->id)}}" class="btn btn-warning">Update</a></td>
<td>
{!! Form::open(['method' => 'DELETE', 'route' => ['students.destroy', $student->id]]) !!}
{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
{!! Form::close() !!}
</td>
</tr>
@endforeach
</tbody>
</table>
</body>
</html>
