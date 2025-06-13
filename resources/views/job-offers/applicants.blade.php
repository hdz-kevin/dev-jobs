<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Job Applicants
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <h1 class="text-2xl font-bold text-center my-8">
            Applicants for: {{ $jobOffer->title }}
          </h1>

          <div class="p-5">
            <ul class="divide-y divide-gray-200">
              @forelse ($jobOffer->applicants as $applicant)
                <li class="p-3 flex items-center">
                  <div class="flex-1 space-y-1">
                    <p class="font-bold text-xl">{{ $applicant->name }}</p>
                    <p class="text-sm text-gray-600 font-medium">{{ $applicant->email }}</p>
                    <p class="text-sm text-gray-600">
                      Applied {{ $applicant->pivot->created_at->diffForHumans() }}
                    </p>
                  </div>
                  <div>
                    <a
                      href="{{ Storage::url($applicant->pivot->cv) }}"
                      class="inline-flex items-center shadow-sm px-2.5 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"
                      target="_blank"
                      rel="noopener noreferrer"
                    >
                      View CV
                    </a>
                  </div>
                </li>
                
              @empty
                <p class="p-3 text-center text-[18px] font-medium text-gray-600">No applicants applied for this job offer yet.</p>
              @endforelse
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
