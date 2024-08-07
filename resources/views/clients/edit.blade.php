<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <?php
          $breadcrumbs = [
              ['name' => 'Dashboard', 'url' => route('dashboard')],
              ['name' => 'Clients', 'url' => route('clients')],
              ['name' => 'Clients Edit', 'url' => '']
          ];  
          ?>
          <nav class="flex py-2" aria-label="Breadcrumb">
              <ol class="inline-flex items-center space-x-1 md:space-x-3">
                  @foreach($breadcrumbs as $breadcrumb)
                    <li class="inline-flex items-center">
                        <a href="{{ $breadcrumb['url'] }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 1L2 7l5 6" />
                            </svg>
                            {{ $breadcrumb['name'] }}
                        </a>
                        
                    </li>
                  @endforeach
              </ol>
          </nav>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="overflow-x-auto">
                <form action="{{ route('clients.update', $client->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="mb-4">
                      <label for="client_id" class="block text-sm font-medium text-gray-300">Client ID</label>
                      <input type="text" id="client_id" name="client_id" value="{{ $client->client_id }}" class="mt-1 block w-full bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                  </div>
                  <div class="mb-4">
                      <label for="client_name" class="block text-sm font-medium text-gray-300">Client Name</label>
                      <input type="text" id="client_name" name="client_name" value="{{ $client->client_name }}" class="mt-1 block w-full bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                  </div>
                  <div class="flex justify-end">
                      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                  </div>
              </form>
              </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
