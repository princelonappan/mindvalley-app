@extends('layouts.home')
@section('content')
<!-- CONTENT -->
<section class="s-12 m-8 l-9 xl-10">                  
    <!-- CAROUSEL -->  
    <div class="line hide-s">
        <div id="header-carousel" class="owl-carousel owl-theme">
            <div class="item"><img src="{{ asset('img/banner-1.jpg') }}" alt=""></div>
            <div class="item"><img src="{{ asset('img/blog-banner.jpg') }}" alt=""></div>
            <div class="item"><img src="{{ asset('img/blog_banner_trends.jpg') }}" alt=""></div>
        </div>
    </div>                  
    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav">
        <ul>
            <li><a href="/">{{$selected_category->name}}</a></li>
        </ul>
    </nav>
    <!-- Pruducts -->
    <div class="margin2x">
        <?php if (!empty($articles))
        { ?>
            @foreach($articles as $value)
            <?php
            $src = get_image_url($value->description);
            $src = !empty($src) ? $src : asset('img/blog_default.png');
            ?>
            <div class="s-12 m-12 l-4 xl-3 xxl-3">
                <a href="/"><img class="full-img" src="{{ $src }}"></a>

                <a href="{{ URL::to('article/' . $value->id) }}">
                    <h4 class="margin-bottom">
                        <b>{{str_limit(strip_tags($value->title), 15)}}</b>
                    </h4></a>
                <p class="margin-bottom">
                    {{ str_limit(strip_tags($value->description), 100) }}
                    @if (strlen(strip_tags($value->description)) > 100)
                    ... <a href="{{ URL::to('article/' . $value->id) }}" class="btn btn-info btn-sm">Read More</a>
                    @endif
                </p>
            </div>
            @endforeach
        <?php
        }
        else
        {
            echo 'No Articles Found';
        }
        ?>


    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var owl = $('#header-carousel');
        owl.owlCarousel({
            nav: false,
            dots: true,
            items: 1,
            loop: true,
            navText: ["&#xf007", "&#xf006"],
            autoplay: true,
            autoplayTimeout: 3000
        });
    })
</script>     
@endsection