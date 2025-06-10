<form class="md:w-1/2 space-y-5" wire:submit="update">
  {{-- Title --}}
  <div>
    <x-input-label for="title" :value="__('Title')" />
    <x-text-input
      id="title"
      type="text"
      wire:model.blur="title"
      :value="old('title')"
      autocomplete="title"
      autofocus
      placeholder="Backend Web Developer" class="block mt-1 w-full"
    />

    {{-- <x-input-error :messages="$errors->get('title')" class="mt-2" /> --}}
    @error('title')
      <x-single-input-error :message="$message" />
    @enderror
  </div>

  {{-- Salary --}}
  <div>
    <x-input-label for="salary_id" :value="__('Monthly Salary')" />
    <select
      wire:model.blur="salary_id"
      id="salary_id"
      class="border-gray-300 focus:border-indigo-400 focus:ring-indigo-400 rounded-md shadow-sm w-full"
    >
      <option value="">Choose Salary</option>
      @foreach ($salaries as $salary)
        <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
      @endforeach
    </select>

    @error('salary_id')
      <x-single-input-error :message="$message" />
    @enderror
  </div>

  {{-- Category --}}
  <div>
    <x-input-label for="category_id" :value="__('Category')" />
    <select
      id="category_id"
      wire:model.blur="category_id"
      class="border-gray-300 focus:border-indigo-400 focus:ring-indigo-400 rounded-md shadow-sm w-full"
    >
      <option value="">Choose Category</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category }}</option>
      @endforeach
    </select>

    {{-- <x-input-error :messages="$errors->get('category')" class="mt-2" /> --}}
    @error('category_id')
      <x-single-input-error :message="$message" />
    @enderror
  </div>

  {{-- Company --}}
  <div>
    <x-input-label for="company" :value="__('Company')" />
    <x-text-input
      id="company"
      type="text"
      wire:model.blur="company"
      :value="old('company')"
      autocomplete="company"
      placeholder="Ex. Netflix, Uber, Shopify" class="block mt-1 w-full"
    />

    @error('company')
      <x-single-input-error :message="$message" />
    @enderror
  </div>

  {{-- Due Date --}}
  <div>
    <x-input-label for="due_date" :value="__('Due Date to Apply')" />
    <x-text-input
      id="due_date"
      type="date"
      wire:model.blur="due_date"
      :value="old('due_date')"
      class="block mt-1 w-full"
    />

    @error('due_date')
      <x-single-input-error :message="$message" />
    @enderror
  </div>

  {{-- Description --}}
  <div>
    <x-input-label for="description" :value="__('Description')" />

    <textarea
      id="description"
      wire:model.blur="description"
      placeholder="Job Description, experience"
      class="border-gray-300 focus:border-indigo-400 focus:ring-indigo-400 rounded-md shadow-sm w-full h-72"
      ></textarea>

    @error('description')
      <x-single-input-error :message="$message" />
    @enderror
  </div>

  {{-- Image --}}
  <div>
    <x-input-label for="new_image" :value="__('Image')" />
    <x-text-input 
      id="new_image"
      wire:model="new_image"
      type="file"
      accept="image/*"
      class="block mt-1 w-full"
    />

    <div class="my-5 w-80 space-y-2">
      <x-input-label :value="__('Current Image:')" />

      <img src="{{ asset('storage/job-offers/'.$image) }}" alt="{{ $title.' image' }}">
    </div>

    <div class="my-5 w-80 space-y-2">
      @if ($new_image)
        <x-input-label for="new_image" :value="__('New Image:')" />
        <img src="{{ $new_image->temporaryUrl() }}" alt="job offer image">
      @endif
    </div>

    @error('new_image')
      <x-single-input-error :message="$message" />
    @enderror
  </div>

  <div class="flex justify-end  ">
    <x-primary-button class="mt-2">
      Save Changes
    </x-primary-button>
  </div>
</form>
