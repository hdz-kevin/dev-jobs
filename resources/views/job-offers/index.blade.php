<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('My Job Offers') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      @if ($message = session('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
          {{ $message }}
        </div>
      @endif

      <livewire:list-job-offers />
  </div>
</x-app-layout>
