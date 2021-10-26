@extends('dashboard.layouts.main')

@section('container')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Posts</h1>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success col-lg-8 my-2" role="alert">
            {{ session('success') }}
          </div>
        @endif
        <div class="table table-responsive col-lg-8">
            <a href="/dashboard/posts/create" class="btn btn-outline-primary mb-3 btn-sm">Create new post</a>
            <table class="table-striped table-bordered table-sm table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col" style="width: 50%">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td class="text-center">
                            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-primary"><i class="fa fa-fw fa-eye text-white"></i></a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><i class="fa fa-fw fa-pencil-alt text-dark"></i></a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-fw fa-trash text-white"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
    </div>
    <!-- /.container-fluid -->
@endsection
