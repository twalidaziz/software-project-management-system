<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Project Stakeholders') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update project's stakeholders including the development team.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="#" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex space-x-4" style="margin-bottom: 2px">
            <x-input-label class="w-1/2" for="owners" :value="__('System owner')" />
            <x-input-label class="w-1/2" for="owners" :value="__('Person in charge')" />
        </div>
        <div class="flex space-x-4" style="margin-top: 2px">
            <!-- System owner selector -->
            <select id="owners" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>{{ $project->businessUnit->name }}</option>
                @foreach($businessUnits as $bu)
                    <option value="{{ $bu->id }}">{{ $bu->name }}</option>
                @endforeach
            </select> 

            <!-- Person in charge selector -->
            <select id="owners" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>{{ $personInCharge->name }}</option>
                @foreach($otherPersonsInCharge as $opic)
                    <option value="{{ $opic->id }}">{{ $opic->name }}</option>
                @endforeach
            </select> 
        </div>
        
        <!-- Other developers -->
        <div class="flex space-x-4" style="margin-bottom: 2px">
            <x-input-label class="w-1/2" for="owners" :value="__('Assign a developer')" />
        </div>
        <div class="flex space-x-4 w-1/2" style="margin-top: 2px">
            <select id="owners" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Select a member</option>
                @foreach($otherDevelopers as $od)
                    <option value="{{ $od->id }}">{{ $od->name }}</option>
                @endforeach
            </select>  
            <button type="submit" class="text-white uppercase bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Add
            </button>       
        </div>

        <!-- Development team -->
        <div class="flex space-x-4" style="margin-bottom: 2px">
            <x-input-label class="w-1/2" for="owners" style="margin-bottom: 9px" :value="__('Development team')" />
        </div>
        <div class="flex space-x-4" style="margin-top: 2px">
            <div class="relative overflow-x-auto w-full shadow-md sm:rounded-lg  border dark:border-gray-600" style="margin-top: 9px">
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
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($developmentTeam as $member)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    {{ $i++ }}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $member->name }}
                                </th>
                                <td class="px-6 py-4">
                                    @if($member->user_level == 1)
                                        Manager
                                    @elseif($member->lead_developer == true)
                                        Lead Developer
                                    @else
                                        Developer
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $member->email }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
        </div>

        <div class="flex items-center gap-4 mt-6">
            <x-primary-button> {{ __('Save') }}</x-primary-button>

            @if (session('status') === 'project-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>