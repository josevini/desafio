<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function listAll() {
        $albums = DB::table('albums')->get(['id', 'name', 'date']);
        $musics = DB::table('musics')->get(['id', 'name', 'album_id', 'duration']);
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
        if (empty($request->search_value)) {
            return redirect()->route('home');
        } else {
            $value = $request->search_value;
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

    public function test() {

    }
}
