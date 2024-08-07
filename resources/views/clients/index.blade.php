<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="overflow-x-auto">
                  <div class="flex w-full justify-end py-2">
                    <a href="{{ route('clients.create') }}" class="border border-white-100 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Tambah</a>
                  </div>
                  <table class="w-full bg-gray-800 border border-gray-700">
                      <thead>
                          <tr>
                              <th class="px-4 py-2 border-b border-gray-700">ID</th>
                              <th class="px-4 py-2 border-b border-gray-700">Client ID</th>
                              <th class="px-4 py-2 border-b border-gray-700">Client Name</th>
                              <th class="px-4 py-2 border-b border-gray-700">Created At</th>
                              <th class="px-4 py-2 border-b border-gray-700">Updated At</th>
                              <th class="px-4 py-2 border-b border-gray-700">Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($clients as $client)
                              <tr>
                                  <td class="px-4 py-2 border-b border-gray-700">{{ $client->id }}</td>
                                  <td class="px-4 py-2 border-b border-gray-700">{{ $client->client_id }}</td>
                                  <td class="px-4 py-2 border-b border-gray-700">{{ $client->client_name }}</td>
                                  <td class="px-4 py-2 border-b border-gray-700">{{ $client->created_at }}</td>
                                  <td class="px-4 py-2 border-b border-gray-700">{{ $client->updated_at }}</td>
                                  <td class="px-4 py-2 border-b border-gray-700">
                                    <a href="{{ route('clients.edit', $client->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                    </form>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
