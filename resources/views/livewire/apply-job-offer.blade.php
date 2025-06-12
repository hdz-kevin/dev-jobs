<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
  <h3 class="text-center text-2xl font-bold my-4">
    Apply for: <span class="text-indigo-600">{{ $jobOffer->title }}</span>
  </h3>

  @if ($message = session('message'))
    <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-3 my-5 text-sm">
      {{ $message }}
    </p>
  @endif

  {{-- JobOfferPolicy --}}
  @can('apply', $jobOffer)
    <form class="w-96 mt-5" wire:submit="apply">
      <div class="mb-4 space-y-3">
        <x-input-label for="cv" :value="__('CV (PDF)')" />
        <x-text-input
          id="cv"
          wire:model="cv"
          type="file"
          accept=".pdf"
          class="block mt-1 w-full"
        />

        @error('cv')
          <x-single-input-error :message="$message" />
        @enderror
      </div>

      <div class="flex justify-end">
        <x-primary-button>
          Apply
        </x-primary-button>
      </div>
    </form>
  @else
    <p class="text-gray-800 uppercase font-bold my-3">
      You applied for this job offer. We will contact you soon if you are selected.
    </p>
  @endcan
</div>
