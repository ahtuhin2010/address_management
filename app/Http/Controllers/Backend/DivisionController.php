<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Division;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\DivisionRequest;

class DivisionController extends Controller
{
    public function view()
    {
        $data['allData'] = Division::all();
        return view('backend.division.view-division', $data);
    }

    public function add()
    {
        return view('backend.division.add-division');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:divisions,name'
        ]);

        $division= new Division();
        $division->name = $request->name;
        $division->save();

        return redirect()->route('divisions.view')->with('success', 'Data Saved Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = Division::find($id);
        return view('backend.division.add-division', $data);
    }

    public function update(DivisionRequest $request, $id)
    {
        $division = Division::find($id);
        $division->name = $request->name;
        $division->save();

        return redirect()->route('divisions.view')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request)
    {
        $division = Division::find($request->id);

        $division->delete();

        return redirect()->route('divisions.view')->with('success', 'Data Deleted Successfully');
    }

}
