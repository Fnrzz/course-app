<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class OwnerListProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $course = Course::where('email_owner','like','%'.auth()->user()->email.'%')->first();
        $data = [
            'products' => Product::where('course_id',$course->id)
                                ->where('name', 'like', '%' . $this->search . '%')->paginate(6)
        ];
        return view('livewire.owner-list-products',$data);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
