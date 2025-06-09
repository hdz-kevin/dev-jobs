<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\JobOffer;
use App\Models\Salary;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateJobOffer extends Component
{
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

    public string $image;

    public function mount(JobOffer $jobOffer)
    {
        foreach ($jobOffer->getAttributes() as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
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
