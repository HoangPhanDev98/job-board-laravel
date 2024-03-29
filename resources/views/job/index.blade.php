<x-layout>
    <x-breadcrumbs :links="['Jobs' => route('jobs.index')]"></x-breadcrumbs>

    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">
                        Search
                    </div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Salary
                    </div>
                    <div class="flex space-x-2">
                        <x-text-input name="minSalary" value="{{ request('minSalary') }}" placeholder="From" />
                        <x-text-input name="maxSalary" value="{{ request('maxSalary') }}" placeholder="To" />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Experience
                    </div>

                    <x-radio-group name="experience" :options="\App\Models\Job::$experience"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Category
                    </div>

                    <x-radio-group name="category" :options="\App\Models\Job::$categories"/>
                </div>
            </div>

            <button class="w-full">Filters</button>
        </form>
    </x-card>

    @foreach ($jobs as $job)
        <x-job-card :$job>
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
