<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serahan;
use Illuminate\Support\Facades\DB;

class SerahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $serahans = Serahan::all();

        return view('serahan', compact('serahans'));
    }

    //saveSerahan
    public function saveSerahan(Request $request)
    {
        try
        {
            $serahanNew = $request->serahanNew;


            $Serahan = new Serahan();
            $Serahan->nama_serahan = $serahanNew;
            $Serahan->save();

            return back()->withFlashSuccess('The serahan have been add successfully!');

        }
        catch(\Exception $e)
        {
            return back()->withFlashDanger('Fail!');

        }

        $request->validate([
            'serahanNew'=>'required|unique:crud'
        ]);

        $query = DB::table('serahans')->insert([
            'nama_serahan'=>$request->input('serahanNew)')
        ]);

        if($query)
        {
            return back()->withFlashSuccess('The serahan have been add successfully!');
        }
        else
        {
            return back()->withFlashDanger('Fail!');
        }
    }

    function edit($id)
    {
        $row = DB::table('serahans')
                ->where('id', $id)
                ->first();

        $data = [
            'Info'=>$row,
        ];

        return view('editSerahan', $data);
    }

    function update(Request $request)
    {
        $request->validate([
            'serahanNew'=>'required'
        ]);

        $updating = DB::table('serahans')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'nama_serahan'=>$request->input('serahanNew')
                    ]);

        return redirect('serahan')->withFlashSuccess('The serahan have been update successfully!');;
    }

    function delete($id)
    {
        $delete = DB::table('serahans')
                    ->where('id', $id)
                    ->delete();

        return redirect('serahan');
    }

    public function searchSerahan(Request $request)
    {
        $search = $request->get('search');
        $serahans = Serahan::where('nama_serahan','like','%' .$search.'%')->get();

        return view('serahan', compact('serahans'));
    }

}
