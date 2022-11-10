@extends('front.layout')

@section('main')
    @include('admin.inc.errors')
    <div id="contact" class="section m-5 ">

        <!-- container -->
            <form class="container w-50" action="{{ url('register') }}" method="post">
                @csrf
                <h4>Register</h4>
                <input type="text" name="name" class="form-control mb-2" id="" placeholder="Name">
                <input type="email" name="email" class="form-control mb-2" id="" placeholder="Email">
                <input type="password" name="password" class="form-control mb-2" id="" placeholder="Password">
                <input type="password" name="password_confirmation" class="form-control mb-2" id=""
                    placeholder="Confirm Password">
                <button type="submit" class="btn btn-primary">register</button>
                <a class="btn btn-primary" href="{{ route('auth.loginForm') }}">login</a>
            </form>
        </div>
    </div>
@endsection
