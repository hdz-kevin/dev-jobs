<div>

  <livewire:job-offer-filter-form />

  <div class="py-12">
    <div class="max-w-7xl mx-auto">
      <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
        @forelse ($jobOffers as $jobOffer)
          <div class="md:flex md:justify-between md:items-center py-5">
            <div class="md:flex-1">
              <a
                href="{{ route('job-offers.show', $jobOffer) }}"
                class="text-2xl font-bold text-gray-600"
              >
                {{ $jobOffer->title }}
              </a>
              <p class="text-base text-gray-600">{{ $jobOffer->company }}</p>
              <p class="font-normal text-gray-600">
                Due date to apply:
                <span class="font-medium">{{ $jobOffer->due_date->format('d M Y') }}</span>
              </p>
              <p class="text-base font-medium text-gray-600 mt-1">{{ $jobOffer->salary->salary }}</p>
            </div>
            <div class="">
              <a
                href="{{ route('job-offers.show', $jobOffer) }}"
                class="bg-indigo-500 inline-block mt-2 md:mt-0 text-white py-2 px-3 text-sm uppercase font-bold rounded-lg"
              >
                See Details
              </a>
            </div>
          </div>
        @empty
          <div class="text-center py-10">
            <p class="text-gray-500">No job offers available at the moment.</p>
            {{-- <p class="p-3 text-center text-sm text-gray-600">There are no job offers yet.</p> --}}
          </div>
        @endforelse
      </div>
    </div>
  </div>
</div>
