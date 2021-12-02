<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminsAction extends Component
{

    public $user_role;
    public $user;



    public function render()
    {
        return view('livewire.admins-action');
    }
    public function mount($id)
    {
        $this->user = User::find($id);
        $this->user_role = $this->checkUserRole($this->user);
    }
    public function change()
    {

        if ($this->user_role == 'customer') {
            if ($this->user->syncRoles()) {
                $this->emit('customMessage', 'تم تعديل الصلاحية بنجاح', 'green');
                $this->emit('setShowAlertModal');
            }
        } else {
            if ($this->user->syncRoles($this->user_role)) {
                $this->emit('customMessage', 'تم تعديل الصلاحية بنجاح', 'green');
                $this->emit('setShowAlertModal');
            }
        }
    }


    public function checkUserRole(User $user)
    {
        if ($user->hasRole('superAdmin')) {
            $user_role = 'superAdmin';
        } elseif ($user->hasRole('admin')) {
            $user_role = 'admin';
        } elseif ($user->hasRole('editor')) {
            $user_role = 'editor';
        } else {
            $user_role = 'customer';
        }

        return $user_role;
    }

    public function showAlert($type)
    {
        $this->emit('changeType', $type);
        $this->emitSelf('setShowAlertModal');
    }
    public function setShowAlertModal()
    {
        $this->showAlertModel = true;
    }
}
