@extends('dashboard.layouts.main')

@section('container')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success col-lg-6 my-2" role="alert">
            {{ session('success') }}
          </div>
        @endif
        <div class="table table-responsive col-lg-6">
            <a href="/dashboard/categories/create" class="btn btn-outline-primary mb-3 btn-sm">Create new category</a>
            <table class="table-striped table-bordered table-sm table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col" style="width: 50%">Category Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-center">
                            <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-primary"><i class="fa fa-fw fa-eye text-white"></i></a>
                            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><i class="fa fa-fw fa-pencil-alt text-dark"></i></a>
                            <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
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
