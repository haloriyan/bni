<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Learn;
use Illuminate\Http\Request;
use \App\Http\Controllers\UserController as UserCtrl;
use \App\Http\Controllers\InvoiceController as InvCtrl;
use \App\Http\Controllers\MaterialController as MateriCtrl;

class ClassController extends Controller
{
    // user
    public static function mine($myId) {
        return Learn::where([
            ['status', 1],
            ['user_id', $myId]
        ])->with('kelas.users')->get();
    }
    // pengajar
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

        $cover->storeAs('public/covers/', $coverFileName);

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

            $cover->storeAs('public/covers/', $coverFileName);
        }
        $kelas->save();

        return redirect()->route('kelas.settings', $id);
    }
    public function delete($id) {
        $class = Kelas::find($id);
        $class->delete();
        
        return "200";
    }
    public static function search($term) {
        $myData = UserCtrl::me();
        $notMine = ['user_id', 'LIKE', '%%'];
        if($myData != "") {
            $myId = $myData;
            $notMine = ['user_id', '!=', $myId];
        }
        return Kelas::where([
            ['title', 'LIKE', '%'.$term.'%'],
            $notMine,
        ])->with('users')->get();
    }
    public function isJoined($userId, $classId) {
        $get = Learn::where([
            ['class_id', $classId],
            ['user_id', $userId],
        ])->count();

        return $get == 0 ? 0 : 1;
    }
    public function detail($id) {
        $myData = UserCtrl::me();
        $kelas = Kelas::find($id);
        $materials = MateriCtrl::getMaterialClass($kelas->id);

        $isJoined = $this->isJoined($myData->id, $kelas->id);
        $isPaid = "";
        if($isJoined) {
            $isPaid = InvCtrl::isPaid($myData->id, $kelas->id);
        }

        return view('detailKelas')->with([
            'classData' => $kelas,
            'myData' => $myData,
            'materials' => $materials,
            'isJoined' => $isJoined,
            'isPaid' => $isPaid,
        ]);
    }
    public function join($id, Request $req) {
        $classId = $req->classId;
        $myId = UserCtrl::me()->id;

        $joining = Learn::create([
            'user_id' => $myId,
            'class_id' => $classId,
            'status' => 0,
        ]);
        
        return redirect()->route('user.listKelas');
    }
}
