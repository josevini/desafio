<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function listAll() {
        $albums = DB::table('albums')->get(['id', 'name', 'date']);
        $musics = DB::table('musics')->get(['id', 'name', 'album_id']);
        return view('list', [
            'albums' => $albums,
            'musics' => $musics
        ]);
    }

    public function manageAll() {
        $albums = DB::table('albums')->get(['id', 'name', 'date']);
        $musics = DB::table('musics')->get(['id', 'name', 'album_id']);
        return view('manage', [
            'albums' => $albums,
            'musics' => $musics
        ]);
    }

    public function listWhere(Request $request) {
        $value = $request->search_value;
        if (empty($value)) {
            return redirect()->route('home');
        } else {
            $allMusics = [];
            $allAlbums = DB::table('albums')
                ->where('name', 'like', "%$value%")
                ->get();
        }
        foreach ($allAlbums as $album) {
            foreach (DB::table('musics')->where('album_id', $album->id)->get() as $music) {
                $allMusics[] = $music;
            }
        }
        return view('list', [
            'albums' => $allAlbums,
            'musics' => $allMusics
        ]);
    }
}
