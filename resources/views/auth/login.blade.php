@extends('front.layout')

@section('main')
@include("admin.inc.errors")
        <div id="contact" class="section m-5 ">

            <!-- container -->
            <form class="container w-50" action="{{ url('login') }}" method="post">
                @csrf
                <h4>Login</h4>
                    <input type="email" name="email" class="form-control mb-2" id="" placeholder="Email">
                    <input type="password" name="password" class="form-control mb-2" id="" placeholder="Password">
                    <button type="submit" class="btn btn-primary">log in</button>
                </form>
            </div>

        </div>

@endsection
