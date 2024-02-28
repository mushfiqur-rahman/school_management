<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function YearView(){
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year', $data);
    }

    public function YearAdd(){
        return view('backend.setup.year.add_year');
    }

    public function YearStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);
        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('year.view')->with($notification);
    }

    public function YearEdit($id){
        $editData = StudentYear::find($id);
        return view('backend.setup.year.edit_year', compact('editData'));
    }

    public function YearUpdate(Request $request, $id){
        $data = StudentYear::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Year Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('year.view')->with($notification);
    }

    public function YearDelete($id){
        $user = StudentYear::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('year.view')->with($notification);
    }
}
