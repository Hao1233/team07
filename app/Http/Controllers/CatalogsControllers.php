<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogsRequest;
use App\Models\CreateCatalogModel;
use App\Models\catalogs;
use App\Models\manufacturers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;

class CatalogsControllers extends Controller
{
    public function index()
    {
        $catalogs = catalogs::paginate(20);
        $types = catalogs::AllType()->get();
        $data = [];
        foreach ($types as $type)
        {
            $data["$type->game_type"] = $type->game_type;
        }
        return view('catalogs.index', ['catalogs'=>$catalogs,  'type'=>$data]);
    }
    public function position(Request $request)
    {
        $catalogs = catalogs::type($request->input('pos'))->paginate(20);
        $types = catalogs::AllType()->get();
        $data = [];
        foreach ($types as $type)
        {
            $data["$type->game_type"] = $type->game_type;
        }
        return view('catalogs.index', ['catalogs'=>$catalogs,  'type'=>$data]);
    }
    public function senior()
    {
        $catalogs = catalogs::Senior()->paginate(20);
        $types = catalogs::AllType()->get();
        $data = [];
        foreach ($types as $type)
        {
            $data["$type->game_type"] = $type->game_type;
        }
        return view('catalogs.index', ['catalogs'=>$catalogs,  'type'=>$data]);
    }



    public function delete($id)
    {
        $catalogs = catalogs::findOrFail($id);
        $catalogs->delete();
        return redirect('/');
    }
    public function edit($id)
    {
        $catalogs = DB::table('manufacturers')
        ->select('manufacturers.id', 'manufacturers.name')
        ->orderBy('manufacturers.id', 'asc')
        ->get();

        $data = [];
        foreach ($catalogs as $catalog)
        {
            $data[$catalog->id] = $catalog->name;
        }
        $catalogs = catalogs::findOrFail($id);
        return view('catalogs.edit', ['catalogs'=>$catalogs, 'manufacturers'=>$data]);
    }
    public function update($id)
    {
        $catalogs = catalogs::findOrFail($id);
        $catalogs->name = request('name'); 
        $catalogs->mid = request('mid'); 
        $catalogs->price = request('price'); 
        $catalogs->evaluaation = request('evaluaation'); 
        $catalogs->issue_date = request('issue_date'); 
        $catalogs->revenue = request('revenue'); 
        $catalogs->game_type = request('game_type');  
        $catalogs->save();
        return redirect('/');
    }
    public function show($id)
    {
        $catalogs = catalogs::findOrFail($id);
        $manufacturers = manufacturers::findOrFail($catalogs->mid);

        return view('catalogs.show', ['catalogs' => $catalogs, 'manufacturers_name' => $manufacturers->name]);
    }
    public function create(){
        $tags = manufacturers::orderBy('manufacturers.id', 'asc')->pluck('manufacturers.name', 'manufacturers.id');
        return view('catalogs.create',['manufacturers'=>$tags]);
    }
    public function store(CatalogsRequest $request)
    {
        $name = $request->input('name');
        $mid = $request->input('mid');
        $price = $request->input('price');
        $evaluaation= $request->input('evaluaation');
        $issue_date = $request->input('issue_date');
        $revenue = $request->input('revenue');
        $game_type = $request->input('game_type');


        $catalogs = catalogs::create([
            'name'=>$name,
            'mid'=>$mid,
            'price'=>$price, 
            'evaluaation'=>$evaluaation, 
            'issue_date'=>$issue_date, 
            'revenue'=>$revenue, 
            'game_type'=>$game_type,
        ]);
        
        return redirect('/');
    }


////////////////API
    public function api_catalogs()
    {
        return catalogs::all();
    }

    public function api_update(Request $request)
    {
        $catalogs = catalogs::find($request->input('id'));
        if ($catalogs == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        $catalogs->name = request('name'); 
        $catalogs->mid = request('mid'); 
        $catalogs->price = request('price'); 
        $catalogs->evaluaation = request('evaluaation'); 
        $catalogs->issue_date = request('issue_date'); 
        $catalogs->revenue = request('revenue'); 
        $catalogs->game_type = request('game_type');
        if ($catalogs->save())
        {
            return response()->json([
                'status' => 1,
            ]);
        } else {
            return response()->json([
                'status' => 0,
            ]);
        }
    }

    public function api_delete(Request $request)
    {
        $catalogs = catalogs::find($request->input('id'));

        if ($catalogs == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        if ($catalogs->delete())
        {
            return response()->json([
                'status' => 1,
            ]);
        }

    }

}
