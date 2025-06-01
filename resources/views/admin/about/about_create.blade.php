@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>About Section Create</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Heading</label>
                            <input type="text" name="heading" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Content</label>
                            <input type="text" name="content" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add About</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
