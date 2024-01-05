<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('System Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update the system development information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('project.update', $project) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- System platform -->
        <x-input-label style="margin-bottom: 8px" for="platforms" :value="__('System platform')" />
        <select id="platforms" name="platform" style="margin-top: 8px" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>{{ $project->platform }}</option>
            <option value="Web Application">Web Application</option>
            <option value="Mobile Application">Mobile Application</option>
            <option value="Stand-alone Application">Stand-alone Application</option>
        </select>
        
        <!-- Development methodology -->
        <x-input-label style="margin-bottom: 8px" for="methodologies" :value="__('Development methodology')" />
        <select id="methodologies" name="methodology" style="margin-top: 8px" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>{{ $project->methodology }}</option>
            <option value="Agile">Agile</option>
            <option value="Prototyping">Prototyping</option>
            <option value="Rapid Application Development">Rapid Application Development</option>
            <option value="Waterfall">Waterfall</option>
        </select> 

        <!-- Deployment method -->
        <x-input-label style="margin-bottom: 8px" for="deployment" :value="__('Deployment method')" />
        <div class="flex" style="margin-top: 8px">
            @if($project->deployment == 'Cloud')
                <div class="flex me-4 w-64 items-center ps-4 border border-gray-200 rounded dark:border-gray-700 dark:bg-gray-700">
                    <input checked id="bordered-radio-2" type="radio" value="Cloud" name="deployment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cloud</label>
                </div>
                <div class="flex me-4 w-64 items-center ps-4 border border-gray-200 rounded dark:border-gray-700 dark:bg-gray-700">
                    <input id="bordered-radio-1" type="radio" value="On-premise" name="deployment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">On-premise</label>
                </div>
            @else
                <div class="flex me-4 w-64 items-center ps-4 border border-gray-200 rounded dark:border-gray-700 dark:bg-gray-700">
                    <input id="bordered-radio-2" type="radio" value="Cloud" name="deployment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cloud</label>
                </div>
                <div class="flex me-4 w-64 items-center ps-4 border border-gray-200 rounded dark:border-gray-700 dark:bg-gray-700">
                    <input checked id="bordered-radio-1" type="radio" value="On-premise" name="deployment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">On-premise</label>
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

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