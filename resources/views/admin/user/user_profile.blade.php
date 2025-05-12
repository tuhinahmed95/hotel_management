@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>User Profile Update</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.profile.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>User Password Update</h3>
                </div>
                @if (session('password'))
                    <div class="alert alert-success">{{ session('password') }}</div>
                @endif
                <div class="card-body">
                    <form action="{{ route('user.password.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Current Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>User Profile Update</h3>
                </div>
                @if (session('photo'))
                    <div class="alert alert-success">{{ session('photo') }}</div>
                @endif
                <div class="card-body">
                    <form action="{{ route('user.photo.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Photo Update</label>
                            <input type="file" name="photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                            <img src="{{ asset('uploads/user') }}/{{ Auth::user()->photo }}" alt="" width="100" height="100" id="blah">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Photo Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
