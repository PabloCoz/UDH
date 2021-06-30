<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Course;
use App\Models\Description;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Requirement;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::factory(100)->create();

        foreach ($courses as $course) {
            Image::factory(1)->create([
                'imageable_id' => $course->id,
                'imageable_type' => Course::class
            ]);

            Requirement::factory(4)->create([
                'course_id' => $course->id
            ]);

            Goal::factory(4)->create([
                'course_id' => $course->id
            ]);

            Audience::factory(4)->create([
                'course_id' => $course->id
            ]);

            $modules = Module::factory(5)->create([
                'course_id' => $course->id
            ]);

                foreach ($modules as $module) {
                    $lessons = Lesson::factory(5)->create([
                        'module_id' => $module->id
                    ]);

                        foreach ($lessons as $lesson) {
                            Description::factory(1)->create([
                                'lesson_id' => $lesson->id,
                            ]);
                        }
                }
        }
    }
}
