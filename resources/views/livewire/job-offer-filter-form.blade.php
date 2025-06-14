<div class="bg-gray-100 py-5">
  <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold my-5">
    Search and Filter Job Offers
  </h2>

  <div class="max-w-7xl mx-auto">
    <form wire:submit="sendFilters">
      <div class="md:grid md:grid-cols-3 gap-5">
        <div class="mb-5">
          <label for="search_term" class="block mb-1 text-sm text-gray-700 uppercase font-bold">
            Search by Term
          </label>
          <input
            id="search_term"
            type="text"
            wire:model.live="search_term"
            placeholder="Search by Term: e.g. Laravel"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
          />
        </div>

        <div class="mb-5">
          <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Category</label>
          <select wire:model.live="category_id" class="border-gray-300 p-2 w-full">
            <option value="">Select Category</option>

            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-5">
          <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Monthly Salary</label>
          <select wire:model.live="salary_id" class="border-gray-300 p-2 w-full">
            <option value="">Select Salary</option>

            @foreach ($salaries as $salary)
              <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="flex justify-end">
        <input
          type="submit"
          value="Search"
          class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
        />
      </div>
    </form>
  </div>
</div>
