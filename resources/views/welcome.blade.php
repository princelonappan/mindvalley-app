<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="{{ asset('css/components.css') }}">
      <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
      <link rel="stylesheet" href="{{ asset('css/responsee.css') }}">
      <link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.carousel.css') }}">
      <link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.theme.css') }}">  
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="{{ asset('css/template-style.css') }}">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>    
   </head>
   <body class="size-1520">
      <!-- HEADER -->
      <header>
         <div class="line">
            <div class="box">
               <div class="s-12 l-2">
                  <img class="full-img logo" src="{{ asset('img/logo.svg') }}">
               </div>
               <div class="s-12 l-8 right">
                  <div class="margin">
                     <form  class="customform s-12 l-8" method="get" action="http://google.com/">
                        <div class="s-9"><input type="text" placeholder="Search form" title="Search form" /></div>
                        <div class="s-3"><button type="submit">Search</button></div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- TOP NAV -->  
         <div class="line">
            <nav>
               <p class="nav-text">Main navigation</p>
               <div class="top-nav">
                  <ul class="right">
                     <li><a>Home</a></li>
                     <li>
                        <a>Category</a>
                        <ul>
                          @foreach($categories as $value)
                                <li><a>{{$value->name}}</a></li>
                           @endforeach
                       </ul>
                     </li>
                     <li><a>Contact</a></li>
                  </ul>
               </div>
            </nav>
         </div>
      </header>
      <!-- ASIDE NAV AND CONTENT -->
      <div class="line">
         <div class="box margin-bottom">
            <div class="margin2x">
               <!-- ASIDE NAV -->
               <aside class="s-12 m-4 l-3 xl-2">
                  <h4 class="margin-bottom">Select Tag</h4>
                  <div class="aside-nav minimize-on-small">
                     <p class="aside-nav-text">Select Tag</p>
                     <ul>
                            @foreach($tags as $value)
                                <li><a>{{$value->name}}</a></li>
                           @endforeach
                     </ul>
                  </div>
               </aside>
               <!-- CONTENT -->
               <section class="s-12 m-8 l-9 xl-10">                  
                  <!-- CAROUSEL -->  
                  <div class="line hide-s">
                    <div id="header-carousel" class="owl-carousel owl-theme">
                       <div class="item"><img src="{{ asset('img/header-1.svg') }}" alt=""></div>
                       <div class="item"><img src="{{ asset('img/header-2.svg') }}" alt=""></div>
                       <div class="item"><img src="{{ asset('img/header-3.svg') }}" alt=""></div>
                    </div>
                  </div>                  
                  <!-- Breadcrumb -->
                  <nav class="breadcrumb-nav">
                    <ul>
                      <li><a href="/">Catalogue</a></li>
                    </ul>
                  </nav>
                  <!-- Pruducts -->
                  <div class="margin2x">
                      
                      @foreach($articles as $value)
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                         <?php 
                         $src = get_image_url($value->description);
                         echo $src;
                         $src = !empty($src) ? $src : asset('img/gallery-1.svg');
                         ?>
                        <a href="/"><img class="full-img" src="{{ $src }}"></a>

                        <a href="/">
                            <h4 class="margin-bottom">
                                <b>{{str_limit(strip_tags($value->title), 15)}}</b>
                            </h4></a>
                                               <p class="margin-bottom">
                             <?php 
                             $content = replace_image($value->description); ?>
                            {{ str_limit(strip_tags($content), 100) }}
                            @if (strlen(strip_tags($content)) > 100)
                            ... <a href="" class="btn btn-info btn-sm">Read More</a>
                            @endif
                        </p>
                     </div>
                      @endforeach
                  </div>
               </section>
            </div>
         </div>
      </div>
      <!-- FOOTER -->
      <footer>
         <div class="line">
            <div class="s-12 l-6">
               <p>Copyright 2019, Vision Design - graphic zoo</p>
            </div>
         </div>
      </footer>
      <script type="text/javascript" src="{{ asset('js/responsee.js') }}"></script> 
      <script type="text/javascript" src="{{ asset('css/owl-carousel/owl.carousel.js') }}"></script>
      <script type="text/javascript">
        jQuery(document).ready(function($) {
          var owl = $('#header-carousel');
          owl.owlCarousel({
            nav: false,
            dots: true,
            items: 1,
            loop: true,
            navText: ["&#xf007","&#xf006"],
            autoplay: true,
            autoplayTimeout: 3000
          });
        })
      </script>     
   </body>
</html>