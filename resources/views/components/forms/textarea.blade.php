<div class="{{ $class ?? null }} @error($errorKey) has-danger @enderror">
    @isset($label)
        {!! Form::label($name, $label,  ['class' => $label_class ?? '']) !!}
        @if((isset($required) && $required) || !isset($required))
            <span class="text-danger">*</span>
        @endif
    @endisset
    {!! Form::textarea($name, $value ?? null,
        [
            'class' => 'form-control ' . ($errors->has($errorKey) ? 'form-control-danger' : ''),
            'id' => $id ?? $errorKey,
            'placeholder' => $placeholder ?? null,
            'rows' => $rows ?? 3,
            'aria-describedby' => "$errorKey-error",
        ])
    !!}
    @error($errorKey)
        <div id="{{ $errorKey }}-error" class="col-form-label">{{ $message }}</div>
    @enderror
</div>
