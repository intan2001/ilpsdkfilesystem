<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Serahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class recordEntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $serahans = Serahan::all();
        $records = Record::all();

        return view('recordEntry', compact('serahans', 'records'));

    }

    //saveRecord
    public function saveRecord(Request $request)
    {
        try
        {
            $tajukSurat             = $request->tajukSurat;
            $rujukanSurat           = $request->rujukanSurat;
            $rujukanFail            = $request->rujukanFail;
            $tarikhSurat            = $request->tarikhSurat;
            $tarikhTerima           = $request->tarikhTerima;
            $namaOrganisasi         = $request->namaOrganisasi;
            $cacatan                = $request->cacatan;
            $serahan                = $request->serahan;

            $Record = new Record();
            $Record->perkara            = $tajukSurat;
            $Record->rujukan_surat      = $rujukanSurat;
            $Record->rujukan_fail       = $rujukanFail;
            $Record->tarikh_surat       = $tarikhSurat;
            $Record->tarikh_terima      = $tarikhTerima;
            $Record->daripada           = $namaOrganisasi;
            $Record->cacatan            = $cacatan;
            $Record->user_id            = Auth::user()->id;
            $Record->serahan_id         = $serahan;
            $Record->save();

            return back()->withFlashSuccess('The record have been upload successfully!');

        }
        catch(Exception $e)
        {
            return back()->withFlashDanger('FAIL!');

        }

    }
}
