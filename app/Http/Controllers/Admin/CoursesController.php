<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedCourse;
use App\Mail\RejetCourse;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 2)->paginate();
        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $this->authorize('revision', $course);
        return view('admin.courses.show',compact('course'));
    }

    public function approved(Course $course)
    {
        $this->authorize('revision', $course);
        
        if (!count($course->lessons) || !count($course->goals) || !count($course->requirements)) {
            return back()->with('info', 'Curso Imcompleto');
        }
        $course->status = 3;
        $course->save();

        $mail = new ApprovedCourse($course);

        Mail::to($course->teacher->email)->queue($mail);
 
        return redirect()->route('admin.courses.index')->with('info', 'Publicado correctamente');
    }

    public function observation(Course $course)
    {
        return view('admin.courses.observation', compact('course'));
    }

    public function rejet(Request $request, Course $course)
    {
        $request->validate([
            'body' => 'required'
        ]);
        $course->observation()->create($request->all());
        $course->status = 1;
        $course->save();

        $mail = new RejetCourse($course);

        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('reject', 'Curso Rechazado');
    }
}
