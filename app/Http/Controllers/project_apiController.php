<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\marks;
use App\Models\classes;
use App\Models\terminal_types;
use App\Models\students;
use App\Models\subjects;
use App\Models\User;
use App\Models\cr;

use App\Models\notifications;
use Illuminate\Support\Facades\Auth;


class project_apiController extends Controller
{
 
 
public function index(){

      $userCount = User::count();
      $registeredStudents = students::count();
      $registeredSubjects = subjects::count();
      $registeredClass = classes::count();

      return response()->json(['userCount'=>$userCount,'registeredStudents'=>$registeredStudents,'registeredSubjects'=>$registeredSubjects,'registeredClass'=>$registeredClass],200);
     }  
 

  public function showData(Request $request)
  {
  $marks = DB::table('marks');
  $classes = DB::table('classes')->get();
  $terminal_types = DB::table('terminal_types')->get();
  $students = DB::table('students')->get();
  $subjects = DB::table('subjects')->get();

  $marks=$marks->select('marks.*','classes.class_name','subjects.subject_name','students.student_id','students.studentName')
                 ->leftJoin('classes','classes.class_id','marks.class_id')
                 ->leftJoin('terminal_types','terminal_types.terminal_id','marks.terminal_id')
                 ->leftJoin('students','students.student_id','marks.student_id')
                 ->leftJoin('subjects','subjects.subject_id','marks.subject_id');

  if($request->class_name != null){
        
        $marks = $marks->Where('classes.class_name',$request->class_name);
        
        if($request->terminalType !=null){
            $marks = $marks->Where('terminal_types.terminalTypes',$request->terminalType);
             
             if($request->subject_name != null){
              $marks = $marks->Where('subjects.subject_name',$request->subject_name);
              } 
             else {
                $marks = [];
                return response()->json(['subjects' => $subjects, 'classes' => $classes, 'terminal_types' => $terminal_types, 'students' => $students, 'marks' => $marks], 200);  

             } 
        }
        else{
            $marks = [];
            return response()->json(['subjects' => $subjects, 'classes' => $classes, 'terminal_types' => $terminal_types, 'students' => $students, 'marks' => $marks], 200);  
        }
        $test=$marks->get();
        return response()->json(['subjects' => $subjects, 'classes' => $classes, 'terminal_types' => $terminal_types, 'students' => $students, 'marks' => $test], 200);  

        // if($marks=null){
        //      return redirect()->route('search')->with('message','Class is Empty');     
        // }
    }

  $marks = [];
  return response()->json(['subjects' => $subjects, 'classes' => $classes, 'terminal_types' => $terminal_types, 'students' => $students, 'marks' => $marks], 200);               
}


public function storeData(Request $req)
{
    $marks = new marks;
    $marks->student_id = $req->student_id;
    $marks->class_id = $req->class_id;
    $marks->subject_id = $req->subject_id;
    $marks->terminal_id = $req->terminal_id;
    $marks->terminalTypes = $req->terminalTypes;
    $marks->marks = $req->marks;
    $marks->save();
    return response()->json(['message' => 'Marks Added Successfully'], 200);
}


public  function StoreSubjectEntry(Request $req)
    {   
      //  $req->validate
      //  ([  
      //    'subject_id' => 'required|unique:subjects',  
      //    'subject_name' => 'required',  
      //    'class_id' => 'required',], 
      //   ['subject_id.required' => 'The subject ID field is required.', 
      //    'subject_id.unique' => 'The subject ID has already been registered.',  
      //    'subject_name.required' => 'The subject name field is required.', 
      //     'class_id.required' => 'The class ID field is required.',
      //   ]
      // );


        $subjects = new subjects;
        $subjects->subject_id = $req->subject_id;                                         
        $subjects->subject_name = $req->subject_name;
        $subjects->class_id = $req->class_id;
        $subjects->save();
        return response()->json(['message'=>'Subject Added Sucessfully'],200);
      // return response()->json(['message'=>'hello']);
    }
  public  function StoreClassEntry(Request $req)
    {
      //    $req->validate
      //  ([  
      //    'class_id' => 'required|unique:classes',  
      //    'class_name' => 'required|unique:classes',],  
          
      //   ['class_id.required' => 'The class ID field is required.', 
      //   'class_id.unique' => 'The class ID has already been registered.',  
      //    'class_name.unique' => 'The subject ID has already been registered.',  
      //    'class_name.required' => 'The class name field is required.', 
          
      //   ]
      // );

        $classes = new classes;
        $classes->class_id = $req->class_id;                                         
        $classes->class_name = $req->class_name;
        $classes->save();
        return response()->json(['message','Class Added Successfully'],200);
    }

   public function StoreTerminalExam(Request $req)
    {
      //     $req->validate
      //  ([  
      //    'terminal_id' => 'required|unique:terminal_types',  
      //    'terminalTypes' => 'required|unique:terminal_types',],  
          
      //   ['terminalTypes.required' => 'The terminal exam field is required.', 
      //   'terminalTypes.unique' => 'The terminal exam has already been registered.',  
      //    'terminal_id.unique' => 'The terminal ID has already been registered.',  
      //    'terminal_id.required' => 'The terminal id is required.', 
          
      //   ]
      // );

        $terminal_types = new terminal_types;
        $terminal_types->terminal_id = $req->terminal_id;                                         
        $terminal_types->terminalTypes = $req->terminalTypes;
        $terminal_types->save();
        return response()->json(['message'=>'Terminal Exam Added Sucessfully'],200);
    }

   public function StoreStudentEntry(Request $req)
    {
      //    $req->validate
      //  ([  
      //    'student_id' => 'required|unique:terminal_types',  
      //    'studentName' => 'required|unique:terminal_types',
      //    'class_id'=>'required',
      //    'class_name'=>'required',
      //    'subject_id'=>'required',
      //    'section'=>'required',
      //  ],  
          
      //   ['student_id.required' => 'The student id is required.', 
      //   'student_id.unique' => 'The student id has already been registered.',  
      //    'studentName.unique' => 'The student name has already been registered.',  
      //    'studentName.required' => 'The student name is required.', 
      //    'class_id.required'=>'The class id is required',
      //    'subject_id.required'=>'The subject id is required',
      //    'section.required'=>'The section is required',
          
      //   ]
      // );


        $students = new students;
        $students->student_id = $req->student_id;                                         
        $students->studentName = $req->studentName;
        $students->class_id = $req->class_id;
        $students->class_name = $req->class_name;
        $students->subject_id = $req->subject_id;
        $students->section = $req->section;
        $students->save();
        return response()->json(['message'=>'Student Entry Added Sucessfully'],200);
    }
    
  


  public function bulksend(Request $req){
        $comment = new notifications();
        $comment->title = $req->input('title');
        $comment->body = $req->input('body');
        $comment->img = $req->input('img');
        $comment->save();
        $url = 'https://fcm.googleapis.com/fcm/send';
        $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => $req->id,'status'=>"done");
        $notification = array('title' =>$req->title, 'text' => $req->body, 'image'=> $req->img, 'sound' => 'default', 'badge' => '1',);
        $arrayToSend = array('to' => "/topics/all", 'notification' => $notification, 'data' => $dataArr, 'priority'=>'high');
        $fields = json_encode ($arrayToSend);
        $headers = array (
            'Authorization: key=' . "AAAAzWTNkJg:APA91bFLZC0sJHywUsob8NJQVIV0oFrwdGGI3tJabsu0URsLdAUkmYh1YvfYGB-gSymSSon0GIgOV4AnzrtlIBLFljAFsolwg_hSJ_htE-oBj-QBg8h6zBV-TCBAU0LpjIfsGu4gruyU",
            'Content-Type: application/json'
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch );
        //var_dump($result);
        curl_close ( $ch );
        return response()->json(['message' => 'Notification Send successfully'], 201);
    }

 public function showEntry(Request $request)
   {
      $classes = DB::table('classes')->get();
      $terminal_types = DB::table('terminal_types')->get();
      $students = DB::table('students')->get();
      $subjects = DB::table('subjects')->get();
      
      return response()->json(['subjects'=>$subjects,'classes'=>$classes,'terminal_types'=>$terminal_types,'students'=>$students],200);



    }



}
