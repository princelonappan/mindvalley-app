<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Article Management</title>

    <!-- Styles -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL::to('/admin/article') }}">Home</a>
                    <div class="dropdown">
                        <a  class="dropbtn navbar-brand">Article</a>
                        <div class="dropdown-content">
                            <a href="{{ URL::to('/admin/article') }}">List</a>
                            <a href="{{ URL::to('/admin/article/create') }}">Create</a>
                        </div>
                    </div> 
                    <div class="dropdown">
                        <a  class="dropbtn navbar-brand">Category</a>
                        <div class="dropdown-content">
                            <a href="{{ URL::to('/admin/category') }}">List</a>
                            <a href="{{ URL::to('/admin/category/create') }}">Create</a>
                        </div>
                    </div> 
                    <div class="dropdown">
                        <a  class="dropbtn navbar-brand">Tag</a>
                        <div class="dropdown-content">
                            <a href="{{ URL::to('/admin/tag') }}">List</a>
                            <a href="{{ URL::to('/admin/tag/create') }}">Create</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="navbar-brand" href="{{ URL::to('/logout') }}">Logout</a>
                    </div>
                </div>
            </nav>

        @yield('content')
    </div>

</body>
</html>
