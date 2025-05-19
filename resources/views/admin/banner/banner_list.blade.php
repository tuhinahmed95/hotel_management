@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>banner List</h3>
                </div>
                <div class="mt-2">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>

                <div class="mt-2">
                    @if (session('update'))
                        <div class="alert alert-success">{{ session('update') }}</div>
                    @endif
                </div>

                <div class="mt-2">
                    @if (session('delete'))
                        <div class="alert alert-danger">{{ session('delete') }}</div>
                    @endif
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('banner.create') }}" class="btn btn-primary mr-3">Add Banner</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Banner Image</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($banners as $key => $banner)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <img src="{{ asset('uploads/banner') }}/{{ $banner->b_image }}" alt="">
                            <td>
                                <td>
                                    <a href="{{ route('banner.edit',$banner->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('banner.delete',$banner->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
