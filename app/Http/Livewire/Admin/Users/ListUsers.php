<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class ListUsers extends Component
{
    use WithPagination;

    public $addNewModal = false;

    public $state = [];
    public $showEditModal = false;
    public $user;
    public $userIbBeingRemoved = null;

    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.admin.users.list-users', [
            'users'=> User::latest()->paginate(10),
        ]);
    }

    public function addNew()
    {
        $this->showEditModal = false;

        $this->state = [];

        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser()
    {
       $validateData =  Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ])->validate();

        $validateData['password'] = bcrypt($validateData['password']);

         User::create($validateData);

       // session()->flash('success', 'New User Created');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User added successfully']);

        return redirect()->back();

    }

    public function updateUser()
    {
        $validateData =  Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|confirmed'
        ])->validate();
        
        if(!empty($validateData['password'])) {

            $validateData['password'] = bcrypt($validateData['password']);
        }
        
        $this->user->update($validateData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User Updated successfully']);

        return redirect()->back();
    }

    public function edit(User $user)
    {
        $this->showEditModal = true;

        $this->state = $user->toArray();

        $this->user = $user;

        $this->dispatchBrowserEvent('show-form');

    }

    public function confirmUserRemoval($userId)
    {
        $this->userIbBeingRemoved = $userId;

        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->userIbBeingRemoved);

        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User Delete successfully']);
    }
        
}

