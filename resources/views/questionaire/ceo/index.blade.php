<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('ceo-questionaire-archive') }}
    @endsection

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Date') }}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider pr-9">
                                            {{ __('Results') }}
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($questionaires as $questionaire)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $questionaire->created_at->format('d/m/Y') }}</div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                                <a href="{{ route('ceo.show', $questionaire->id) }}" class="bg-indigo-50 text-indigo-500 px-5 py-2 rounded-full">
                                                    {{ __('View') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @if ($questionaires->total() > $questionaires->perPage())
                                <hr>
                                <div class="px-5 py-3 bg-gray-50">
                                    {!! $questionaires->links() !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @livewire('questionaires.ceo')
    </div>
</x-app-layout>
