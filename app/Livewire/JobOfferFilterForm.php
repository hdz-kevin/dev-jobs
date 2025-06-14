<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class JobOfferFilterForm extends Component
{
    public ?string $search_term = null;
    public ?string $category_id = null;
    public ?string $salary_id = null;

    public function sendFilters()
    {
        $this->dispatch('resetFilters', $this->search_term, $this->category_id, $this->salary_id);
    }

    public function render()
    {
        $categories = Category::all();
        $salaries = Salary::all();
        
        return view('livewire.job-offer-filter-form', compact('categories', 'salaries'));
    }
}
