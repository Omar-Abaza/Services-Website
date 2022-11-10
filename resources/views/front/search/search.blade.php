@extends('front.layout')

@section('main')
    <div class="sidebar sidebar-left">
        <div class="widget">
            <h1 class="left-container m-5">search at Services for {{ $keyword }}</h1>
            <form class="left-container w-25 m-5" action="{{ route('search') }}" method="get">
                @csrf
                <input type="text" name="keyword" id="" class="form-control mb-2">
                <button type="submit" class="btn btn-primary">search</button>
                @if ($keyword)
                    @foreach ($services as $service)
                        <p class="left-container m-5">{{ $loop->iteration }} - <a
                                href="{{ route('front.services-single', $service->id) }}">{{ $service->name }}</a></p>
                    @endforeach
                @endif
                </ul>
        </div><!-- Widget end -->
    </div><!-- Widget end -->
@endsection
