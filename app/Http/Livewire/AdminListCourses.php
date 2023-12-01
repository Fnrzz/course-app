<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class AdminListCourses extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public function render()
    {
        $data = [
            'courses' => Course::where('name', 'like', '%' . $this->search . '%')->paginate(6)
        ];
        return view('livewire.admin-list-courses', $data);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
