@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Post
                    <span class="float-right">
                        <a href="{{ route('posts.create')}}" class="btn btn-sm btn-primary">Create New Post</a>
                    </span>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Created At</th>
                                <th>Last Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title}}</td>
                                <td><span class="badge badge-primary">{{ $post->category->name}}</span></td>
                                <td>{{ $post->created_at}}</td>
                                <td>{{ $post->updated_at}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('posts.show', $post->id)}}">Show</a>
                                    <a class="btn btn-sm btn-success" href="{{ route('posts.edit', $post->id)}}">Edit</a>
                                    {{-- <a class="btn btn-sm btn-danger" href="{{ route('posts.delete', $post->id)}}">Delete</a> --}}
                                    <!-- <a href="#"></a> hanya boleh menghantar get request sahaja -->
                                    <!-- jadi untuk button delete, kita wajib letakkan button itu didalam form dan hantar sebagai DELETE request -->
                                    {{-- <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form> --}}
                                    <a href="{{ route('posts.destroy', $post->id) }}" data-title="{{ $post->title }}" class="btn btn-danger btn-sm delete-rekod">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label_delete"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Adakah anda pasti?
            </div>
            <div class="modal-footer">
                <form id="delete-form" action="" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(function () {
$('.delete-rekod').on('click', function (event) {
    event.preventDefault();
    var button = $(this);
    var title = button.data('title');
    var modal = $('#modal_delete');
    modal.find('#modal_label_delete').text("Tajuk Dibuang: " + title);
    var href = button.attr('href');
    modal.find('#delete-form').attr('action', href)
    modal.modal('show');
});
});
</script>
@endsection
