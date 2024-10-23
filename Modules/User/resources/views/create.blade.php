<x-dashboard::layouts.app>

    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-dashboard::cards.sample column="col-12">

            <div class="row">

                <div class="col-12 mb-3">
                    <x-dashboard::input-group type="file" name="image" :title="trans('dashboard::table.columns.image')" />
                    {{-- <x-size-notice key="user" /> --}}
                </div> {{-- / Name --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard::input-group type="text" name="name" :title="trans('dashboard::table.columns.name')" />
                </div> {{-- / Name --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard::input-group type="email" name="email" :title="trans('dashboard::table.columns.email')" />
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
                <x-dashboard::options.option1 checked type="radio" :title="$item->label()" :value="$item->value" name="status" />
            </div>
            @endforeach


            <div class="col-12">
                <x-dashboard::button type="submit" name="Save" class="btn-primary mt-3" />
            </div>
        </x-dashboard::cards.sample>

    </form>

</x-dashboard::layouts.app>
