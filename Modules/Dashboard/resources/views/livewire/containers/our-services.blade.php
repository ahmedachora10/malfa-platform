<section>

    <x-dashboard::headline :title="trans('dashboard::sidebar.our services')" />

    <x-dashboard::tables.base-table :createAction="route('our-services.create')"
        :columns="['image', 'title', 'description']">

        {{-- <x-slot:title>
            <x-dashboard::input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title> --}}

        @forelse ($services as $item)
        <tr wire:loading.class="opacity-50">
            <td>{{ $item->id }}</td>
            <td><img src="{{ asset($item->thumbnail) }}" alt="logo" width="40" height="40" class="rounded-circle"></td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->description }}</td>
            <td>
                <x-dashboard::actions.container>
                    <x-dashboard::actions.edit :href="route('our-services.edit', $item->id)">{{ trans('common.edit') }}
                    </x-dashboard::actions.edit>
                    <x-dashboard::actions.delete :route="route('our-services.destroy', $item)" />
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
        {{ $services->links() }}
    </div>

</section>
