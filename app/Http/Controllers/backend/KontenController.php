<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KontenController extends Controller
{
    public function index()
    {
        return view('backend.konten.index');
    }

    public function create()
    {
        return view('backend.konten.add');
    }

    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'title' => 'required|unique:konten,title',
                'content' => 'required|string',
                'image' => 'required|image|mimes:jpg,png,jpeg,webp,svgfile|max:5120',
            ],
            [
                'title.required' => 'Silakan isi judul terlebih dahulu!',
                'title.unique' => 'Judul sudah tersedia!',
                'content.required' => 'Silakan isi konten terlebih dahulu!',
                'image.required' => 'Silakan isi foto terlebih dahulu!',
                'image.image' => 'File harus berupa gambar!',
                'image.mimes' => 'Gambar yang diunggah harus dalam format JPG, PNG, JPEG, WEBP, atau SVG.',
                'image.max' => 'Maksimal ukuran foto 5 MB',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $randomFileName = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('konten/', $randomFileName, 'public');

                    $konten = new Konten();
                    $konten->title = $request->title;
                    $konten->content = $request->content;
                    $konten->image = $randomFileName;
                    $slug = strtolower($request->title);
                    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
                    $konten->slug = $slug;
                    $konten->status = 0;
                    $konten->user_id = auth()->user()->id;
                    $konten->save();

                    return response()->json($konten);
                }
            } else {
                return response()->json(['errors' => ['image' => 'File image tidak ditemukan']]);
            }
        }
    }
}
