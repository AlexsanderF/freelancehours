<div class="grid grid-cols-2 gap-4">
    @foreach( $this->projects as $project )
        <a href="{{ route('project.show', $project) }}">
            <x-project-card-simple :project="$project"/>
        </a>
    @endforeach
</div>
