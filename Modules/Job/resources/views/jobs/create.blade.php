<x-dashboard::app-layout>

   <x-dashboard::tab-list :route="route('jobs.store')">
    <x-slot:arForm>
        <div class="col-md-6 col-12 mb-3">
            <x-dashboard::input-group type="text" name="title[ar]" :title="trans('dashboard::table.columns.title')" />
        </div>
    </x-slot:arForm>

    <x-slot:enForm>
        <div class="col-md-6 col-12 mb-3">
            <x-dashboard::input-group type="text" name="title[en]" :title="trans('dashboard::table.columns.title')" />
        </div>
    </x-slot:enForm>
</x-dashboard::tab-list>

</x-dashboard::app-layout>
