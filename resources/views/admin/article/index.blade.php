@extends('layouts.admin')

@section('content')
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
    <div class="bg-indigo-darkest text-center py-4 lg:px-4">
        <div class="p-2 bg-indigo-darker items-center text-indigo-lightest leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-indigo uppercase px-2 py-1 text-xs font-bold mr-3">Success</span>
            <span class="font-semibold mr-2 text-left flex-auto">{{ Session::get('message') }}</span>
            <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
        </div>
    </div>
    @endif
    <h1 >All the Article</h1>
    <table id="article_table" class="table table-striped table-bordered text-left m-4 .table-auto">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Category</td>
                <td>Tags</td>
                <td>Status</td>
                <td>Created Date</td>
                <td>Actions</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($articles as $key => $value)
            <tr>
                <td>{{$i}}</td>
                <td>{{ $value->title }}</td>
                <td><?php (isset($value->category)) ? $value->category->name : ''; ?></td>
                <td><?php
                    $i++;
                    $tag = '';
                    foreach ($value->articleTags as $tags)
                    {
                        $tag .= $tags->tag->name . ', ';
                    }
                    echo rtrim($tag, ', ');
                    ?></td>
               <td><?php echo $value->status == 1 ? 'Active' : 'Inactive';?></td>
                <td>{{ $value->created_at }}</td>
                <td>
                    <a class="btn btn-small btn-info" href="{{ URL::to('/admin/article/' . $value->id . '/edit') }}">Edit this Article</a> 
                </td>
                <td>      
                    <a class="btn btn-small btn-success" href="{{ URL::to('/admin/article/' . $value->id) }}">Show this Article</a>
                </td>
                <td>
                    {{ Form::open(array('url' => '/admin/article/' . $value->id, 'class' => '')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Article', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
            <script>
$(document).ready(function () {
    $('#article_table').DataTable();
});
        </script>
@endsection
