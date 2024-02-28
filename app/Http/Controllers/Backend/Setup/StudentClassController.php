<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function ClassView(){
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }

    public function ClassAdd(){
        return view('backend.setup.student_class.add_class');
    }

    public function ClassStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);
        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.class')->with($notification);
    }

    public function ClassEdit($id){
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('editData'));
    }

    public function ClassUpdate(Request $request,$id){
        $data = StudentClass::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.class')->with($notification);
    }

    public function ClassDelete($id){
        $user = StudentClass::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('view.class')->with($notification);
    }
}
