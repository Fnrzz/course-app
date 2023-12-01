<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class ListTransactions extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public function render()
    {

        $transactions = Transaction::where('user_id',auth()->user()->id)->where('created_at', 'like', '%' . $this->search . '%')->paginate(6);
        return view('livewire.list-transactions', compact('transactions'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
