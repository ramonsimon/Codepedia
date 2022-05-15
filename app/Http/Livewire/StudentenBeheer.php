<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class StudentenBeheer extends Component
{

    public $astudents;
    public $users;

    public function mount(){
        $this->astudents = User::whereDoesntHave('roles')->get();
        $this->users = User::wherehas('roles')->get();
    }

    public function acceptStudent($userId){
        $user = User::findOrFail($userId);
        if ($user->hasRole('student')) {
            $user->removeRole('student');
        }
        $user->assignRole('user');
    }


    public function render()
    {
        return view('livewire.studenten-beheer');
    }
}
