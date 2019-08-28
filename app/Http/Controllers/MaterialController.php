<?php

namespace App\Http\Controllers;

use Storage;
use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public static function getMaterialClass($classId) {
        return Material::where('class_id', $classId)->orderBy('updated_at')->get();
    }
    public function store($classId, Request $req) {
        $validateData = $this->validate($req, [
            'video' => 'required|mimes:mp4',
            'title' => 'required'
        ]);

        $video = $req->file('video');
        $videoFileName = $video->getClientOriginalName();

        $material = Material::create([
            'class_id' => $classId,
            'title' => $req->title,
            'video' => $videoFileName,
        ]);

        $video->storeAs('videos/', $videoFileName);

        return redirect()->route('kelas.material', $classId);
    }
    public function delete($id, Request $req) {
        $classId = '';
        $material = Material::find($id);
        $classId = $material->class_id;

        $deleteFile = Storage::delete('videos/'.$material->video);
        $material->delete();

        return redirect()->route('kelas.material', $classId);
    }
}
