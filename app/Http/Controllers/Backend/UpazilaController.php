<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\District;
use App\Model\Division;
use App\Model\Upazila;
use App\Http\Requests\UpazilaRequest;
use Illuminate\Http\Request;

class UpazilaController extends Controller
{
    public function view()
    {
        $data['allData'] = Upazila::orderBy('division_id', 'asc')->orderBy('district_id', 'asc')->get();
        return view('backend.upazila.view-upazila', $data);
    }

    public function add()
    {
        $data['divisions'] = Division::all();
        return view('backend.upazila.add-upazila', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:upazilas,name'
        ]);

        $upazila = new Upazila();
        $upazila->division_id = $request->division_id;
        $upazila->district_id = $request->district_id;
        $upazila->name = $request->name;
        $upazila->save();

        return redirect()->route('upazilas.view')->with('success', 'Data Saved Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = Upazila::find($id);
        $data['divisions'] = Division::all();
        return view('backend.upazila.add-upazila', $data);
    }

    public function update(UpazilaRequest $request, $id)
    {
        $upazila = Upazila::find($id);
        $upazila->division_id = $request->division_id;
        $upazila->district_id = $request->district_id;
        $upazila->name = $request->name;
        $upazila->save();

        return redirect()->route('upazilas.view')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request)
    {
        $upazila = Upazila::find($request->id);

        $upazila->delete();

        return redirect()->route('upazilas.view')->with('success', 'Data Deleted Successfully');
    }
}
