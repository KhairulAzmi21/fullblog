@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit a post</div>
            <div class="card-body">
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    {{-- Used for mitigate CSRF attack --}}
                    @csrf
                    {{-- {{ csrf_field() }} --}}
                    @method('PUT')
                    {{-- {{ METHOD_FIELD('PUT') }} --}}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="title" class="form-control" name="title" id="title" value="{{ old('title',$post->title) }}">
                    </div>
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea class="form-control" id="body" name="content" rows="3" >{{ old('body',$post->body) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control" id="category">
                            <option>Food</option>
                            <option>Tech</option>
                            <option>Travel</option>
                            <option>Book</option>
                          </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
