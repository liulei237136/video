<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    public function path(){
        return "/courses/{$this->id}";
    }

    /**
     *
     * Check if a user is authorized to edit this model instance
     *
     * @return boolean-
     *
     */
    public function editable()
    {
        if (! auth()-> check()) return false;

        return $this->user_id === Auth::id();
    }
}
