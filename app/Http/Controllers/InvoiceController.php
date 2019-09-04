<?php

namespace App\Http\Controllers;

use App\Learn;
use Illuminate\Http\Request;
use \App\Http\Controllers\UserController as UserCtrl;

class InvoiceController extends Controller
{
    public static function isPaid($userId, $classId) {
        $get = Learn::where([
            ['user_id', $userId],
            ['class_id', $classId],
        ])->first();
        return $get->status;
    }
    public function mine() {
        $myData = UserCtrl::me();
        $myId = $myData->id;

        $data = Learn::where([
            ['user_id', $myId],
            ['status', 0],
            ['to_pay', '>', 0]
        ])->with('kelas')->get();

        return view('user.invoice')->with([
            'inv' => $data,
            'myData' => $myData,
        ]);
    }
    public function validateImage($name) {
        $a = explode(".", $name);
        return $a[count($a) - 1];
    }
    public function pay($learnId, Request $req) {
        $inv = Learn::find($learnId)->update(['status' => 1]);
        
        $validateData = $this->validate($req, [
            'evidence' => 'required|image'
        ]);

        $evidence = $req->file('evidence');
        $fileName = $evidence->getClientOriginalName();
        $evidence->storeAs('public/evidences/', $fileName);

        return redirect()->route('user.listKelas');
    }
    public function payPage($id) {
        $myData = UserCtrl::me();
        $invoice = Learn::where('id', $id)->with('kelas')->first();

        return view('user.pay')->with([
            'myData' => $myData,
            'invoice' => $invoice,
        ]);
    }
}
