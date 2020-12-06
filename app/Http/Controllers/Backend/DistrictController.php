<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\District;
use App\Model\Division;
use Illuminate\Http\Request;
use App\Http\Requests\DistrictRequest;

class DistrictController extends Controller
{
    public function view()
    {
        $data['allData'] = District::orderBy('division_id','asc')->get();
        return view('backend.district.view-district', $data);
    }

    public function add()
    {
        $data['divisions'] = Division::all();
        return view('backend.district.add-district', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:districts,name'
        ]);

        $district = new District();
        $district->division_id = $request->division_id;
        $district->name = $request->name;
        $district->save();

        return redirect()->route('districts.view')->with('success', 'Data Saved Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = District::find($id);
        $data['divisions'] = Division::all();
        return view('backend.district.add-district', $data);
    }

    public function update(DistrictRequest $request, $id)
    {
        $district = District::find($id);
        $district->division_id = $request->division_id;
        $district->name = $request->name;
        $district->save();

        return redirect()->route('districts.view')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request)
    {
        $district = District::find($request->id);

        $district->delete();

        return redirect()->route('districts.view')->with('success', 'Data Deleted Successfully');
    }
}
