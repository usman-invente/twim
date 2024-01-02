<x-master-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3 flex-wrap gap-3">
                            <h5 class="font-weight-bold">{{ $pageTitle ?? __('messages.list') }}</h5>
                            @if ($auth_user->can('slider list'))
                            @endif
                            <a href="{{ route('shop.index') }}" class="float-right btn btn-sm btn-primary"><i
                                    class="fa fa-angle-double-left"></i> {{ __('messages.back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{ Form::model($shopdata, ['method' => 'POST', 'route' => 'shop.store', 'enctype' => 'multipart/form-data', 'data-toggle' => 'validator', 'id' => 'slider']) }}
                        {{ Form::hidden('id') }}
                        <div class="row">
                            <div class="form-group col-md-4">
                                {{ Form::label('title', __('messages.title') . ' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                                {{ Form::text('title', old('title'), ['placeholder' => __('messages.title'), 'class' => 'form-control', 'required']) }}
                                <small class="help-block with-errors text-danger"></small>
                            </div>




                            <div class="form-group col-md-6">
                                <label class="form-control-label" for="shop_image">{{ __('messages.image') }} </label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" accept="image/*">
                                    <label
                                        class="custom-file-label upload-label">{{ __('messages.choose_file', ['file' => __('messages.image')]) }}</label>
                                </div>
                                <span class="selected_file"></span>
                            </div>

                            {{-- @if (getMediaFileExit($shopdata, 'shop_image'))
                            
                                <div class="col-md-2 mb-2">
                                    <img id="shop_image_preview" src="{{ getSingleMedia($shopdata, 'shop_image') }}" alt="#"
                                        class="attachment-image mt-1">
                                    <a class="text-danger remove-file"
                                        href="{{ route('remove.file', ['id' => $shopdata->id, 'type' => 'shop_image']) }}"
                                        data--submit="confirm_form" data--confirmation='true' data--ajax="true"
                                        data-toggle="tooltip"
                                        title='{{ __('messages.remove_file_title', ['name' => __('messages.image')]) }}'
                                        data-title='{{ __('messages.remove_file_title', ['name' => __('messages.image')]) }}'
                                        data-message='{{ __('messages.remove_file_msg') }}'>
                                        <i class="ri-close-circle-line"></i>
                                    </a>
                                </div>
                            @endif --}}

                            <div class="form-group col-md-4">
                                {{ Form::label('select-category', __('messages.select-category') . ' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                                <select name="category_id" class="form-control" required>
                                    <option value="1">Pakistan Prodict</option>
                                    <option value = "2">Moroco Prodict</option>
                                </select>
                                <small class="help-block with-errors text-danger"></small>
                            </div>



                            {{-- <div class="form-group col-md-12">
                                    {{ Form::label('description',__('messages.description'), ['class' => 'form-control-label']) }}
                                    {{ Form::textarea('description', null, ['class'=>"form-control textarea" , 'rows'=>3  , 'placeholder'=> __('messages.description') ]) }}
                                </div> --}}
                        </div>

                        {{ Form::submit(__('messages.save'), ['class' => 'btn btn-md btn-primary float-right']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
