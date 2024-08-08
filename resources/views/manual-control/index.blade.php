<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manual Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <?php
            $breadcrumbs = [
                ['name' => 'Dashboard', 'url' => route('dashboard')],
                ['name' => 'Manual Control', 'url' => '']
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
                    <table id="actuator-table" class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Actuator
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Actuator Topic Name
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    State
                                </th>
                            </tr>
                        </thead>
                        <tbody id="actuator-body">
                            <!-- Actuator rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const apiEndpoint = '/api/actuator-data';
            const latestEndpoint = '/api/actuator-data/latest';
            const tableBody = document.getElementById('actuator-body');

            async function fetchData() {
                try {
                    const response = await fetch(latestEndpoint);
                    const data = await response.json();
                    populateTable(data);
                } catch (error) {
                    console.error('Error fetching actuator data:', error);
                }
            }

            function populateTable(data) {
                tableBody.innerHTML = '';
                data.forEach(actuator => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">${actuator.topic_id}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">${actuator.topic_name}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                            <input type="checkbox" class="actuator-toggle" data-topic-id="${actuator.topic_id}" ${actuator.actuator_state === 'on' ? 'checked' : ''}>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });

                document.querySelectorAll('.actuator-toggle').forEach(toggle => {
                    toggle.addEventListener('change', async function () {
                        const topicId = this.getAttribute('data-topic-id');
                        const newState = this.checked ? 'on' : 'off';
                        console.log('toggle pada topik '+topicId+' diubah ke ' + newState);
                        try {
                            await fetch(apiEndpoint, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({ 
                                  topic_id: topicId, 
                                  actuator_state: newState,
                                  timestamp: new Date().toISOString() 
                                }),
                            }).then(response => {
                              console.log(response);
                            });
                        } catch (error) {
                            console.error('Error updating actuator state:', error);
                        }
                    });
                });
            }

            fetchData();

            setInterval(fetchData, 5000);
        });
    </script>
</x-app-layout>
