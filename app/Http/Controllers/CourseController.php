<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Rules\SpamFree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function show(Course $course){
        return view('courses.show', compact('course'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', new SpamFree],
            'description' => [new SpamFree],
             'image' => ['string', 'url'],
        ]);

        $course = Course::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'image' => $request['image'],
            'user_id' => Auth::id(),
        ]);

        return redirect($course->path())->with('flash', __('Your course was created'));
    }

}
