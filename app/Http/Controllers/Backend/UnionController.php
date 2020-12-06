<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\District;
use App\Model\Division;
use App\Model\Upazila;
use App\Model\Union;
use App\Http\Requests\UnionRequest;
use Illuminate\Http\Request;

class UnionController extends Controller
{
    public function view()
    {
        $data['allData'] = Union::orderBy('division_id', 'asc')->orderBy('district_id', 'asc')->orderBy('upazila_id', 'asc')->get();
        return view('backend.union.view-union', $data);
    }

    public function add()
    {
        $data['divisions'] = Division::all();
        return view('backend.union.add-union', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:unions,name'
        ]);

        $union = new Union();
        $union->division_id = $request->division_id;
        $union->district_id = $request->district_id;
        $union->upazila_id = $request->upazila_id;
        $union->name = $request->name;
        $union->save();

        return redirect()->route('unions.view')->with('success', 'Data Saved Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = Union::find($id);
        $data['divisions'] = Division::all();
        return view('backend.union.add-union', $data);
    }

    public function update(UnionRequest $request, $id)
    {
        $union = Union::find($id);
        $union->division_id = $request->division_id;
        $union->district_id = $request->district_id;
        $union->upazila_id = $request->upazila_id;
        $union->name = $request->name;
        $union->save();

        return redirect()->route('unions.view')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request)
    {
        $union = Union::find($request->id);

        $union->delete();

        return redirect()->route('unions.view')->with('success', 'Data Deleted Successfully');
    }
}
