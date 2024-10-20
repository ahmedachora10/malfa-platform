<section>
    <x-dashboard::tables.base-table :createAction="route('users.create')"
        :columns="['image', 'name', 'email', 'status', 'created at']">

        <x-slot:title>
            <x-dashboard::input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="Search" />
        </x-slot:title>

        @forelse ($users as $user)
        <tr wire:loading.class="opacity-50">
            <td>{{ $user->id }}</td>
            <td>
                <img src="{{ asset($user->thumbnail) }}" class=" rounded-circle" alt="avatar" width="30px"
                    height="30px">
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="#!" wire:click="switchStatus({{$user}})">
                    <x-dashboard::badge :color="$user->status?->color()">{{ $user->status?->label() }}
                    </x-dashboard::badge>
                </a>
            </td>
            <td>{{ $user->created_at->diffForHumans() }}</td>

            <td>
                <x-dashboard::actions.container>
                    <a href="{{ route('users.show', $user->id) }}" class="dropdown-item"> <i
                            class="bx bx-show me-1"></i>
                        Show</a>
                    <x-dashboard::actions.edit :href="route('users.edit', $user->id)">Edit</x-dashboard::actions.edit>
                    <x-dashboard::actions.delete :route="route('users.destroy', $user->id)" />
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
        {{ $users->links() }}
    </div>

</section>
