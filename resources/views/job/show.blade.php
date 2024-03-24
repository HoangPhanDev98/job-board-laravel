<x-layout>
    <x-breadcrumbs :links="['Jobs' => route('jobs.index'), $job->title => '#']"></x-breadcrumbs>
    <x-job-card :$job></x-job-card>
</x-layout>
