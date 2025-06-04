<form class="md:w-1/2 space-y-5" wire:submit.prevent="storeJobOffer">
  {{-- Title --}}
  <div>
    <x-input-label for="title" :value="__('Title')" />
    <x-text-input
      id="title"
      type="text"
      wire:model.live="title"
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
    <x-input-label for="salary" :value="__('Monthly Salary')" />
    <select
      wire:model.live="salary"
      id="salary"
      class="border-gray-300 focus:border-indigo-400 focus:ring-indigo-400 rounded-md shadow-sm w-full"
    >
      <option value="">Choose Salary</option>
      @foreach ($salaries as $salary)
        <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
      @endforeach
    </select>

    @error('salary')
      <x-single-input-error :message="$message" />
    @enderror
  </div>

  {{-- Category --}}
  <div>
    <x-input-label for="category" :value="__('Category')" />
    <select
      id="category"
      wire:model.live="category"
      class="border-gray-300 focus:border-indigo-400 focus:ring-indigo-400 rounded-md shadow-sm w-full"
    >
      <option value="">Choose Category</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category }}</option>
      @endforeach
    </select>

    {{-- <x-input-error :messages="$errors->get('category')" class="mt-2" /> --}}
    @error('category')
      <x-single-input-error :message="$message" />
    @enderror
  </div>

  {{-- Company --}}
  <div>
    <x-input-label for="company" :value="__('Company')" />
    <x-text-input
      id="company"
      type="text"
      wire:model.live="company"
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
      wire:model.live="due_date"
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
      wire:model.live="description"
      placeholder="Job Description, experience"
      class="border-gray-300 focus:border-indigo-400 focus:ring-indigo-400 rounded-md shadow-sm w-full h-72">
    </textarea>

    @error('description')
      <x-single-input-error :message="$message" />
    @enderror
  </div>

  {{-- Image --}}
  <div>
    <x-input-label for="image" :value="__('Image')" />
    <x-text-input 
      id="image"
      wire:model.live="image"
      type="file"
      class="block mt-1 w-full"
    />

    @error('image')
      <x-single-input-error :message="$message" />
    @enderror
  </div>

  <div class="flex justify-end  ">
    <x-primary-button class="mt-2">
      Add Job Offer
    </x-primary-button>
  </div>
</form>
