
<form action="{{ $route }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- <h6 class="mt-4"> </h6> --}}
    <div class="nav-align-top mb-3">
        <ul class="nav nav-tabs" role="tablist">
            @foreach (config('app.locales') as $locale)
                <li class="nav-item" role="presentation">
                    <a href="#" @class(['nav-link', 'active' => $loop->first]) data-bs-toggle="tab" data-bs-target="#headline-content-{{$locale}}" role="tab"
                        aria-selected="{{$loop->first}}">{{
                        trans('common.'.$locale) }}</a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="headline-content-ar" role="tabpanel">
                <div class="row g-3">
                    {{$arForm}}
                </div>
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ trans('common.save')
                        }}</button>
                </div>
            </div>

            <div class="tab-pane" id="headline-content-en" role="tabpanel">
                <div class="row g-3">
                    {{$enForm}}
                </div>
            </div>
        </div>
    </div>
</form>
