<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('absence-company-overview') }}
    @endsection

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="pb-10">
                <div class="relative overflow-auto h-96 shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                EMPLOYEE
                            </th>
                            <th scope="col" class="px-6 py-3">
                                FROM
                            </th>
                            <th scope="col" class="px-6 py-3">
                                TO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                APPROVED
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($absences as $absence)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $absence->user->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $absence->date_from->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $absence->date_to->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($absence->approved === NULL)
                                            <div class="bg-yellow-50 text-yellow-500 rounded-full p-1 w-7">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                                </svg>
                                            </div>
                                        @endif

                                        @if($absence->approved === true)
                                            <div class="bg-green-50 text-green-500 rounded-full p-1 w-7">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        @endif

                                        @if($absence->approved === false)
                                            <div class="bg-pink-50 text-pink-500 rounded-full p-1 w-7">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="">
                <livewire:absence.company-overview-calendar
                    before-calendar-view="calendar/before-calendar-view"
                />
            </div>
        </div>
    </div>
</x-app-layout>

