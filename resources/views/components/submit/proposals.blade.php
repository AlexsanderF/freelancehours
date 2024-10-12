<x-ui.card>
    <div class="flex items-center justify-between pb-4">
        <div class="flex flex-col ">
            <h2 class="text-[20px] text-white leading-9">
                Projetos Enviado
            </h2>
            <div class="text-[#8C8C9A] text-[12px]">
                {{--                                    Publicado {{ $this->lastProposalTime }}--}}
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <x-ui.icons.people-group class="w-[18px] h-[18px]"/>
            <span>{{ $project->total() }}</span>
        </div>
    </div>

    <div class="py-4">
        <div class="flex flex-col gap-7">
            @foreach( $project as $item )
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <div>
                            @if($item->status->status() !== 'ABERTO')
                                <x-bladewind::tag label="FECHADO" color="red"/>
                            @elseif($item->status->status() !== 'FECHADO')
                                <x-bladewind::tag label="ABERTO" color="green"/>
                            @endif
                        </div>
                        <div>
                            <div class="text-white text-[14px] font-bold tracking-wide truncate w-[140px]">
                                {{ $item->title }}
                            </div>
                            <div class="text-[#8C8C9A] text-[12px]">
                                Enviado {{ $item->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <x-bladewind::dropmenu trigger="cog-6-tooth-icon">
                        </x-bladewind::dropmenu>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $project->links() }}
        </div>

    </div>
</x-ui.card>
