<x-dashboard::layouts.app>

    <x-dashboard::tab-list :route="route('jobs.update', $job)">
        <x-slot:arForm>
            @method('PUT')
            <div class="col-md-6 col-12 mb-3">
                <x-dashboard::input-group type="text" name="title[ar]" :value="$job->getTranslation('title', 'ar')"
                    :title="trans('dashboard::table.columns.title')" />
            </div>
        </x-slot:arForm>

        <x-slot:enForm>
            <div class="col-md-6 col-12 mb-3">
                <x-dashboard::input-group type="text" name="title[en]" :value="$job->getTranslation('title', 'en')"
                    :title="trans('dashboard::table.columns.title')" />
            </div>
        </x-slot:enForm>
    </x-dashboard::tab-list>

</x-dashboard::layouts.app>
