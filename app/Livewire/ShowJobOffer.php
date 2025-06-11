<?php

namespace App\Livewire;

use App\Models\JobOffer;
use Livewire\Component;

class ShowJobOffer extends Component
{
    public JobOffer $jobOffer;
    
    public function render()
    {
        return view('livewire.show-job-offer');
    }
}
