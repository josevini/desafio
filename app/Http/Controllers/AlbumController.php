<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function getFormNewAlbum() {
        return view('new-album');
    }

    public function getListView() {
        $albums = $this->listAlbums();
        return view('list', ['albums' => $albums]);
    }

    public function getManageView() {
        $albums = $this->listAlbums();
        return view('manage', ['albums' => $albums]);
    }

    private function getAlbum($column, $value) {
        return Album::query()
            ->firstWhere($column, $value);
    }

    public function addAlbum(Request $request) {
        if (empty($request->name) || empty($request->date)) {
            return redirect()->route('form-new-album');
        } elseif (!empty($this->getAlbum('name', $request->name))) {
            return view('new-album');
        } else {
            $album = new Album();
            $album->name = $request->name;
            $album->date = $request->date;
            $album->save();
            return redirect()->route('home');
        }
    }

    public function listAlbums() {
        return Album::all();
    }

    public function getAlbumsWhere(Request $request) {
        $value = $request->search_value;
        if (empty($value)) {
            return redirect()->route('home');
        }
        $albums = Album::query()->where('name', 'like', "%$value%")->get();
        return view('list', ['albums' => $albums]);

    }

    public function deleteAlbum(Album $album) {
        $album->delete();
        return redirect()->route('home');
    }
}
