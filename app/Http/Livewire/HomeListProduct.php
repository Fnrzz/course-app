<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class HomeListProduct extends Component
{
    public $search = '';

    public function render()
    {
        $courses = Course::where('name', 'like', '%' . $this->search . '%')->get();

        return view('livewire.home-list-product', compact('courses'));
    }
}
