<?php

namespace App\Livewire;

use App\Models\JobOffer;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Livewire\Component;

class JobOffersHome extends Component
{
    public ?string $search_term = null;
    public ?string $category_id = null;
    public ?string $salary_id = null;
    
    #[On('resetFilters')]
    public function resetFilters(?string $search_term, ?string $category_id, ?string $salary_id)
    {
        $this->search_term = $search_term == '' ? null : $search_term;
        $this->category_id = $category_id == '' ? null : $category_id;
        $this->salary_id   = $salary_id   == '' ? null : $salary_id;
    }

    /**
     * Render the job offers with applied filters.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $jobOffers = JobOffer::query()
                        ->when($this->search_term, function (Builder $query) {
                            $query->where('title', 'LIKE', '%'.$this->search_term.'%')
                                    ->orWhere('company', 'LIKE', '%'.$this->search_term.'%');
                        })
                        ->when($this->category_id, function (Builder $query) {
                            $query->where('category_id', $this->category_id);
                        })
                        ->when($this->salary_id, function (Builder $query) {
                            $query->where('salary_id', $this->salary_id);
                        })
                        ->paginate(20);

        return view('livewire.job-offers-home', compact('jobOffers'));
    }
}
