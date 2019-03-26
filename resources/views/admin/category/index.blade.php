@extends('layouts.admin')

@section('content')
            <h1>All the Categories</h1>

            <!-- will be used to show any messages -->
            @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            <table id="category_table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Actions</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($categories as $key => $value)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{ $value->name }}</td>
                        <td><?php echo $value->status == 1 ? 'Active' : 'Inactive';?></td>
                        <td>
                            <a class="btn btn-small btn-info" href="{{ URL::to('/admin/category/' . $value->id . '/edit') }}">Edit this Category
                            </a>
                        </td>
                        <td>

                            {{ Form::open(array('url' => '/admin/category/' . $value->id, 'class' => '')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete this Category', array('class' => 'btn btn-warning')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
                        <script>
$(document).ready(function () {
    $('#category_table').DataTable();
});
        </script>
@endsection