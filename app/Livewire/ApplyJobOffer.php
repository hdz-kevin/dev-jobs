<?php

namespace App\Livewire;

use App\Models\JobOffer;
use App\Notifications\NewApplicant;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyJobOffer extends Component
{
    use WithFileUploads;

    public JobOffer $jobOffer;
    #[Validate('required|mimes:pdf')]
    public $cv;

    public function apply()
    {
        $this->validate();
        $this->authorize('apply', $this->jobOffer);

        $cv = $this->cv->store('cvs', 'public');
        auth()->user()->appliedJobs()->attach($this->jobOffer->id, [
            'cv' => $cv,
        ]);
        
        $this
            ->jobOffer
            ->recruiter
            ->notify(new NewApplicant($this->jobOffer->id, $this->jobOffer->title, auth()->id()));

        session()->flash('message', 'Application submitted successfully, good luck!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.apply-job-offer');
    }
}
