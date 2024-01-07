<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session, Hashids, DataTables;

class OffersController extends Controller
{

    public $resource = 'admin/offers';

    public function __construct()
    {
        /*$this->middleware('permission:view products', ['only' => ['index']]);
        $this->middleware('permission:add products', ['only' => ['create','store']]);
        $this->middleware('permission:edit products', ['only' => ['edit','update']]);
        $this->middleware('permission:delete products', ['only' => ['destroy']]);
        $this->middleware('permission:view product stocks', ['only' => ['productStocks','getProductStocks']]);
        $this->middleware('permission:view_comments', ['only' => ['productFeedBack']]);*/
    }

    public function productoffers(Request $request, $productId)
    {
        if($request->ajax())
        {
            $productId = decodeId($productId);
            $offers = Offer::with('product')->whereProductId($productId)->orderBy('updated_at','desc');

            return Datatables::of($offers)
                ->addColumn('name', function ($offer) {
                    return $offer->name;
                })
                ->addColumn('quantity', function ($offer) {
                    return $offer->quantity;
                })
                ->addColumn('price', function ($offer) {
                    return $offer->price;
                })
                ->addColumn('action', function ($offer) {
                    $action = '';
                    if(Auth::user()->can('edit promotions'))
                        $action .= '<a href="' . url('admin/product/offers') . '/' . Hashids::encode($offer->id) . '/edit" class="text-primary" data-toggle="tooltip" title="Edit Promotion"><i class="fa fa-lg fa-edit"></i></a>';
                    if(Auth::user()->can('delete promotions'))
                        $action .= '<a href="' . url('admin/product/delete-offer') . '/' . Hashids::encode($offer->id).'" class="text-danger btn-delete" data-toggle="tooltip" title="Delete Promotion"><i class="fa fa-lg fa-trash"></i></a>';

                    return $action;

                })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['action'])
            ->make(true);
        }
        return view($this->resource.'/index', compact('productId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function createProductoffers($productId)
    {
        return view($this->resource.'/create',compact('productId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProductoffers(Request $request, $id)
    {
        $productId = decodeId($id);
        $this->validate($request, [
            'name' => 'required|max:50',
            'quantity' => 'required',
            'price' => 'required',
            'reward_points' => 'required',
            'status' => 'required'
        ]);

        $requestData = $request->all();
        $requestData['product_id'] = $productId;

        Offer::create($requestData);

        Session::flash('success', 'Offer added!');

        return redirect('admin/product/offers/'.$id.'');
    }

    /**
     * Remove the specified offer from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteOffer($id)
    {
        $id = decodeId($id);

        $offer = Offer::find($id);

        if($offer){
            Offer::whereId($id)->delete();
            $offer->delete();

            $response['message'] = 'Offer deleted!';
            $status = $this->successStatus;
        }else{
            $response['message'] = 'Offer not exist against this id!';
            $status = $this->errorStatus;
        }
        return response()->json(['result'=>$response], $status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function editProductoffer($offer_id)
    {
        $offer_id = decodeId($offer_id);

        $offer = Offer::with('product')->findOrFail($offer_id);
        return view($this->resource.'/edit',compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function updateProductOffer(Request $request, $id)
    {
        $offerId = decodeId($id);

        $this->validate($request, [
            'name' => 'required|max:50',
            'quantity' => 'required',
            'price' => 'required',
            'reward_points' => 'required',
            'status' => 'required'
        ]);

        $requestData = $request->all();

        $offer = Offer::with('product')->findOrFail($offerId);
        $offer->update($requestData);

        Session::flash('success', 'Offer updated!');

        return redirect('admin/product/offers/'.Hashids::encode($offer->product->id).'');
    }
}
