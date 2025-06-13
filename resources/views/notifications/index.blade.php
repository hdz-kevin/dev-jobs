<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ 'Notifications' }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <h1 class="text-2xl font-bold text-center my-8">My Notifications</h1>

          @forelse ($notifications as $notification)
            <div class="lg:flex lg:justify-between lg:items-center border-b border-gray-200 py-4 space-y-1">
              <div>
                <p class="">
                  New candidate for: 
                  <span class="font-semibold">{{ $notification->data['job_offer_title'] }}</span>
                </p>
                <p class="text-sm text-gray-600 font-medium">
                  {{ $notification->created_at->diffForHumans() }}
                </p>
              </div>
              <div>
                <a href="#" class="bg-indigo-500 inline-block text-white p-3 text-sm uppercase font-bold rounded-lg">
                  See Candidate
                </a>
              </div>
            </div>
          @empty
            <p class="text-center text-gray-600">No new notifications</p>
          @endforelse

        </div>
      </div>
    </div>
  </div>
</x-app-layout>


