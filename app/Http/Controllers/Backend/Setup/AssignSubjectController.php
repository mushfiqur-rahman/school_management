<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\AssignSubject;
use App\Models\Subject;

class AssignSubjectController extends Controller
{
    public function AssignSubjectView(){
//        $data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject', $data);
    }

    public function AssignSubjectAdd(){
        $data['subjects'] = Subject::all();
        $data['classes']  = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject', $data);
    }

    public function AssignSubjectStore(Request $request){
        $subjectCount = count($request->subject_id);
        if ($subjectCount != null){
            for ($i=0; $i< $subjectCount; $i++){
                $assign_subject                  = new AssignSubject();
                $assign_subject->class_id        = $request->class_id;
                $assign_subject->subject_id      = $request->subject_id[$i];
                $assign_subject->full_mark       = $request->full_mark[$i];
                $assign_subject->pass_mark       = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            } // End For Loop
        }  // End If condition
        $notification = array(
            'message' => 'Assign Subject Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('assign.subject.view')->with($notification);
    }

    public function AssignSubjectEdit($class_id){
        $data['editData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
//        dd($data['editData']->toArray());
        $data['subjects'] = Subject::all();
        $data['classes']  = StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subject', $data);
    }

    public function AssignSubjectUpdate(Request $request,$class_id ){
        if ($request->subject_id == NULL) {

            $notification = array(
                'message' => 'Sorry You do not select any Subject',
                'alert-type' => 'error'
            );

            return redirect()->route('assign.subject.edit',$class_id)->with($notification);

        }else{

            $countClass = count($request->subject_id);
            AssignSubject::where('class_id',$class_id)->delete();
            for ($i=0; $i <$countClass ; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();

            } // End For Loop

        }// end Else

        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('assign.subject.view')->with($notification);
    } // end Method

    public function AssignSubjectDetails($class_id){
        $data['detailsData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();

        return view('backend.setup.assign_subject.details_assign_subject',$data);
    }

    public function AssignSubjectDelete($class_id){
        $data = AssignSubject::where('class_id', $class_id);
        $data->delete();

        $notification = array(
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('assign.subject.view')->with($notification);
    }
}
