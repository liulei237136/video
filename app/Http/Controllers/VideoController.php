<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Jobs\ConvertVideoForDownloading;
use App\Jobs\ConvertVideoForStreaming;
use App\Models\Video;

class VideoController extends Controller
{
    public function show(Video $video){
        return view('video/show', compact('video'));
    }
    public function index(){
        $videos = Video::all();
        return view('video/index', compact('videos'));
    }

    public function create(){
        return view('video/create');
    }

    public function store(StoreVideoRequest $request)
    {
        $video = Video::create([
            'disk'          => 'videos_disk',
            'original_name' => $request->video->getClientOriginalName(),
            'path'          => $request->video->store('videos', 'videos_disk'),
            'title'         => $request->title,
        ]);

        $this->dispatch(new ConvertVideoForDownloading($video));
        $this->dispatch(new ConvertVideoForStreaming($video));

//        return response()->json([
//            'id' => $video->id,
//        ], 201);
        return redirect('/videos');
    }
}
