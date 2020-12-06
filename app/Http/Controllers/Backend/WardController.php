<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\District;
use App\Model\Division;
use App\Model\Upazila;
use App\Model\Union;
use App\Model\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function view()
    {
        $data['allData'] = Ward::orderBy('division_id', 'asc')->orderBy('district_id', 'asc')->orderBy('upazila_id', 'asc')->orderBy('union_id', 'asc')->get();
        return view('backend.ward.view-ward', $data);
    }

    public function add()
    {
        $data['divisions'] = Division::all();
        return view('backend.ward.add-ward', $data);
    }

    public function store(Request $request)
    {
        $ward = new Ward();
        $ward->division_id = $request->division_id;
        $ward->district_id = $request->district_id;
        $ward->upazila_id = $request->upazila_id;
        $ward->union_id = $request->union_id;
        $ward->ward_no = $request->ward_no;
        $ward->save();

        return redirect()->route('wards.view')->with('success', 'Data Saved Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = Ward::find($id);
        $data['divisions'] = Division::all();
        return view('backend.ward.add-ward', $data);
    }

    public function update(Request $request, $id)
    {
        $ward = Ward::find($id);
        $ward->division_id = $request->division_id;
        $ward->district_id = $request->district_id;
        $ward->upazila_id = $request->upazila_id;
        $ward->union_id = $request->union_id;
        $ward->ward_no = $request->ward_no;
        $ward->save();

        return redirect()->route('wards.view')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request)
    {
        $ward = Ward::find($request->id);

        $ward->delete();

        return redirect()->route('wards.view')->with('success', 'Data Deleted Successfully');
    }
}
