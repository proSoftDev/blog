@extends('admin.layouts.app')
@section('title', __('Заполните данные поста'))

@section('content')

    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>@lang('Заполните данные поста')</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    @include('admin.partials.breadcrumbs', [
                         'first' => __('Посты'),
                         'first_link' => route('admin.posts.index'),
                         'second' => __('Создать'),
                         'active' => 2
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

                    {!! Form::open(['route' => 'admin.posts.store', 'method' => 'post']) !!}
                        @include('admin.posts._form')
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- Page-body end -->
    </div>
@stop

