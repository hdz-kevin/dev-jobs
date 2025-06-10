<div>
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($jobOffers as $jobOffer)
      <div class="md:flex md:justify-between md:items-center p-6 text-gray-900 border-b border-gray-200">
        <div class="space-y-3">
          <a href="#" class="text-xl font-bold">{{ $jobOffer->title }}</a>
          <p class="text-sm text-gray-600 font-bold">{{ $jobOffer->company }}</p>
          {{-- <p>{{ $jobOffer->due_date->format('d-m-Y') }}</p> --}}
          <p class="text-sm text-gray-500">Due date: {{ $jobOffer->due_date->format('Y-m-d') }}</p>
        </div>

        <div class="flex gap-3 items-center justify-start mt-5 md:mt-0">
          <a href="#"
            class="bg-slate-800 text-white py-2 px-4 rounded-lg font-bold text-xs uppercase hover:bg-slate-700 transition-colors">
            Candidates
          </a>

          <a href="{{ route('job-offers.edit', $jobOffer) }}"
            class="bg-blue-800 text-white py-2 px-4 rounded-lg font-bold text-xs uppercase hover:bg-slate-700 transition-colors">
            Update
          </a>

          <button
            wire:click="$dispatch('showAlert', { jobOfferId: {{ $jobOffer->id }} })"
            class="bg-red-600 text-white py-2 px-4 rounded-lg font-bold text-xs uppercase hover:bg-slate-700 transition-colors">
            Delete
          </button>
        </div>
      </div>
    @empty
      <p class="p-3 text-center text-[18px] font-medium text-gray-600">There are no job offers yet.</p>
    @endforelse
  </div>

  <div class="px-5 md:px-0 mt-8">
    {{ $jobOffers->links() }}
  </div>
</div>

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    document.addEventListener('livewire:initialized', () => {
      Livewire.on('showAlert', ({ jobOfferId }) => {
        Swal.fire({
          title: "Delete Job Offer",
          text: "This job offer will be permanently deleted.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            Livewire.dispatch('deleteJobOffer', { jobOffer: jobOfferId });

            Swal.fire({
              title: "Deleted!",
              text: "The job offer has been deleted.",
              icon: "success"
            });
          }
        });
      });
    });
  </script>
@endpush
