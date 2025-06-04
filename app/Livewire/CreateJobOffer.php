<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class CreateJobOffer extends Component
{
    public string $title;
    public string $salary;
    public string $category;
    public string $company;
    public string $due_date;
    public string $description;
    public $image;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required|string',
        'category' => 'required|string',
        'company' => 'required|string',
        'due_date' => 'required|string',
        'description' => 'required|string',
        'image' => 'required',
    ];

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
