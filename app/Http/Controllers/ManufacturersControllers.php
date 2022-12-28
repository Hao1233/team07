<?php
namespace App\Http\Controllers;

use App\Http\Requests\ManufacturersRequest;
use App\Models\manufacturers;
use App\Models\catalogs;
use Database\Factories\ManufacturersFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManufacturersControllers extends Controller
{
    public function index()
    {
        $manufacturers = manufacturers::paginate(20);
        $nationals = manufacturers::Allnational()->get();
        $data = [];
        foreach ($nationals as $national)
        {
            $data["$national->national"] = $national->national;
        }
        return view('manufacturers.index', ['manufacturers'=>$manufacturers,'national'=>$data]);
    }
    public function position(Request $request)
    {
        $manufacturers = manufacturers::national($request->input('pos'))->paginate(5);
        $nationals = manufacturers::Allnational()->get();
        $data = [];
        foreach ($nationals as $national)
        {
            $data["$national->national"] = $national->national;
        }
        return view('manufacturers.index', ['manufacturers'=>$manufacturers,'national'=>$data]);
    }
    public function senior()
    {
        $manufacturers = manufacturers::Senior()->paginate(10);
        $nationals = manufacturers::Allnational()->get();
        $data = [];
        foreach ($nationals as $national)
        {
            $data["$national->national"] = $national->national;
        }
        return view('manufacturers.index', ['manufacturers'=>$manufacturers,'national'=>$data]);
    }


    public function delete($id)
    {
        $team = manufacturers::findOrFail($id);
        $team->delete();
        return redirect('/manufacturers');
    }
    public function edit($id)
    {
        $manufacturers = manufacturers::findOrFail($id);
        return view('manufacturers.edit', ['manufacturers'=>$manufacturers]);
    }
    public function update($id)
    {
        $manufacturers = manufacturers::findOrFail($id);
        $manufacturers->name = request('name');  
        $manufacturers->capital = request('capital'); 
        $manufacturers->found_at = request('found_at'); 
        $manufacturers->national = request('national');  
        $manufacturers->save();
        return redirect('/manufacturers');
    }
    public function show($id)
    {
        $manufacturers = manufacturers::findOrFail($id);
        $catalogs = $manufacturers->catalogs;
        return view('manufacturers.show', ['manufacturers' => $manufacturers, 'catalogs' =>  $catalogs]);
    }
    public function create(){
        return view('manufacturers.create');
    }
    public function store(ManufacturersRequest $request)
    {
        $name = $request->input('name');
        $capital = $request->input('capital');
        $found_at = $request->input('found_at');
        $national= $request->input('national');


        $manufacturers = manufacturers::create([
            'name'=>$name,
            'capital'=>$capital,
            'found_at'=>$found_at, 
            'national'=>$national, 
        ]);
        return redirect('/manufacturers');
    }
}
