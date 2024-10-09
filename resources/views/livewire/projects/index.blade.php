<div>

    @foreach( $this->projects as $project )
        <li>
            <a href="{{ route('project.show', $project) }}">
                {{$project->id}} . {{ $project->title }}
            </a>
        </li>
    @endforeach
</div>
