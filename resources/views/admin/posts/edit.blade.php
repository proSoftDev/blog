@extends('admin.layouts.app')
@section('title', __('Измените данные поста'))

@section('content')

    @php
        use App\Models\Post;

        /**
         * @var Post $post
         */
    @endphp

    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>@lang('Измените данные поста')</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('admin.partials.breadcrumbs', [
                         'first' => __('Посты'),
                         'first_link' => route('admin.posts.index'),
                         'second' => $post->id,
                         'third' => __('Редактировать'),
                         'active' => 3
                     ])
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page-body start -->
        <div class="page-body">
            <!-- begin row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="mb-3">
                        @include('admin.partials.buttons.back', ['link' => route('admin.posts.index')])
                    </div>

                    @include('admin.partials.errors')

                    {!! Form::open(['route' => ['admin.posts.update', $post->id], 'method' => 'put']) !!}
                        @include('admin.posts._form')
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- Page-body end -->
    </div>
@stop

