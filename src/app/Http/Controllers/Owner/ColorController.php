<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Product;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function (Request $request, Closure $next) {

            $id = $request->route()->parameter('color');

            if (!is_null($id)) {
                $colorsOwnerId = Color::findOrFail($id)->owner->id;
                $colorId = (int)$colorsOwnerId;
                if ($colorId !== Auth::id()) {
                    abort(404);
                }
            }

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::where('owner_id', Auth::id())
        ->orderBy('updated_at','desc')
        ->paginate(24);

        return view('owner.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('owner.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadImageRequest $request)
    {
        $request->validate([
            'name' => ['string', 'max:30'],
        ]);

        $imageFile = $request->file('image');
        $fileNameToStore = ImageService::upload($imageFile, 'colors');


        Color::create([
            'owner_id' => Auth::id(),
            'filename' => $fileNameToStore,
            'name' => $request->name
        ]);

        return redirect()
        ->route('owner.colors.index')
        ->with(['message' => 'カラー登録を実施しました。',
        'status' => 'info']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $color = Color::findOrFail($id);

        return view('owner.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['string', 'max:30'],
        ]);

        $color = Color::findOrFail($id);
        $color->name = $request->name;

        $color->save();

        return redirect()
        ->route('owner.colors.index')
        ->with(['message' => 'カラー情報を更新しました。',
        'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::findOrFail($id);

        $colorInProducts = Product::where('color_id', $color->id)->get();

        if ($colorInProducts) {
            $imageInProducts->each(function($product) use($color){
                if ($product->color_id === $color->id) {
                    $product->color_id = null;
                    $product->save();
                }
            });
        }

        $filePath ='colors/' . $color->filename;

        if (Storage::disk('s3')->exists($filePath)) {
            Storage::disk('s3')->delete($filePath);
        }

        Color::findOrFail($id)->delete();

        return redirect()
        ->route('owner.colors.index')
        ->with(['message' => '画像を削除しました。',
        'status' => 'alert']);
    }
}
