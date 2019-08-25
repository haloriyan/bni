<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use \App\Http\Controllers\UserController as UserCtrl;

class ClassController extends Controller
{
    public static function myClass($userId) {
        return Kelas::where('user_id', $userId)->get();
    }
    public static function info($classId) {
        return Kelas::where('id', $classId)->first();
    }
    public function store(Request $req) {
        $myData = UserCtrl::me();

        $validateData = $this->validate($req, [
            'cover' => 'image|required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $cover = $req->file('cover');
        $coverFileName = $cover->getClientOriginalName();

        $create = Kelas::create([
            'user_id' => $myData->id,
            'title' => $req->title,
            'description' => $req->description,
            'price' => $req->price,
            'cover' => $coverFileName,
            'tag' => ''
        ]);

        $cover->storeAs('covers/', $coverFileName);

        return redirect()->route('pengajar.kelas');
    }
    public function update($id, Request $req) {
        $validateData = $this->validate($req, [
            'cover' => 'image',
            'title' => 'required',
            'description' => 'required',
        ]);

        $cover = $req->file('cover');

        $kelas = Kelas::find($id);
        $kelas->title = $req->title;
        $kelas->description = $req->description;
        $kelas->price = $req->price;
        if($cover != "") {
            $coverFileName = $cover->getClientOriginalName();
            $kelas->cover = $coverFileName;

            $cover->storeAs('covers/', $coverFileName);
        }
        $kelas->save();

        return redirect()->route('kelas.settings', $id);
    }
    public function delete($id) {
        $class = Kelas::find($id);
        $class->delete();
        
        return "200";
    }
}
