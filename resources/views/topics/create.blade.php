<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Topics') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <?php
          $breadcrumbs = [
              ['name' => 'Dashboard', 'url' => route('dashboard')],
              ['name' => 'Topics', 'url' => route('topics')],
              ['name' => 'Topics Edit', 'url' => '']
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
                <form action="{{ route('topics.store') }}" method="POST">
                  @csrf
                  @method('POST')
                  <div class="mb-4">
                      <label for="topic_name" class="block text-sm font-medium text-gray-300">Topic Name</label>
                      <input type="text" id="topic_name" name="topic_name" class="mt-1 block w-full bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="mb-4">
                      <label for="client_id" class="block text-sm font-medium text-gray-300">Client</label>
                      <div class="relative inline-block w-full text-gray-700 dark:text-gray-200">
                      <select name="client_id" id="clientSelect" class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                          @foreach($clients as $client)
                              <option value="{{ $client->id }}">{{ $client->client_id }} | {{ $client->client_name }}</option>
                          @endforeach
                      </select>
                  </div>
                  </div>
                  <div class="flex justify-end">
                      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
                  </div>
              </form>
              </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
