<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    private function getMusic($column, $value) {
        return Music::query()
            ->firstWhere($column, $value);
    }

    public function getFormNewMusic() {
        $albums =  DB::table('albums')->get();
        return view('form.new-music', ['albums' => $albums]);
    }

    public function addMusic(Request $request) {
        if (empty($request->name) || empty($request->album) || empty($request->duration)) {
            return redirect()->route('form-new-music');
        } else if (!empty($this->getMusic('name', $request->name))) {
            return redirect()->route('form-new-music');
        } else {
            $music = new Music();
            $music->name = $request->name;
            $music->album_id = $request->album;
            $music->duration = $request->duration;
            $music->save();
            return redirect()->route('home');
        }
    }

    public function deleteMusic(Music $music) {
        $music->delete();
        return redirect()->route('manage');
    }
}
