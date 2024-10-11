<x-ui.card class="col-span-2 ">
    <div class="flex items-start justify-between pb-4">
        <div class="flex flex-col gap-[16px]">
            <h1 class="text-[28px] text-white leading-9">
                Enviar Projeto
            </h1>
            <div class="text-[#8C8C9A] text-[14px] leading-6">
                Publicação em: {{ date('d M Y H:i:s') }}
            </div>
        </div>

    </div>

    <div class="py-4 description">
        <form method="post" action="{{ route('submitprojects.store') }}" class="max-w-6xl mx-auto "
              enctype="multipart/form-data">
            @csrf

            <textarea>

            </textarea>

            <div class="py-4 space-y-4">
                <hr class="bg-[#10101E] divide-[#1E1E2C] divide-y rounded-[10px] border-[#1E1E2C] border">
                <div class="uppercase font-bold text-[#8C8C9A] text-[12px]">Selecione as Tecnologias</div>

                <div
                    class="uppercase font-bold text-white flex items-center space-x-4 px-[8px] p-[10px] bg-[#181826] border border-[#1E1E2C]">
                    @forelse( $technologies as $item )
                        <label class="tech-option space-x-2">
                            <input type="checkbox" name="technologies[]" value="{{ $item->name }}"
                                   onchange="toggleSelection(this)">
                            <x-dynamic-component component="ui.icons.{{ $item->name }}" class="w-5 h-5"/>
                            <span class="text-[12px] tracking-wider">{{ $item->name }}</span>
                        </label>
                    @empty
                        <p>Não existe tecnologias cadastradas. :/</p>
                    @endforelse
                </div>

            </div>

            <div class="flex justify-between">
                <div class="pt-4 space-y-4">

                    <div class="uppercase font-bold text-[#8C8C9A] text-[12px]">Publicação Por</div>
                    <hr class="bg-[#10101E] divide-[#1E1E2C] divide-y rounded-[10px] border-[#1E1E2C] border">
                    <div class="flex gap-[8px] items-center">
                        <div>
                            <x-ui.avatar src="{{ $authenticated->avatar }}"/>
                        </div>

                        <div>
                            <div class="text-white text-[14px] font-bold tracking-wide">
                                {{ $authenticated->name }}
                            </div>
                            <div class="flex items-center space-x-[4px]">
                                @foreach (range(1, $authenticated->rating) as $i)
                                    <x-ui.icons.star class="h-[14px]"/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="m-5">
                        <button type="submit" class="bg-[#5354FD] text-white font-bold tracking-wide uppercase px-8 py-3 rounded-[4px]
                    hover:bg-[#1f20a6] transition duration-300 ease-in-out w-full">
                            Enviar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-ui.card>
