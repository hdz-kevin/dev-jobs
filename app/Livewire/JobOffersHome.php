<?php

namespace App\Livewire;

use App\Models\JobOffer;
use Livewire\Component;

class JobOffersHome extends Component
{
    public function render()
    {
        $jobOffers = JobOffer::all();
        
        return view('livewire.job-offers-home', compact('jobOffers'));
    }
}
