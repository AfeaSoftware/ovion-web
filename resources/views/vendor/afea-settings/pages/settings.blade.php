<x-filament-panels::page>
    <form wire:submit="save" class="grid gap-y-6">
        {{ $this->form }}

        <div class="flex flex-wrap items-center gap-3 justify-start">
            @foreach ($this->getFormActions() as $action)
                {{ $action }}
            @endforeach
        </div>
    </form>
</x-filament-panels::page>
