<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function getFormNewMusic() {
        $albums =  DB::table('albums')->get();
        return view('new-music', ['albums' => $albums]);
    }

    private function getMusic($column, $value) {
        return Music::query()
            ->firstWhere($column, $value);
    }

    public function addMusic(Request $request) {
        if (empty($request->name) || empty($request->album)) {
            return redirect()->route('form-new-music');
        } else if (!empty($this->getMusic('name', $request->name))) {
            return redirect()->route('form-new-music');
        } else {
            $music = new Music();
            $music->name = $request->name;
            $music->album_id = $request->album;
            $music->save();
            return redirect()->route('home');
        }
    }

    public function deleteMusic(Music $music) {
        $music->delete();
        return redirect()->route('home');
    }
}
