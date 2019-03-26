@extends('layouts.admin')

@section('content')
            <h1>Article Details</h1>

            <!-- if there are creation errors, they will show here -->
            {{ HTML::ul($errors->all() )}}

            {{ Form::open(array('url' => '')) }}

            <div class="form-group">
                {{ Form::label('name', 'Title') }}
                {{ $article->title }}
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                <div class="container">
                    {!! $article->description !!}
                </div>

            </div>

            <div class="form-group">
                {{ Form::label('category', 'Category') }}
                {{ $article->category->name }}
            </div>
            <div class="form-group">
                {{ Form::label('category', 'Tags') }}
                <?php
                $tag = '';
                foreach ($article->articleTags as $tags)
                {
                    $tag .= $tags->tag->name . ', ';
                }
                echo rtrim($tag, ', ');
                ?>
            </div>
            <div class="form-group">
                {{ Form::label('Created By', 'Created By') }}
                {{ $article->user->name }}
            </div>
            <div class="form-group">
                {{ Form::label('Created Date ', 'Created Date') }}
                {{ $article->created_at }}
            </div>

            {{ Form::close() }}

        </div>
        <script>
$(document).ready(function () {
    $('#summernote').summernote();
    $(".chosen-select").chosen({
        no_results_text: "No tags found!"
    });
});
        </script>
        @endsection

