
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['shop.destroy', $shop->id], 'method' => 'delete','data--submit'=>'slider'.$shop->id]) }}
<div class="d-flex justify-content-end align-items-center">
    @if(!$shop->trashed())
   
    @if($auth_user->can('slider delete'))
        <a class="mr-3 text-danger" href="{{ route('shop.destroy', $shop->id) }}" data--submit="slider{{$shop->id}}" 
            data--confirmation='true' 
            data--ajax="true"
            data-reload="reload"
            data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.shop') ]) }}"
            title="{{ __('messages.delete_form_title',['form'=>  __('messages.shop') ]) }}"
            data-message='{{ __("messages.delete_msg") }}'>
            <i class="far fa-trash-alt"></i>
        </a>
    @endif

    @endif
    @if(auth()->user()->hasAnyRole(['admin']) && $shop->trashed())
        <a href="{{ route('shop.action',['id' => $shop->id, 'type' => 'restore']) }}"
            title="{{ __('messages.restore_form_title',['form' => __('messages.shop') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.restore_form_title',['form'=>  __('messages.shop') ]) }}"
            data-message='{{ __("messages.restore_msg") }}'
            data-datatable="reload"
            class="mr-2">
            <i class="fas fa-redo text-primary"></i>
        </a>
        <a href="{{ route('shop.action',['id' => $shop->id, 'type' => 'forcedelete']) }}"
            title="{{ __('messages.forcedelete_form_title',['form' => __('messages.shop') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.forcedelete_form_title',['form'=>  __('messages.shop') ]) }}"
            data-message='{{ __("messages.forcedelete_msg") }}'
            data-datatable="reload"
            class="mr-2">
            <i class="far fa-trash-alt text-danger"></i>
        </a>
    @endif
</div>
{{ Form::close() }}