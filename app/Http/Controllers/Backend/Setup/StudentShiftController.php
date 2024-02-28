<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shift;

class StudentShiftController extends Controller
{
    public function ShiftView(){
        $data['allData'] = Shift::all();
        return view('backend.setup.shift.view_shift', $data);
    }

    public function ShiftAdd(){
        return view('backend.setup.shift.add_shift');
    }

    public function ShiftStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:shifts,name',
        ]);
        $data = new Shift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shift.view')->with($notification);
    }

    public function ShiftEdit($id){
        $editData = Shift::find($id);
        return view('backend.setup.shift.edit_shift', compact('editData'));
    }

    public function ShiftUpdate(Request $request, $id){
        $data = Shift::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:shifts,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shift.view')->with($notification);
    }

    public function ShiftDelete($id){
        $user = Shift::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('shift.view')->with($notification);
    }
}
