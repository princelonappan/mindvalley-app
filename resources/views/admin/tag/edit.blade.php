@extends('layouts.admin')

@section('content')
<h1>Edit Tag</h1>
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($tag, array('route' => array('tag.update', $tag->id), 'method' => 'PUT')) }}

<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'required' => 'required')) }}
</div>

{{ Form::submit('Edit the Tag!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection