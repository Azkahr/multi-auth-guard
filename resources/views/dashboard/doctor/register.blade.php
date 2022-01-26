@extends('layout.main')

@section('container')
    <title>Doctor Register</title>
        <div class="col-md-4 offset-md-4" style="margin-top: 45px">
            <h4>Doctor Register</h4><hr>
            <form action="{{ route('doctor.create') }}" method="POST" autocomplete="off">
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter full name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter email address" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hospital">Hospital</label>
                    <input type="text" class="form-control @error('hospital') is-invalid @enderror" name="hospital" id="hospital" placeholder="Enter hospital name" value="{{ old('hospital') }}">
                    @error('hospital')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control @error('cpassword') is-invalid @enderror" name="cpassword" id="cpassword" placeholder="Enter confirm password">
                    @error('cpassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-2">Register</button>
                </div>
                <br>
                <a href="{{ route('doctor.login') }}">Already have an account? Login now</a>
            </form>
        </div>
@endsection