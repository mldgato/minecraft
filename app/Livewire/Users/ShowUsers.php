<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;


class ShowUsers extends Component
{
    use WithPagination;

    public $user, $name, $email, $user_id, $password, $password_repeat;
    public $search;
    public $sort = 'name';
    public $direction = 'asc';
    public $cant = '10';
    public $readyToLoad = false;

    protected $paginationTheme = "bootstrap";

    protected $queryString = [
        'cant' => ['except' => '10'],
        'search' => ['except' => '']
    ];

    protected $listeners = ['render', 'delete', 'save'];

    protected $rules = [
        'name' => 'required',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCant()
    {
        $this->resetPage();
    }

    public function updatingSort()
    {
        $this->resetPage();
    }

    public function updatingDirection()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->readyToLoad) {
            $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $users = [];
        }
        return view('livewire.users.show-users', compact('users'));
    }

    public function loadRecords()
    {
        $this->readyToLoad = true;
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function resetFields()
    {
        $this->reset([
            'name',
            'email',
            'password',
            'password_repeat'
        ]);
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $this->user = User::where('id', $id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update()
    {
        $this->validate();
        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->resetFields();
            $this->dispatch('closeModalMessaje', 'Información actualizada', 'Usuario actualizado exitosamente.', 'success', 'UpdateRecord');
        }
    }

    public function updatePass()
    {
        $validar = $this->validate([
            'password' => 'required|min:8',
            'password_repeat' => 'required|same:password'
        ]);

        if ($validar) {
            if ($this->user_id) {
                $user = User::find($this->user_id);
                $user->update([
                    'password' => $this->password
                ]);
                $this->resetFields();
                $this->dispatch('closeModalMessaje', 'Información actualizada', 'Usuario actualizado exitosamente.', 'success', 'UpdateUserPass');
            }
        }
    }

    public function save()
    {
        $validar = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_repeat' => 'required|same:password'
        ]);
        if ($validar) {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
            ]);
        }
        $this->resetFields();
        $this->dispatch('closeModalMessaje', 'Información guardada', 'Usuario creado exitosamente.', 'success', 'CreateRecord');
    }
}
