<!-- resources/views/control-parameters/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Automatic Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <?php
          $breadcrumbs = [
              ['name' => 'Dashboard', 'url' => route('dashboard')],
              ['name' => 'Automatic Control', 'url' => '']
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
          <div class="flex w-full justify-end py-2">
            <a href="{{ route('control-parameters.create') }}" class="border border-white-100 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Tambah</a>
          </div>
            <div class="w-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    {{ __('Parameter Name') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    {{ __('Target Value') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider col-span-2">
                                    {{ __('Actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach($parameters as $parameter)
                                <tr>
                                  <form action="{{ route('control-parameters.update', $parameter->id) }}" method="POST">
                                  @csrf
                                        @method('PUT')
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            <input type="text" name="parameter_name" value="{{ $parameter->parameter_name }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('parameter_name') border-red-500 @enderror" required>
                                            @error('parameter_name')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                            <input type="number" name="target_value" value="{{ $parameter->target_value }}" step="any" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('target_value') border-red-500 @enderror" required>
                                            @error('target_value')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium">
                                            <button type="submit" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">
                                                {{ __('Update') }}
                                            </button>
                                          </td>
                                        </form>
                                        <td>
                                          <form action="{{ route('control-parameters.destroy', $parameter->id) }}" method="POST" class="inline">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">
                                                  {{ __('Delete') }}
                                              </button>
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
</x-app-layout>
