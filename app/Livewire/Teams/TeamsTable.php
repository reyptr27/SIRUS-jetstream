<?php

namespace App\Livewire\Teams;

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
        $teams = Team::with('user')->paginate(3);
        
        return view('livewire.teams.teams-table', [
            'teams' => $teams,
        ]);
    }
    
    public function deleteSelected()
    {
        Team::whereIn('id', $this->selectedTeams)->delete();
        $this->selectedTeams = []; // Reset selected teams after deletion
    }
}
