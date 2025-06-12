<div class="p-8">
  <div class="mb-5">
    <h3 class="font-bold text-3xl text-gray-800 my-3">
      {{ $jobOffer->title }}
    </h3>

    <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-8">
      <p class="font-bold text-sm uppercase text-gray-800 my-3">
        Company: <span class="normal-case text-base font-normal">{{ $jobOffer->company }}</span>
      </p>

      <p class="font-bold text-sm uppercase text-gray-800 my-3">
        Due date to apply: <span class="normal-case text-base font-normal">{{ $jobOffer->due_date->toFormattedDateString() }}</span>
      </p>

      <p class="font-bold text-sm uppercase text-gray-800 my-3">
        Category: <span class="normal-case text-base font-normal">{{ $jobOffer->category->category }}</span>
      </p>

      <p class="font-bold text-sm uppercase text-gray-800 my-3">
        Salary: <span class="normal-case text-base font-normal">{{ $jobOffer->salary->salary }}</span>
      </p>
    </div>
  </div>

  <div class="md:grid md:grid-cols-6 md:gap-5">
    <div class="md:col-span-2">
      <img src="{{ Storage::url("/job-offers/".$jobOffer->image) }}" alt="Job Offer Image">
    </div>

    <div class="md:col-span-4">
      <h2 class="text-2xl font-bold mb-5">Job Offer Description</h2>
      <p>{{ $jobOffer->description }}</p>
    </div>
  </div>  

  @guest
    <div class="mt-6 bg-gray-50 border border-dashed p-5 text-center">
      <p>
        Want to apply for this job?
        <a href="{{  route('register') }}" class="font-bold text-indigo-600">Create an account</a>
        and apply to this and other job offers.
      </p>
    </div>
  @endguest

  @if (auth()->user()?->role === \App\Enums\UserRole::DEVELOPER)
    <livewire:apply-job-offer :jobOffer="$jobOffer" />
  @endif
</div>
