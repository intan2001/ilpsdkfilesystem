<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Serahan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Database\Query\Builder;

class recordViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->has('search')){
            return $this->searchRecord($request->get('search'));
        }

        $records = Record::paginate(20);
        $serahans = Serahan::all();

        //$role=Auth::user()->role;

        return view('recordView', compact('records', 'serahans'));
    }

    public function searchRecord($search)
    {
        $serahans = Serahan::all();
        $records = Record::all();
        $users = User::all();

        //$search = $request->get('search');

        $searchUserId = User::where('name', 'like', '%' . $search . '%')->pluck('id')->toArray();
        $searchSerahId = Serahan::where('nama_serahan', 'like', '%' . $search . '%')->pluck('id')->toArray();

        $records = Record::where('perkara','like','%' .$search.'%')
                            ->orWhere ( 'tarikh_surat', 'like', '%' . $search . '%' )
                            ->orWhere ( 'tarikh_terima', 'like', '%' . $search . '%' )
                            ->orWhere ( 'rujukan_fail', 'like', '%' . $search . '%' )
                            ->orWhere ( 'rujukan_surat', 'like', '%' . $search . '%' )
                            ->orWhere ( 'daripada', 'like', '%' . $search . '%' )
                            ->orWhere ( 'cacatan', 'like', '%' . $search . '%' )
                            ->orWhereIn ( 'serahan_id', $searchSerahId )
                            ->orWhereIn ( 'user_id' , $searchUserId)
                            ->paginate(20);


        return view('recordView', compact('records'));
    }

    function edit($id)
    {
        $serahans = Serahan::all();
        $records = Record::all();

        $row = DB::table('records')
                ->where('id', $id)
                ->first();

        $data = [
            'Info'=>$row,
        ];

            return view('editRecord', $data, compact('records', 'serahans'));

    }

    function update(Request $request)
    {
        $request->validate([
            'tarikhSurat'=>'required',
            'tarikhTerima'=>'required',
            'rujukanFail'=>'required',
            'rujukanSurat'=>'required',
            'namaOrganisasi'=>'required',
            'serahan'=>'required',
            'tajukSurat'=>'required',
        ]);

        $updating = DB::table('records')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'tarikh_surat'=>$request->input('tarikhSurat'),
                        'tarikh_terima'=>$request->input('tarikhTerima'),
                        'rujukan_fail'=>$request->input('rujukanFail'),
                        'rujukan_surat'=>$request->input('rujukanSurat'),
                        'daripada'=>$request->input('namaOrganisasi'),
                        'serahan_id'=>$request->input('serahan'),
                        'perkara'=>$request->input('tajukSurat'),
                        'cacatan'=>$request->input('cacatan')

                    ]);

        return redirect('recordView')->withFlashSuccess('The record have been update successfully!');;
    }

    function delete($id)
    {
        //$delete = Record::all()
        //            ->where('id', $id)
        //            ->delete();

        $delete = Record::findOrFail($id);
        $delete -> delete();

        //return redirect('recordView');
        return response()->json(['status' => 'Record Deleted Successfully!']);
    }


}


