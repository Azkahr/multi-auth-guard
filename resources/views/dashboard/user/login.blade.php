@extends('layout.main')

@section('container')
        <title>User Login</title>
        
        <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
            <h4>User Login</h4><hr>
            <form action="{{ route('user.check') }}" method="post" autocomplete="off">
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @csrf
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
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-2">Login</button>
                </div>
                <br>
                <a href="{{ route('user.register') }}">Create new account</a>
            </form>
        </div>
@endsection