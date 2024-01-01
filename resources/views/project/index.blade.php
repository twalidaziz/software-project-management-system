<x-app-layout>
    <div class="pb-12" style="padding-top: 114px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg border dark:border-gray-600">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Start
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    End
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Platform
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Methodology
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deployment
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($projects as $project)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">
                                        {{ $i++ }}
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $project->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $project->start_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $project->end_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $project->platform }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $project->methodology }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $project->deployment }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('project.edit', $project->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">EDIT</a>
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