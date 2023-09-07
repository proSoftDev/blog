@php
    use App\Models\Post;

    /**
     * @var Post $post
     */
@endphp

<div class="card">
    <div class="card-block">
        <div class="row">

            <x-forms.text
                class="form-group col-xs-12 col-sm-12 col-md-12"
                label="{{ __('Название') }}"
                placeholder="{{ __('Введите название поста') }}"
                name="title"
                error_key="title"
                value="{{ isset($post) ? $post->title : null }}"
            />

            <x-forms.textarea
                class="form-group col-xs-12 col-sm-12 col-md-12"
                label="{{ __('Описание') }}"
                placeholder="{{ __('Введите описание поста') }}"
                name="body"
                error_key="body"
                value="{{ isset($post) ? $post->body : null }}"
            />

            <div class="form-group col-xs-12 col-sm-12 col-md-12 m-t-30">
                {!! Form::button('<i class="fa fa-check-circle fa-fw mr-1"></i> ' . __('Сохранить'),
                        ['class' => 'btn btn-outline-success', 'type' => 'submit']) !!}
            </div>
        </div>
    </div>
</div>



