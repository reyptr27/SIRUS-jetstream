<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;              
use Livewire\WithPagination;          

class TeamsTable extends Component
{
    
    use WithPagination;
    
    // protected $paginationTheme = 'tailwind';
    
    public $selectAll = false;
    public $selectedTeams = [];
    
    public function render()
    {
        return view('livewire.teams-table')->with([
            'teams' => Team::with('user')->paginate(3)
        ]);
    }
    
    public function deleteSelected()
    {
        Team::whereIn('id', $this->selectedTeams)->delete();
        $this->selectedTeams = []; // Reset selected teams after deletion
    }
}
