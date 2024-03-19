<x-layout >
    <x-slot:title>
        Job {{ $job['id'] }}
    </x-slot:title>
    <x-slot:heading>
        Job Page
    </x-slot:heading>
    Hello World from Job Page

    <h2>     {{ $job['title']}}  </h2>


</x-layout>