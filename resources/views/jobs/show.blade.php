<x-layout >
    <x-slot:title>
        Job {{ $job['id'] }}
    </x-slot:title>
    <x-slot:heading>
        Job Page
    </x-slot:heading>
    Hello World from Job Page

    <h2>     {{ $job['title']}}  </h2>
    <h3>     {{ $job['salary']}}  </h3>
    
    @can('edit',$job)
        <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit"> Edit Job</x-button> 
        </p>
    @endcan

</x-layout>