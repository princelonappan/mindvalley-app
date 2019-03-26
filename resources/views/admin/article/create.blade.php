@extends('layouts.admin')

@section('content')
<style>
    .chosen-container-multi {
        width: 100% !important;
    }
</style>
<h1>Create a Article</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'admin/article')) }}

<div class="form-group">
    {{ Form::label('name', 'Title') }}
    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
</div>

<!--<input name="sasa" data-validation="required">-->
<!--<textarea name="sss" class="summernote"></textarea>-->
<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control summernote')) }}
</div>

<div class="form-group">
    {{ Form::label('category', 'Category') }}
    {{ Form::select('category', $categories, NULL, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    <select data-placeholder="Select multiple tags" multiple class="chosen-select" name="tag[]" >
        <option value=""></option>
        @foreach($tags as $tag)   
        <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach   
    </select>
</div>

{{ Form::submit('Create the Article!', array('class' => 'btn btn-primary class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded"')) }}


<div class="form-group">
</div>
{{ Form::close() }}

<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 250
        });
        $(".chosen-select").chosen({
            no_results_text: "No tags found!",
            allow_single_deselect: true
        });
    });
</script>
@endsection

