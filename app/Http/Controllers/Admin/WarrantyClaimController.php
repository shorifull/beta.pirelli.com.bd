<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyWarrantyClaimRequest;
use App\Http\Requests\StoreWarrantyClaimRequest;
use App\Http\Requests\UpdateWarrantyClaimRequest;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Retailer;
use App\Models\WarrantyClaim;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WarrantyClaimController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('warranty_claim_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $warrantyClaims = WarrantyClaim::with(['product_name', 'product_size', 'retailer', 'media'])->get();

        return view('admin.warrantyClaims.index', compact('warrantyClaims'));
    }

    public function create()
    {
        abort_if(Gate::denies('warranty_claim_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_names = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_sizes = ProductSize::all()->pluck('size', 'id')->prepend(trans('global.pleaseSelect'), '');

        $retailers = Retailer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.warrantyClaims.create', compact('product_names', 'product_sizes', 'retailers'));
    }

    public function store(StoreWarrantyClaimRequest $request)
    {
        $warrantyClaim = WarrantyClaim::create($request->all());

        if ($request->input('invoice_attachment', false)) {
            $warrantyClaim->addMedia(storage_path('tmp/uploads/' . basename($request->input('invoice_attachment'))))->toMediaCollection('invoice_attachment');
        }

        foreach ($request->input('photos', []) as $file) {
            $warrantyClaim->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $warrantyClaim->id]);
        }

        return redirect()->route('admin.warranty-claims.index');
    }

    public function edit(WarrantyClaim $warrantyClaim)
    {
        abort_if(Gate::denies('warranty_claim_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_names = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_sizes = ProductSize::all()->pluck('size', 'id')->prepend(trans('global.pleaseSelect'), '');

        $retailers = Retailer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $warrantyClaim->load('product_name', 'product_size', 'retailer');

        return view('admin.warrantyClaims.edit', compact('product_names', 'product_sizes', 'retailers', 'warrantyClaim'));
    }

    public function update(UpdateWarrantyClaimRequest $request, WarrantyClaim $warrantyClaim)
    {
        $warrantyClaim->update($request->all());

        if ($request->input('invoice_attachment', false)) {
            if (!$warrantyClaim->invoice_attachment || $request->input('invoice_attachment') !== $warrantyClaim->invoice_attachment->file_name) {
                if ($warrantyClaim->invoice_attachment) {
                    $warrantyClaim->invoice_attachment->delete();
                }
                $warrantyClaim->addMedia(storage_path('tmp/uploads/' . basename($request->input('invoice_attachment'))))->toMediaCollection('invoice_attachment');
            }
        } elseif ($warrantyClaim->invoice_attachment) {
            $warrantyClaim->invoice_attachment->delete();
        }

        if (count($warrantyClaim->photos) > 0) {
            foreach ($warrantyClaim->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $warrantyClaim->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $warrantyClaim->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.warranty-claims.index');
    }

    public function show(WarrantyClaim $warrantyClaim)
    {
        abort_if(Gate::denies('warranty_claim_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $warrantyClaim->load('product_name', 'product_size', 'retailer');

        return view('admin.warrantyClaims.show', compact('warrantyClaim'));
    }

    public function destroy(WarrantyClaim $warrantyClaim)
    {
        abort_if(Gate::denies('warranty_claim_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $warrantyClaim->delete();

        return back();
    }

    public function massDestroy(MassDestroyWarrantyClaimRequest $request)
    {
        WarrantyClaim::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('warranty_claim_create') && Gate::denies('warranty_claim_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new WarrantyClaim();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
