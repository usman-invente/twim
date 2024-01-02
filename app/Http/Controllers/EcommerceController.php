<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index(Request $request)
    {
        $filter = [
            'status' => $request->status,
        ];
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.shop')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return view('shop.index', compact('pageTitle','auth_user','assets','filter'));
    }

    public function index_data(DataTables $datatable,Request $request)
    {
         $query = Shop::with('category');
        $filter = $request->filter;

        if (isset($filter)) {
            if (isset($filter['column_status'])) {
                $query->where('status', $filter['column_status']);
            }
        }
       
        return $datatable->eloquent($query)
            ->addColumn('check', function ($row) {
                return '<input type="checkbox" class="form-check-input select-table-row"  id="datatable-row-'.$row->id.'"  name="datatable_ids[]" value="'.$row->id.'" data-type="slider" onclick="dataTableRowCheck('.$row->id.',this)">';
            })
            
            ->editColumn('title', function($query){                
                if (auth()->user()->can('slider edit')) {
                    $link = '<a class="btn-link btn-link-hover" href='.route('shop.create', ['id' => $query->id]).'>'.$query->title.'</a>';
                } else {
                    $link = $query->title; 
                }
                return $link;
            })

            ->editColumn('category.name', function($query){                
                $link = $query->category->name ?? ''; 
                return $link;
            })

            // ->editColumn('status' , function ($query){
            //     $disabled = $query->deleted_at ? 'disabled': '';
            //     return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
            //         <div class="custom-switch-inner">
            //             <input type="checkbox" class="custom-control-input bg-primary change_status" '.$disabled.' data-type="slider_status" '.($query->status ? "checked" : "").' value="'.$query->id.'" id="'.$query->id.'" data-id="'.$query->id.'">
            //             <label class="custom-control-label" for="'.$query->id.'" data-on-label="" data-off-label=""></label>
            //         </div>
            //     </div>';
            // })
            // ->editColumn('type_id' , function ($query){
            //     return ($query->type_id != null && isset($query->service)) ? $query->service->name : '';
            // })
            // ->filterColumn('type_id',function($query,$keyword){
            //     $query->whereHas('service',function ($q) use($keyword){
            //         $q->where('name','like','%'.$keyword.'%');
            //     });
            // })
            ->addColumn('action', function($shop){
                return view('shop.action',compact('shop'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['title','action','check','category'])
            ->toJson();
    }

    public function shop(){

    }
    public function bulk_action(Request $request)
    {
        $ids = explode(',', $request->rowIds);

        $actionType = $request->action_type;

        $message = 'Bulk Action Updated';
        switch ($actionType) {
            case 'change-status':
                $branches = Shop::whereIn('id', $ids)->update(['status' => $request->status]);
                $message = 'Bulk Slider Status Updated';
                break;

            case 'delete':
                Shop::whereIn('id', $ids)->delete();
                $message = 'Bulk Slider Deleted';
                break;
                
            case 'restore':
                Shop::whereIn('id', $ids)->restore();
                $message = 'Bulk Slider Restored';
                break;
                
            case 'permanently-delete':
                Shop::whereIn('id', $ids)->forceDelete();
                $message = 'Bulk Slider Permanently Deleted';
                break;

            case 'restore':
                Shop::whereIn('id', $ids)->restore();
                $message = 'Bulk Provider Restored';
                break;
                
            case 'permanently-delete':
                Shop::whereIn('id', $ids)->forceDelete();
                $message = 'Bulk Provider Permanently Deleted';
                break;

            default:
                return response()->json(['status' => false, 'message' => 'Action Invalid']);
                break;
        }

        return response()->json(['status' => true, 'message' => 'Bulk Action Updated']);
    }
    public function create(Request $request)
    {
        $id = $request->id;
        $auth_user = authSession();

        $shopdata = Shop::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.shop')]);
        
        if($shopdata == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.shop')]);
            $shopdata = new Shop;
        }
        
        return view('shop.create', compact('pageTitle' ,'shopdata' ,'auth_user' ));
    }
    public function store(Request $request)
    {
       
        $shopData = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'shop_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath =  public_path('images/shop'); // Update with your actual image storage path
            $image->move($imagePath, $imageName);
            $shopData['image'] = $imageName;
        }

		$shopData['id']  = $request->id;

        $result = Shop::updateOrCreate(['id' => $request->id], $shopData);
        
       

        $message = __('messages.update_form',[ 'form' => __('messages.slider') ] );
		if($result->wasRecentlyCreated){
			$message = __('messages.save_form',[ 'form' => __('messages.slider') ] );
		}
        if($request->is('api/*')) {
            return comman_message_response($message);
		}
		return redirect(route('shop.index'))->withSuccess($message);
    }
    public function destroy($id)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $shop = Shop::find($id);
        $msg = __('messages.msg_fail_to_delete',['item' => __('messages.shop')] );
        
        if($shop!='') {        
            $shop->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.shop')] );
        }
        return comman_custom_response(['message'=> $msg, 'status' => true]);
    }
    public function action(Request $request){
        $id = $request->id;

        $shop  = Shop::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.shop')] );
        if($request->type == 'restore') {
            $shop->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.shop')] );
        }

        if($request->type === 'forcedelete'){
            $shop->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.shop')] );
        }
        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }
}
