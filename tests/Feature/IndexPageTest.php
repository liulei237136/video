<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_show_courses_in_index_page()
    {
        $course = Course::factory()->create();
        $response = $this->get('/');
        $response->assertSee($course->name);
    }
}
