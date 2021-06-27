<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class PaymentPay extends Component
{
    public $course;
    protected $listeners = ['payCompleted'];
    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function payCompleted()
    {
        $this->course->students()->attach(auth()->user()->id);
        return redirect()->route('courses.status', $this->course);
    }

    public function render()
    {
        $course = Course::where('status', 3);
        return view('livewire.payment-pay', compact('course'));
    }
}
