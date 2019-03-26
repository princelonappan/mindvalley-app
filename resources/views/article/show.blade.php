
@extends('layouts.home')
@section('content')
<!-- CONTENT -->
<section class="s-12 m-8 l-9 xl-10">                                    
    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav">
        <ul>
            <li><a href="#"><?php (isset($article->category)) ? $article->category->name : ''; ?></a></li>
        </ul>
    </nav>
    <!-- Pruducts -->
    <div class="margin2x">
        <div class="s-12">
            <h1>{{$article->title}}</h1>
            <p>{!! $article->description !!}</p>
            <br>
            <?php
            $tag = '';
            foreach ($article->articleTags as $tags)
            {
                $tag .= '<a href="#">' . $tags->tag->name . ' </a>, ';
            }
            echo rtrim($tag, ', ');
            ?>


            <div>
                written by: {{$article->user->name}}
                <br>
                {{ $article->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
</section>
@endsection