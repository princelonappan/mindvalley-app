@extends('layouts.admin')

@section('content')
<h1>Edit Category</h1>
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($category, array('route' => array('category.update', $category->id), 'method' => 'PUT')) }}

<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'required' => 'required')) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Status') }}
    {{ Form::select('status', array( '1' => 'Active', '2' => 'Inactive'), $category->status, array('class' => 'form-control')) }}
</div>

{{ Form::submit('Edit the Category!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection