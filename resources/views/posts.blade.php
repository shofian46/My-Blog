@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    @if ($posts->count())
    <div class="card mb-3">
        @if ($posts[0]->image)
            <div style="max-height: 350px; max-weight: 350px; overflow:hidden;">
                <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid d-flex px-5">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        @endif
        <div class="card-body text-center">
          <h3 class="card-title">
              <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
          </h3>
          <p>
            <small class="text-muted">By: <a href="/posts?author={{ $posts[0]->author->username}}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in
            <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
            </small>
          </p>

          <p class="card-text">{{ $posts[0]->excerpt }}</p>

          <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-read-more">Read Me</a>
            <div class="d-inline-flex position-static px-0 py-0">
                @auth
                    <div class="row justify-content-end">
                        <div class="col-lg-5">
                            <form action="/posts{{ $posts[0]->slug }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn border-0 rounded-circle text-muted d-inline-flex justify-content-center" name="like"><i class="far fa-heart"></i><p class="d-inline px-2" style="font-size: 12px">1</p></button>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form action="/posts{{ $posts[0]->slug }}) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn border-0 rounded-circle text-muted d-inline-flex" name="comment"><i class="far fa-comment"></i><p class="px-2 d-inline" style="font-size: 12px">1</p></button>
                            </form>
                        </div>
                    </div>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-regis-or-login btn-block mt-3 py-2 mx-md-1">Login / Register To Join</a>
                @endguest
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a>
                        </div>
                        @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid d-flex px-5">
                            @else
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                        @endif

                        <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            <small class="text-muted">By:
                            <a href="/posts?author={{$post->author->username}}" class="text-decoration-none">{{$post->author->name}}
                            </a> {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-read-more">Read Me</a>
                        <div class="d-inline-flex position-static px-0 py-0">
                            @auth
                                <div class="row justify-content-end">
                                    <div class="col-lg-5">
                                        <form action="/posts/create{{ $post->slug }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn border-0 rounded-circle text-muted d-inline-flex justify-content-center"><i class="far fa-heart"></i><p class="px-2 d-inline" style="font-size: 12px">1</p></button>
                                        </form>
                                    </div>
                                    <div class="col-lg-6">
                                        <form action="/posts/create{{ $post->slug }}) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn border-0 rounded-circle text-muted d-inline-flex"><i class="far fa-comment"></i><p class="px-2 d-inline-block" style="font-size: 12px">1</p></button>
                                        </form>
                                    </div>
                                </div>
                            @endauth
                            @guest

                            @endguest
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @else
    <p class="text-center fs-4">No post found.</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
@endsection


