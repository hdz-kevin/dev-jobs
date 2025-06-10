<?php

namespace App\Livewire;

use App\Models\JobOffer;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ListJobOffers extends Component
{
    #[On('deleteJobOffer')]
    public function deleteJobOffer(JobOffer $jobOffer)
    {
        $jobOffer->delete();

        return response()->json([
            'message' => 'Job offer deleted successfully.',
            'status' => 'success',
        ]);
    }

    public function __construct() { }
    
    public function render()
    {
        $jobOffers = JobOffer::where('user_id', Auth::id())->paginate(10);

        return view('livewire.list-job-offers', compact('jobOffers'));
    }
}
