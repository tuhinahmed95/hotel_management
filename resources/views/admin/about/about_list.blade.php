@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>About Section List</h3>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('about.create') }}" class="btn btn-primary mr-3">Add About</a>
                </div>

                <div class="mt-2">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Heading</th>
                            <th>Content</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
