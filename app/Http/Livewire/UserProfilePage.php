<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserProfilePage extends Component
{

    public User $user;
    public function render()
    {
        return view('livewire.user-profile-page');
    }

    public function mount($id)
    {
        $this->user = User::find($id);
    }
}
