<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogsRequest;
use App\Models\CreateCatalogModel;
use App\Models\catalogs;
use App\Models\manufacturers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CatalogsControllers extends Controller
{
    public function index()
    {
        $catalogs = catalogs::all();
        return view('catalogs.index', ['catalogs'=>$catalogs]);
    }
    public function delete($id)
    {
        $team = catalogs::findOrFail($id);
        $team->delete();
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
}
