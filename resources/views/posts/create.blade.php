@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('posts.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="title" class="form-control" required name="title" value="{{ old('title') }}" id="title">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea id="content"  name="content">{{ old('body') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category">
                        @foreach(get_categories() as $category)
                        <option value="{{ $category->id}}">{{ ucfirst($category->name) }}</option>
                        @endforeach
                      </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
</div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#content').summernote({
                height: 300,
                popover: {
                    image: [],
                    link: [],
                    air: []
                }
            });
        });
    </script>
@endsection
