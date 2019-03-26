
@extends('layouts.admin')

@section('content')
<h1>All the Tags</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table id="tag_table" class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach($tags as $key => $value)
        <tr>
            <td>1</td>
            <td>{{ $value->name }}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('/admin/tag/' . $value->id . '/edit') }}">Edit this Tag</a>
            </td>
            <td>
                {{ Form::open(array('url' => '/admin/tag/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete this Tag', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
                        <script>
$(document).ready(function () {
    $('#tag_table').DataTable();
});
        </script>
@endsection