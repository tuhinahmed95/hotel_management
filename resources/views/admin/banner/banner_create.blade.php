@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Banner Create</h3>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('banner.list') }}" class="btn btn-primary mr-3">Back To Banner List</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Banner Image</label>
                            <input type="file" name="b_image" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary">Add Banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
