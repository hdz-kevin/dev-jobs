<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateJobOffer extends Component
{
    use WithFileUploads;
    
    #[Validate('required|string')]
    public string $title;
    #[Validate('required|string')]
    public string $salary;
    #[Validate('required|string')]
    public string $category;
    #[Validate('required|string')]
    public string $company;
    #[Validate('required|string')]
    public string $due_date;
    #[Validate('required|string')]
    public string $description;
    #[Validate('required|image|max:2048')]
    public $image;

    public function __construct() { }

    public function storeJobOffer()
    {
        $data = $this->validate();
    }

    public function render()
    {
        return view('livewire.create-job-offer', [
            'salaries' => Salary::all('id', 'salary'),
            'categories' => Category::all('id', 'category'),
        ]);
    }
}
