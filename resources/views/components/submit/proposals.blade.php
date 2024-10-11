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
                                <span
                                    class='bg-{{ $item->status->status() === 'ABERTO' ? 'green' : 'red' }}-50 text-{{ $item->status->status() === 'ABERTO' ? 'green' : 'red' }}-600 text-xs font-medium mr-2 px-1.5 rounded py-1'>{{ $item->status->status()}}</span>
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
                    {{--                    <div--}}
                    {{--                        class="whitespace-nowrap uppercase font-bold text-[#C3C3D1] flex items-center space-x-2 px-[8px] py-[4px] rounded-full bg-[#181826] border border-[#1E1E2C] text-[12px]">--}}
                    {{--                        <x-ui.icons.clock class="w-[18px] h-[18px]"/>--}}
                    {{--                        --}}
                    {{--                    </div>--}}
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $project->links() }}
        </div>

    </div>
</x-ui.card>
