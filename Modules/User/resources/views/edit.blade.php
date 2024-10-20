<x-dashboard::app-layout>

    <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-dashboard::cards.sample column="col-12">

            <div class="row">

                <div class="col-12 mb-3">
                    <img width="100" height="100" src="{{ asset($user->thumbnail) }}" alt="avatar-{{ $user->name }}" class="img-thumbnail">
                    <x-dashboard::input-group type="file" name="image" :value="$user->image" :title="trans('dashboard::table.columns.image')" />
                    {{-- <x-size-notice key="user" /> --}}
                </div> {{-- / Name --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard::input-group type="text" name="name" :value="$user->name" :title="trans('dashboard::table.columns.name')" />
                </div> {{-- / Name --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard::input-group type="email" name="email" :value="$user->email" :title="trans('dashboard::table.columns.email')" />
                </div> {{-- / Display Name --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard::input-group type="password" name="password" :title="trans('dashboard::table.columns.password')" />
                </div> {{-- / Password --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard::input-group type="password" name="password_confirmation"
                        :title="trans('dashboard::table.columns.password confirmation')" />
                </div> {{-- / Password --}}
            </div>

            <hr class="col-12 my-5">

            @foreach ($status as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
                <x-dashboard::options.option1 type="radio" :title="$item->label()" :checked="$user->status === $item" :value="$item->value" name="status" />
            </div>
            @endforeach


            <div class="col-12">
                <x-dashboard::button type="submit" name="Save" class="btn-primary mt-3" />
            </div>
        </x-dashboard::cards.sample>

    </form>

</x-dashboard::app-layout>
