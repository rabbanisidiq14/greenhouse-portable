<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
