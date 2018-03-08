@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Category <span class="badge badge-primary">Primary</span>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">
                        Title
                    </div>
                    <div class="card-body">
                        Body substr($string,0,30);
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('navbar_category')

        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="nav-scroller navbar-light navbar-laravel py-1 mb-2">
                <nav class="nav">
                    <a class="p-2 text-muted" href="#">World</a>
                    <a class="p-2 text-muted" href="#">Malaysia</a>
                    <a class="p-2 text-muted" href="#">Technology</a>
                </nav>
            </div>
            </div>
        </div>
    </div>
@endsection
