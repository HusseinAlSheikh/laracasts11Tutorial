<x-layout >
    <x-slot:title>
        Jobs
    </x-slot:title>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    Hello World from Jobs Page

    <ul>    
        @foreach ($jobs as $job )
            <a href="/jobs/{{ $job['id'] }}">
                <li > {{ $job['title']}} -- {{ $job->salary}}  </li>
            </a>
        @endforeach
    </ul>


</x-layout>