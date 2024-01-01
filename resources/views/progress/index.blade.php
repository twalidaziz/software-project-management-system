<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Project
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Remarks
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Updated
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($progress as $p)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $p->project->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $p->status }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $p->remarks }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $p->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $p->updated_at }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('progress.show', $p->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">EDIT</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>