<div class="{{ $class }} @error($errorKey) has-danger @enderror">
    @isset($label)
        {!! Form::label($name, $label,  ['class' => $label_class ?? '']) !!}
        @if((isset($required) && $required) || !isset($required))
            <span class="text-danger">*</span>
        @endif
    @endisset
    {!! Form::number($name, $value ?? null,
        [
            'class' => 'form-control ' . ($errors->has($errorKey) ? 'form-control-danger' : ''),
            'id' => $id ?? $errorKey,
            'placeholder' => $placeholder ?? null,
            'step' => $step ?? 1,
            'min' => $min ?? 0,
            'aria-describedby' => "$errorKey-error",
        ])
    !!}
    @error($errorKey)
        <div id="{{ $errorKey }}-error" class="col-form-label">{{ $message }}</div>
    @enderror
</div>
