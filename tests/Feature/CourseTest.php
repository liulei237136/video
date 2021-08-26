<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_course(){
        //given a verified  user
        $this->signIn();
        //there is a course
        $course = Course::factory()->make();
        //if we issue a post to course store route
        $response = $this->post(route('courses.store'), $course->getAttributes());
        $response->assertRedirect();
        //we redirect to the url in the response
        $this->get($response->headers->get('Location'))
            ->assertSee($course->name);
    }


}
