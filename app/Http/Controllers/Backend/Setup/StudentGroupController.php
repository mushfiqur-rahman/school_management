<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function GroupView(){
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);
    }

    public function GroupAdd(){
        return view('backend.setup.group.add_group');
    }

    public function GroupStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name',

        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('group.view')->with($notification);
    }

    public function GroupEdit($id){
        $editData = StudentGroup::find($id);
        return view('backend.setup.group.edit_group', compact('editData'));
    }

    public function GroupUpdate(Request $request, $id){
        $data = StudentGroup::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Group Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('group.view')->with($notification);
    }

    public function GroupDelete($id){
        $user = StudentGroup::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('group.view')->with($notification);
    }
}
