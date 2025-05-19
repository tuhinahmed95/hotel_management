@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Banner Update</h3>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('banner.list') }}" class="btn btn-primary mr-3">Back To Banner List</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Banner Image</label>
                            <input type="file" name="b_image" class="form-control">
                            <img width="100" height="100" src="{{ asset('uploads/banner') }}/{{ $banner->b_image }}" alt="">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary">Update Banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
