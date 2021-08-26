<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $dates = [
        'converted_for_downloading_at',
        'converted_for_streaming_at'
    ];

    protected $guarded = [];

    public function getStreamablePathAttribute(){
        return url('storage/streamable_videos').'/' . $this->id . '.m3u8';
    }

    public function getDownalbePathAtrribute(){
        return url('storage/downable_videos').'/' . $this->id . '.mp4';
    }
}
