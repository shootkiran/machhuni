<?php

namespace App\Http\Livewire;

use App\Models\Work;
use Livewire\Component;

class Search extends Component
{
    public $show_search_result = false;
    public $keyword;
    public $results;
    protected $rules = [
        'keyword' => 'required|min:3'
    ];
    protected $queryString = [
        'keyword' => ['except' => ''],
    ];
    public function mount($keyword = null)
    {
        if ($keyword) {
            $this->keyword = $keyword;
        }
        if ($this->keyword) {
            $this->search();
        }
    }
    public function render()
    {
        return view('livewire.search');
    }
    public function search()
    {
        $this->validate();
        $this->show_search_result = true;
        // dd($this->results);
        $this->results = Work::Where('alternative_titles', 'like', "%$this->keyword%")
            ->orWhere('title', "like", "%$this->keyword%")->get();
    }
}
