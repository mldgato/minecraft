<?php

namespace App\Livewire\Teams;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Team;

class ShowTeams extends Component
{
    use WithPagination;

    public $school, $category, $team_name, $team_id;
    public $search;
    public $sort = 'school';
    public $direction = 'asc';
    public $cant = '20';
    public $readyToLoad = false;

    protected $paginationTheme = "bootstrap";

    protected $queryString = [
        'cant' => ['except' => '10'],
        'search' => ['except' => '']
    ];

    protected $listeners = ['render', 'delete', 'save'];

    protected $rules = [
        'school' => 'required',
        'category' => 'required',
        'team_name' => 'required'
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
            $teams = Team::where('school', 'LIKE', '%' . $this->search . '%')
                ->where('team_name', 'LIKE', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $teams = [];
        }
        return view('livewire.teams.show-teams', compact('teams'));
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
            'school',
            'category',
            'team_name'
        ]);
    }

    public function edit($id)
    {
        $team = Team::where('id', $id)->first();
        $this->team_id = $id;
        $this->school = $team->school;
        $this->category = $team->gradcategorye_short_name;
        $this->team_name = $team->team_name;
    }

    public function update()
    {
        $this->validate();
        if ($this->team_id) {
            $team = Team::find($this->team_id);
            $team->update([
                'school' => $this->school,
                'category' => $this->category,
                'team_name' => $this->team_name,
            ]);
            $this->resetFields();
            $this->dispatch('closeModalMessaje', 'Información actualizada', 'Equipo actualizado exitosamente.', 'success', 'UpdateRecord');
        }
    }
}
