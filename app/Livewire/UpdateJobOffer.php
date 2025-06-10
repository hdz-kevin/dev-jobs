<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\JobOffer;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class UpdateJobOffer extends Component
{
    use WithFileUploads;

    public int $jobOfferId;
    #[Validate('required|string')]
    public string $title;
    #[Validate('required|integer')]
    public int $salary_id;
    #[Validate('required|integer')]
    public int $category_id;
    #[Validate('required|string')]
    public string $company;
    #[Validate('required|string')]
    public string $due_date;
    #[Validate('required|string')]
    public string $description;
    #[Validate('nullable|image|max:2048')]
    public $new_image;

    public string $image;

    public function mount(JobOffer $jobOffer)
    {
        foreach ($jobOffer->getAttributes() as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }

        $this->jobOfferId = $jobOffer->id;
    }

    public function update() {
        $data = $this->validate();

        $jobOffer = JobOffer::findOrFail($this->jobOfferId);
        return response()->json($jobOffer);

        if (!is_null($this->new_image)) {
            $imagePath = $this->new_image->store('job-offers', 'public');
            $data['image'] = Str::replace('job-offers/', '', $imagePath);

            $oldImagePath = public_path('storage/job-offers/'.$jobOffer->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $jobOffer->update($data);

        session()->flash('message', 'Job offer updated successfully.');
        return redirect()->route('job-offers.index');
    }

    public function render()
    {
        $salaries = Salary::all('id', 'salary');
        $categories = Category::all('id', 'category');

        return view('livewire.update-job-offer', [
            'salaries' => $salaries,
            'categories' => $categories,
        ]);
    }
}
