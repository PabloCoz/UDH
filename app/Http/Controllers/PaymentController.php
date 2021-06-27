<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use MercadoPago;
class PaymentController extends Controller
{
    public function checkout(Course $course)
    {
        return view('payment.checkout', compact('course'));
    }

    /* public function show(Course $course)
    {
        $course->students()->attach(auth()->user()->id);
        return redirect()->route('courses.status', $course);
    } */
    
    public function pay(Course $course, Request $request)
    {
        return $request->all();
    }
}
