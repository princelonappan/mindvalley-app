
@extends('layouts.admin')

@section('content')
<h1>Create Category</h1>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'admin/category')) }}

<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'required' => 'required')) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Status') }}
    {{ Form::select('status', array( '1' => 'Active', '2' => 'Inactive'), Input::old('status'), array('class' => 'form-control')) }}
</div>

{{ Form::submit('Create the Category!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection
