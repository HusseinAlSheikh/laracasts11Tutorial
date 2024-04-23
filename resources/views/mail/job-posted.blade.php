<h2>{{ $job->title }}</h2> 

<p>
    You job now live on website

    salary {{ $job->salary }}
</p>
<p>
    <a href="{{ url('jobs',$job->id) }}">Visit Your Job</a>
</p>