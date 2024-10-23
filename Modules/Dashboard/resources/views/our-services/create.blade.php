<x-dashboard::layouts.app>

   <x-dashboard::tab-list :route="route('our-services.store')">
    <x-slot:arForm>
        <div class="col-md-6 col-12 mb-3">
            <x-dashboard::input-group type="file" name="image" :title="trans('dashboard::table.columns.image')" />
        </div>

        <div class="col-md-6 col-12 mb-3">
            <x-dashboard::input-group type="text" name="title[ar]" :title="trans('dashboard::table.columns.title')" />
        </div>

        <div class="col-12 mb-3">
            <x-dashboard::input-group type="text" name="description[ar]" :title="trans('dashboard::table.columns.description')" />
        </div>
    </x-slot:arForm>

    <x-slot:enForm>
        <div class="col-md-6 col-12 mb-3">
            <x-dashboard::input-group type="text" name="title[en]" :title="trans('dashboard::table.columns.title')" />
        </div>

        <div class="col-md-6 col-12 mb-3">
            <x-dashboard::input-group type="text" name="description[en]" :title="trans('dashboard::table.columns.description')" />
        </div>
    </x-slot:enForm>
</x-dashboard::tab-list>

</x-dashboard::layouts.app>
