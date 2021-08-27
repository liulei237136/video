<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Course;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use DatabaseMigrations;

    public function test_a_course_has_a_path(){
        $course = Course::factory()->create();
        $this->assertEquals("/courses/{$course->id}", $course->path());
    }
}
