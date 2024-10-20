<section>
    <x-dashboard::tables.base-table :columns="['phone', 'created at']">

        <x-slot:title>
            <x-dashboard::input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="Search" />
        </x-slot:title>

        @forelse ($subscribers as $item)
        <tr wire:loading.class="opacity-50">
            <td>{{ $item->id }}</td>
            <td>
                <x-dashboard::badge color="primary">{{ $item->phone }}</x-dashboard::badge>
            </td>
            <td>{{ $item->created_at->diffForHumans() }}</td>

            <td>
                <x-dashboard::actions.container>
                    <x-dashboard::actions.delete :route="route('subscribers.destroy', $item->id)" />
                </x-dashboard::actions.container>
            </td>
        </tr>
        @empty
        <tr>
            <td>{{trans('dashboard::table.empty')}}</td>
        </tr>
        @endforelse
    </x-dashboard::tables.base-table>

    <div class="mt-4">
        {{ $subscribers->links() }}
    </div>

</section>
