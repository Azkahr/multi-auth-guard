@extends('layout.main')

@section('container')
    <title>Doctor Dashboard | Home</title>
    <div class="col-md-6 offset-md-3" style="margin-top: 45px">
        <h4>Doctor Dashboard</h4><hr>
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Hospital</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ Auth::guard('doctor')->user()->name }}</td>
                    <td>{{ Auth::guard('doctor')->user()->email }}</td>
                    <td>{{ Auth::guard('doctor')->user()->hospital }}</td>
                    <td>
                        <a href="{{ route('doctor.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form action="{{ route('doctor.logout') }}" id="logout-form" method="post">@csrf</form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection