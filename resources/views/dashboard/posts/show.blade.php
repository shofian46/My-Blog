@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $post->title }}</h2>
            <a href="/dashboard/posts" class="text-decoration-none btn btn-outline-success"><i class="fa fa-sign-out-alt"></i> Back to my posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-decoration-none btn btn-outline-warning"><i class="fa fa-pencil-alt"></i> Update</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline text-center">
                @method('delete')
                @csrf
                <button type="submit" class="text-decoration-none btn btn-outline-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-fw fa-trash text-dark"></i>Delete</button>
            </form>
            @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                </div>
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            @endif

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>

        </div>
    </div>
</div>
@endsection
