<div class="form-group mb-3 {{ $field['class'] ?? 'col-md-6' }} {{ $errors->has($field['name'] ?? null) ? ' has-error' : '' }}">
    <label for="{{ $field['name'] ?? '' }}"
        class="mb-2">{{ strtoupper(trans('dashboard::settings.'.strtolower($field['label'])) ?? '') }}</label>
    <input type="{{ $field['type'] ?? '' }}" name="{{ $field['name'] ?? '' }}"
        value="{{ old($field['name'] ?? '', \setting($field['name'] ?? '')) }}"
        class="form-control {{ $field['class'] ?? '' }}" id="{{ $field['name'] ?? '' }}"
        placeholder="{{ $field['label'] ?? '' }}">

    @if ($errors->has($field['name'] ?? ''))
        <small class="help-block">{{ $errors->first($field['name'] ?? '') }}</small>
    @endif
</div>
