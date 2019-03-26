
@extends('layouts.admin')

@section('content')

<h1>Create Tag</h1>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'admin/tag')) }}

<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'required' => 'required')) }}
</div>

{{ Form::submit('Create the Tag!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection
