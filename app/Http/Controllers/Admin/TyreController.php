<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTyreRequest;
use App\Http\Requests\StoreTyreRequest;
use App\Http\Requests\UpdateTyreRequest;
use App\Models\Category;
use App\Models\ModelCombination;
use App\Models\Ratio;
use App\Models\Size;
use App\Models\Tyre;
use App\Models\Width;
use App\Models\ProductSize;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TyreController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tyre_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tyres = Tyre::with(['model_combinations', 'categoys', 'width', 'ratio', 'size', 'media'])->get();
   
      
        //           Tyre::where('title', 'LIKE', '%SCORPION%')->chunk(200, function($tyres)
        // {
        //     foreach ($tyres as $tyre)
        //     {
        //         $tyre->series =4;
        //         $tyre->save();
        //     }
        // });
   
        
        
        

        return view('admin.tyres.index', compact('tyres'));
    }

    public function create()
    {
        abort_if(Gate::denies('tyre_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//        $model_combinations = ModelCombination::all()->pluck('name', 'id');

        $model_combinations = ModelCombination::all();

        $categoys = Category::all()->pluck('category', 'id');

        $widths = Width::all()->pluck('width', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ratios = Ratio::all()->pluck('ratio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = Size::all()->pluck('size', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tyres.create', compact('model_combinations', 'categoys', 'widths', 'ratios', 'sizes'));
    }

    public function store(StoreTyreRequest $request)
    {
        
        $request['slug']  = Str::slug($request->title, '-');
        $tyre = Tyre::create($request->all());
        $tyre->model_combinations()->sync($request->input('model_combinations', []));
        $tyre->categoys()->sync($request->input('categoys', []));
        if ($request->input('thumbnail', false)) {
            $tyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumbnail'))))->toMediaCollection('thumbnail');
        }

        if ($request->input('banner', false)) {
            $tyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
        }
        
          foreach ($request->input('gallery', []) as $file) {
            $tyre->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gallery');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tyre->id]);
        }

        return redirect()->route('admin.tyres.index');
    }

    public function edit(Tyre $tyre)
    {
        abort_if(Gate::denies('tyre_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//        $model_combinations = ModelCombination::all()->pluck('name', 'id');
        $model_combinations = ModelCombination::all();
        $categoys = Category::all()->pluck('category', 'id');

        $widths = Width::all()->pluck('width', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ratios = Ratio::all()->pluck('ratio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = Size::all()->pluck('size', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tyre->load('model_combinations', 'categoys', 'width', 'ratio', 'size');

        return view('admin.tyres.edit', compact('model_combinations', 'categoys', 'widths', 'ratios', 'sizes', 'tyre'));
    }

    public function update(UpdateTyreRequest $request, Tyre $tyre)
    {
        $tyre->update($request->all());
        $tyre->model_combinations()->sync($request->input('model_combinations', []));
        $tyre->categoys()->sync($request->input('categoys', []));
        if ($request->input('thumbnail', false)) {
            if (!$tyre->thumbnail || $request->input('thumbnail') !== $tyre->thumbnail->file_name) {
                if ($tyre->thumbnail) {
                    $tyre->thumbnail->delete();
                }
                $tyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumbnail'))))->toMediaCollection('thumbnail');
            }
        } elseif ($tyre->thumbnail) {
            $tyre->thumbnail->delete();
        }

        if ($request->input('banner', false)) {
            if (!$tyre->banner || $request->input('banner') !== $tyre->banner->file_name) {
                if ($tyre->banner) {
                    $tyre->banner->delete();
                }
                $tyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
            }
        } elseif ($tyre->banner) {
            $tyre->banner->delete();
        }
        
        
              if (count($tyre->gallery) > 0) {
            foreach ($tyre->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }
        $media = $tyre->gallery->pluck('file_name')->toArray();
        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $tyre->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gallery');
            }
        }
        
        

        return redirect()->route('admin.tyres.index');
    }

    public function show(Tyre $tyre)
    {
        abort_if(Gate::denies('tyre_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tyre->load('model_combinations', 'categoys', 'width', 'ratio', 'size');

        return view('admin.tyres.show', compact('tyre'));
    }

    public function destroy(Tyre $tyre)
    {
        abort_if(Gate::denies('tyre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tyre->delete();

        return back();
    }

    public function massDestroy(MassDestroyTyreRequest $request)
    {
        Tyre::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tyre_create') && Gate::denies('tyre_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Tyre();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
