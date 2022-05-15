<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class StudentenBeheer extends Component
{

    public $astudents;
    public $users;

    public function mount(){
        $this->loadArrays();
    }

    private function loadArrays() {
        $this->astudents = User::whereDoesntHave('roles')->get();
        $this->users = User::role(['pending', 'verified','user'])->get();

    }

    public function acceptStudent($userId){
        $user = User::findOrFail($userId);
        if ($user->hasRole('verified')) {
            $user->removeRole('verified');
        }
        $user->assignRole('user');
        $this->loadArrays();
    }


    public function blockStudent($userId
    ){
        $user = User::findOrFail($userId);
        if ($user->hasRole('user')) {
            $user->removeRole('user');
        }
        $user->assignRole('verified');
        $this->loadArrays();
    }

    public function render()
    {
        return view('livewire.studenten-beheer');
    }
}
