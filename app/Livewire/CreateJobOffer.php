<?php

namespace App\Livewire;

use App\Models\JobOffer;
use App\Models\Salary;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class CreateJobOffer extends Component
{
    use WithFileUploads;
    
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
    #[Validate('required|image|max:2048')]
    public $image;

    public function __construct() { }

    /**
     * Store a newly created job offer in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $data = $this->validate();

        $image = $this->image->store('job-offers', 'public');
        $imageName = Str::replace('job-offers/', '', $image);
        $data['image'] = $imageName;

        JobOffer::create([
            ...$data, 'user_id' => auth()->id()
        ]);

        session()->flash('message', 'Job offer created successfully.');

        return redirect()->route('job-offers.index');
    }

    public function render()
    {
        return view('livewire.create-job-offer', [
            'salaries' => Salary::all('id', 'salary'),
            'categories' => Category::all('id', 'category'),
        ]);
    }
}
