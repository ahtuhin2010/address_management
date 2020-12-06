<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\District;
use App\Model\Division;
use App\Model\Upazila;
use App\Model\Union;
use App\Model\Ward;
use App\Model\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function view()
    {
        $data['allData'] = Village::orderBy('division_id', 'asc')->orderBy('district_id', 'asc')->orderBy('upazila_id', 'asc')->orderBy('union_id', 'asc')->orderBy('ward_no_id', 'asc')->get();
        return view('backend.village.view-village', $data);
    }

    public function add()
    {
        $data['divisions'] = Division::all();
        return view('backend.village.add-village', $data);
    }

    public function store(Request $request)
    {
        $village = new Village();
        $village->division_id = $request->division_id;
        $village->district_id = $request->district_id;
        $village->upazila_id = $request->upazila_id;
        $village->union_id = $request->union_id;
        $village->ward_no_id = $request->ward_no_id;
        $village->name = $request->name;
        $village->save();

        return redirect()->route('villages.view')->with('success', 'Data Saved Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = Village::find($id);
        $data['divisions'] = Division::all();
        return view('backend.village.add-village', $data);
    }

    public function update(Request $request, $id)
    {
        $village = Village::find($id);
        $village->division_id = $request->division_id;
        $village->district_id = $request->district_id;
        $village->upazila_id = $request->upazila_id;
        $village->union_id = $request->union_id;
        $village->ward_no_id = $request->ward_no_id;
        $village->name = $request->name;
        $village->save();

        return redirect()->route('villages.view')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request)
    {
        $village = Village::find($request->id);

        $village->delete();

        return redirect()->route('villages.view')->with('success', 'Data Deleted Successfully');
    }
}
