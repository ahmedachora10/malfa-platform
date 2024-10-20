<section>

    <x-dashboard::headline :title="trans('dashboard::sidebar.activities')" />

    <x-dashboard::tables.base-table :columns="['user', 'type' ,'activity', 'created at']">

        {{-- <x-slot:title>
            <x-dashboard::input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title> --}}

        <x-slot:actions>
            <label class=" badge bg-warning mx-3">
                {{trans('common.total')}} : {{ $activities->total() }}
            </label>
        </x-slot:actions>

        @forelse ($activities as $item)
        @php
        $type = $item->event;
        @endphp
        <tr wire:loading.class="opacity-50">
            <td>{{ $item->id }}</td>
            <td>
                <x-dashboard::badge color="secondary">{{ $item->causer?->name ?? '-' }}</x-dashboard::badge>
            </td>
            <td>
                <x-dashboard::badge color="primary"> {{ trans('common.'.$type) }} </x-dashboard::badge>
            </td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
            <td>
                <x-dashboard::actions.container>
                    <x-dashboard::actions.delete wire:click="delete({{ $item }})" :livewire="true" />
                </x-dashboard::actions.container>
            </td>
        </tr>
        @empty
        <tr>
            <td>{{ trans('dashboard::table.empty') }}</td>
        </tr>
        @endforelse
    </x-dashboard::tables.base-table>

    <div class="mt-4">
        {{ $activities->links() }}
    </div>


</section>
