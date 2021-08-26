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
        $query = request()->search;

//        $videos = collect();

//        $channels = collect();

        if ($query) {
            $videos = Video::where('title', 'LIKE', "%{$query}%")->paginate(5, ['*'], 'video_page');
//            $videos = Video::where('title', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->paginate(5, ['*'], 'video_page');
//            $channels = Channel::where('name', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->paginate(5, ['*'], 'channel_page');
        }else{
            $videos = Video::paginate(5, ['*'], 'video_page');
        }


        return view('video.index')->with([
            'videos' => $videos,
//            'channels' => $channels
        ]);
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
