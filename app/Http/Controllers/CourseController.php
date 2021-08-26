<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Rules\SpamFree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function store(Request $request){
//        $table->id();
//        $table->string('title');
//        $table->text('description')->nullable();
//        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
//        $table->string('image')->nullable();
//        $table->timestamps();
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

        return redirect()
            ->with('flash', __('Your course was created'));
    }
}
