@extends('layouts.app')

@section('content')
    <div>
        <a href="/videos/create" class="btn btn-primary btn-lg">Upload video</a>
    </div>
    <div>
        @foreach($videos as $video)
            <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">{{ $video->title }}</h5>
                    <a href="{{ route('video', $video->id)}} " class="btn btn-primary">Go to view</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
