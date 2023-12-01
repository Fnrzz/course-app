<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminListProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $data = [
            'products' => Product::where('name', 'like', '%' . $this->search . '%')->paginate(6)
        ];

        return view('livewire.admin-list-products', $data);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
