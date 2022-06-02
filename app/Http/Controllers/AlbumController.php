<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    private function getAlbum($column, $value) {
        return Album::query()
            ->firstWhere($column, $value);
    }

    public function getFormNewAlbum() {
        return view('form.new-album');
    }

    public function addAlbum(Request $request) {
        if (empty($request->name) || empty($request->date)) {
            return redirect()->route('form-new-album');
        } elseif (!empty($this->getAlbum('name', $request->name))) {
            return view('form.new-album');
        } else {
            $album = new Album();
            $album->name = $request->name;
            $album->date = $request->date;
            $album->save();
            return redirect()->route('home');
        }
    }

    public function deleteAlbum(Album $album) {
        $album->delete();
        return redirect()->route('manage');
    }
}
