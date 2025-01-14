<section>

    <x-dashboard::headline :title="trans('dashboard::sidebar.jobs')" />

    <x-dashboard::tables.base-table :createAction="route('jobs.create')"
        :columns="['title']">

        {{-- <x-slot:title>
            <x-dashboard::input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title> --}}

        @forelse ($jobs as $item)
        <tr wire:loading.class="opacity-50">
            <td>{{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td>
                <x-dashboard::actions.container>
                    <x-dashboard::actions.edit :href="route('jobs.edit', $item->id)">{{ trans('common.edit') }}
                    </x-dashboard::actions.edit>
                    <x-dashboard::actions.delete :route="route('jobs.destroy', $item)" />
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
        {{ $jobs->links() }}
    </div>

</section>
