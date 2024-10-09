<div class="grid grid-cols-2 gap-4">
    @foreach( $this->projects as $project )
        <a href="{{ route('project.show', $project) }}">
            <x-projects.simple-card :project="$project"/>
        </a>
    @endforeach
</div>
