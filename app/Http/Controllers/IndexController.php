<?php

namespace App\Http\Controllers;

use App\Models\Course;

class IndexController extends Controller
{
    public function index(){
        $query = request()->search;

        if ($query) {
            $courses = Course::where('title', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->paginate(5, ['*'], 'video_page');
        }else{
            $courses = Course::paginate(5, ['*'], 'video_page');
        }

            return view('index')->with([
            'courses' => $courses,
        ]);
    }
}
