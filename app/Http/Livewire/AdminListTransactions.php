<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminListTransactions extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        if($this->search){
            $user = User::where('email','like','%'.$this->search.'%')->first();
            if($user){
                $transactions = Transaction::where('user_id', $user->id)->paginate(6);
            }else{
                $transactions =  Transaction::latest()->paginate(6);
            }
        }else{
            $transactions =  Transaction::latest()->paginate(6);
        }
        return view('livewire.admin-list-transactions', compact('transactions'));
    }
}
