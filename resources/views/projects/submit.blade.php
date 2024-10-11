<x-layouts.app>
    <div class="grid grid-cols-3 gap-6">

        <x-submit.submit :authenticated="$authenticated" :technologies="$technologies"/>

        <x-submit.proposals :project="$projects"/>

    </div>
</x-layouts.app>
