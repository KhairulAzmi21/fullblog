@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header"><b>{{ $post->title }}</b> <i>ditulis oleh</i> <b>{{ auth()->user()->name }}</b>
                    <span class="float-right">
                        {{ $post->created_at->diffForHumans() }}
                    </span>
            </div>
            <div class="card-body">
                <!-- render html -->
                {!! $post->content !!}

            </div>

        </div>

        <div class="mt-4">
                <form class="form-control" action="{{ route('comments.store', $post->id)}}" method="post">
                                    @csrf
                    <div class="form-group">
                      <label for="comment">Comment:</label>
                      <textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
                    </div>
                      <!-- cara pertama -->
                     <input type="hidden" name="post_id" value="{{ $post->id }}">
                     <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
        <!-- kalau takde comment, dia akan pergi ke aliases empty blade -->
        @forelse($post->comments as $comment)
        <div class="card mt-4">
            <div class="card-header card"> {{ $comment->user->name }}
                    <span class="float-right">
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
            </div>
            <div class="card-body">
                {{ $comment->body }}
            </div>
        </div>
        @empty
        <div class="card mt-4">
            <div class="card-header">No Name
                    <span class="float-right">
                        No Date
                    </span>
            </div>
            <div class="card-body">
                No Komen
            </div>
        </div>
        @endforelse
</div>
</div>
@endsection
