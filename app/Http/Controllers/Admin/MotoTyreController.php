<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMotoTyreRequest;
use App\Http\Requests\StoreMotoTyreRequest;
use App\Http\Requests\UpdateMotoTyreRequest;
use App\Models\Category;
use App\Models\MotoBrand;
use App\Models\MotoEngine;
use App\Models\MotoModel;
use App\Models\MotoRatio;
use App\Models\MotoSize;
use App\Models\MotoTyre;
use App\Models\MotoWidth;
use App\Models\ProductSize;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MotoTyreController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('moto_tyre_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoTyres = MotoTyre::with(['moto_brand', 'moto_model', 'moto_engine', 'moto_width', 'moto_size', 'moto_ratio', 'categories', 'media'])->get();
        
        
        // foreach ($motoTyres as $key=> $tyre) {
        // $tyreSize = new ProductSize;
        // $tyreSize->size = $tyre->moto_width->width.'/'.$tyre->moto_ratio->ratio.' R'.$tyre->moto_size->size;
        // $tyreSize->product_id = 7;
        // $tyreSize->save();
        // }
        
        
        //       MotoTyre::where('title', 'LIKE', '%Diablo Rosso iii%')->chunk(200, function($motoTyres)
        // {
        //     foreach ($motoTyres as $tyre)
        //     {
        //         $tyre->pattern =3;
        //         $tyre->save();
        //     }
        // });
        
        
        
        

        return view('admin.motoTyres.index', compact('motoTyres'));
    }

    public function create()
    {
        abort_if(Gate::denies('moto_tyre_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $moto_brands = MotoBrand::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        $moto_models = MotoModel::all()->pluck('model', 'id')->prepend(trans('global.pleaseSelect'), '');

        $moto_engines = MotoEngine::all()->pluck('engine', 'id')->prepend(trans('global.pleaseSelect'), '');

        $moto_widths = MotoWidth::all()->pluck('width', 'id')->prepend(trans('global.pleaseSelect'), '');

        $moto_sizes = MotoSize::all()->pluck('size', 'id')->prepend(trans('global.pleaseSelect'), '');

        $moto_ratios = MotoRatio::all()->pluck('ratio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('category', 'id');

        return view('admin.motoTyres.create', compact('moto_brands', 'moto_models', 'moto_engines', 'moto_widths', 'moto_sizes', 'moto_ratios', 'categories'));
    }

    public function store(StoreMotoTyreRequest $request)
    {
        
        $request['slug']  = Str::slug($request->title, '-');
        $motoTyre = MotoTyre::create($request->all());
        
        $motoTyre->categories()->sync($request->input('categories', []));
        if ($request->input('thumbnail', false)) {
            $motoTyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumbnail'))))->toMediaCollection('thumbnail');
        }

        if ($request->input('banner', false)) {
            $motoTyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
        }
        
            foreach ($request->input('gallery', []) as $file) {
            $motoTyre->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gallery');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $motoTyre->id]);
        }

        return redirect()->route('admin.moto-tyres.index');
    }

    public function edit(MotoTyre $motoTyre)
    {
        abort_if(Gate::denies('moto_tyre_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $moto_brands = MotoBrand::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        $moto_models = MotoModel::all()->pluck('model', 'id')->prepend(trans('global.pleaseSelect'), '');

        $moto_engines = MotoEngine::all()->pluck('engine', 'id')->prepend(trans('global.pleaseSelect'), '');

        $moto_widths = MotoWidth::all()->pluck('width', 'id')->prepend(trans('global.pleaseSelect'), '');

        $moto_sizes = MotoSize::all()->pluck('size', 'id')->prepend(trans('global.pleaseSelect'), '');

        $moto_ratios = MotoRatio::all()->pluck('ratio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('category', 'id');

        $motoTyre->load('moto_brand', 'moto_model', 'moto_engine', 'moto_width', 'moto_size', 'moto_ratio', 'categories');

        return view('admin.motoTyres.edit', compact('moto_brands', 'moto_models', 'moto_engines', 'moto_widths', 'moto_sizes', 'moto_ratios', 'categories', 'motoTyre'));
    }

    public function update(UpdateMotoTyreRequest $request, MotoTyre $motoTyre)
    {
        $motoTyre->update($request->all());
        $motoTyre->categories()->sync($request->input('categories', []));
        if ($request->input('thumbnail', false)) {
            if (!$motoTyre->thumbnail || $request->input('thumbnail') !== $motoTyre->thumbnail->file_name) {
                if ($motoTyre->thumbnail) {
                    $motoTyre->thumbnail->delete();
                }
                $motoTyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumbnail'))))->toMediaCollection('thumbnail');
            }
        } elseif ($motoTyre->thumbnail) {
            $motoTyre->thumbnail->delete();
        }

        if ($request->input('banner', false)) {
            if (!$motoTyre->banner || $request->input('banner') !== $motoTyre->banner->file_name) {
                if ($motoTyre->banner) {
                    $motoTyre->banner->delete();
                }
                $motoTyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
            }
        } elseif ($motoTyre->banner) {
            $motoTyre->banner->delete();
        }
        
            if (count($motoTyre->gallery) > 0) {
            foreach ($motoTyre->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }
        $media = $motoTyre->gallery->pluck('file_name')->toArray();
        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $motoTyre->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gallery');
            }
        }

        return redirect()->route('admin.moto-tyres.index');
    }

    public function show(MotoTyre $motoTyre)
    {
        abort_if(Gate::denies('moto_tyre_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoTyre->load('moto_brand', 'moto_model', 'moto_engine', 'moto_width', 'moto_size', 'moto_ratio', 'categories');

        return view('admin.motoTyres.show', compact('motoTyre'));
    }

    public function destroy(MotoTyre $motoTyre)
    {
        abort_if(Gate::denies('moto_tyre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoTyre->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotoTyreRequest $request)
    {
        MotoTyre::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('moto_tyre_create') && Gate::denies('moto_tyre_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MotoTyre();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
