
@extends('layouts.admin')

@section('content')
<h1>Edit Article</h1>
        <style>
            .chosen-container-multi {
                width: 100% !important;
            }
        </style>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::model($article, array('route' => array('article.update', $article->id), 'method' => 'PUT')) }}

<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, array('class' => 'form-control', 'required' => 'required')) }}
</div>
<!--<textarea name="sss" class="summernote"></textarea>-->
<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', NULL, array('class' => 'form-control summernote', 'required' => 'required')) }}
</div>

<div class="form-group">
    {{ Form::label('category', 'Category') }}
    {{ Form::select('category', $categories, NULL, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    <select data-placeholder="Select multiple tags" multiple class="chosen-select" name="tag[]" required>
        <option value=""></option>
        @foreach($tags as $tag)   
        <option value="{{$tag->id}}" <?php echo (in_array($tag->id, $selected_tag)) ? 'selected=""' : ''; ?>>{{$tag->name}}</option>
        @endforeach   
    </select>
</div>

{{ Form::submit('Update the Article!', array('class' => 'btn btn-primary')) }}


<div class="form-group">

</div>
{{ Form::close() }}

<script>
    $(document).ready(function () {
        $('.summernote').summernote({
        height: 250
    });
                var content = {!! json_encode($article->description) !!};
        $('.summernote').summernote('code', content);
        $(".chosen-select").chosen({
            no_results_text: "No tags found!"
        });
    });
</script>
        @endsection

