<x-dashboard::layouts.app>

    <x-dashboard::tab-list :route="route('our-services.update', $ourService)">
        <x-slot:arForm>
            @method('PUT')
            <div class="col-md-6 col-12 mb-3">
                <div class="mb-3">
                    <img src="{{ asset($ourService->thumbnail) }}" alt="image" width="60" height="60" class="img-thumbnail">
                </div>
                <x-dashboard::input-group type="file" name="image" :title="trans('dashboard::table.columns.image')" />
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-dashboard::input-group type="text" name="title[ar]" :value="$ourService->getTranslation('title', 'ar')"
                    :title="trans('dashboard::table.columns.title')" />
            </div>

            <div class="col-12 mb-3">
                <x-dashboard::input-group type="text" name="description[ar]" :value="$ourService->getTranslation('description', 'ar')"
                    :title="trans('dashboard::table.columns.description')" />
            </div>
        </x-slot:arForm>

        <x-slot:enForm>
            <div class="col-md-6 col-12 mb-3">
                <x-dashboard::input-group type="text" name="title[en]" :value="$ourService->getTranslation('title', 'en')"
                    :title="trans('dashboard::table.columns.title')" />
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-dashboard::input-group type="text" name="description[en]" :value="$ourService->getTranslation('description', 'en')"
                    :title="trans('dashboard::table.columns.description')" />
            </div>
        </x-slot:enForm>
    </x-dashboard::tab-list>

</x-dashboard::layouts.app>
