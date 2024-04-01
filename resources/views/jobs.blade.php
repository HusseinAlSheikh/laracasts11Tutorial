<x-layout >
    <x-slot:title>
        Jobs
    </x-slot:title>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    Hello World from Jobs Page

    <div class="space-y-4">    
        @foreach ($jobs as $job )
            <a href="/jobs/{{ $job['id'] }}" class="block border border-red-200 px-4 py-2 rounded-lg">
                <div class="font-bold text-blue-500 text=sm">
                    {{ $job->employeer->name }}
                </div>
                <div>
                    <strong > {{ $job['title']}} -- {{ $job->salary}}  </strong>
                </div>
            </a>
        @endforeach
    </ul>


</x-layout>