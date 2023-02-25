@extends('master')

 @section('content')
 <div class="card-body" id="marks">
       <p><b>Student Entries</b></p>
      <table class="table table-dark" border="1" width="5em">
        <tr>
            <td>Student Id</td>
            <td>Student Name</td>
            <td>Class Id</td>
            <td>Class Name</td>                                                
            <td>Subject Id</td>
            <td>Section</td>
         </tr>    
   
    @foreach($students as $student)
            <tr>
               <td>{{$student->student_id}}</td> 
               <td>{{$student->studentName}}</td>
               <td>{{$student->class_id}}</td>
               <td>{{$student->class_name}}</td>
               <td>{{$student->subject_id}}</td>
                <td>{{$student->section}}</td>
        
               
            </tr>
       @endforeach
    
 </table>
                 
                  
                </div>  

  <div class="card-body" id="marks">
     <p><b>Subjects Entries</b></p>

      <table class="table table-dark" border="1" width="5em">
        <tr>
            <td>Subject Id</td>
            <td>Subject Name</td>
            <td>Class Id</td>
    
         </tr>    
   
    @foreach($subjects as $subjects)
            <tr>
               <td>{{$subjects->subject_id}}</td> 
               <td>{{$subjects->subject_name}}</td>
               <td>{{$subjects->class_id}}</td>
              
        
               
            </tr>
       @endforeach
    
 </table>
                 
                  
                </div>                
              
             
                  

    <div class="card-body" id="marks">
     <p><b>Class Entries</b></p>

      <table class="table table-dark" border="1" width="5em">
        <tr>
            <td>Class Id</td>
            <td>Class Name</td>
            
            
         </tr>    
   
    @foreach($classes as $class)
            <tr>
               <td>{{$class->class_id}}</td> 
               <td>{{$class->class_name}}</td>
              
             
        
               
            </tr>
       @endforeach
    
 </table>
                 
                  
                </div>                
              
  <div class="card-body" id="marks">
     <p><b>Terminal Exam Entries</b></p>

      <table class="table table-dark" border="1" width="5em">
        <tr>
            <td>Terminal Id</td>
            <td>Terminal Type</td>
            
            
         </tr>    
   
    @foreach($terminal_types as $terminal_type)
            <tr>
               <td>{{$terminal_type->terminal_id}}</td> 
               <td>{{$terminal_type->terminalTypes}}</td>
              
             
        
               
            </tr>
       @endforeach
    
 </table>
                 
                  
                </div>                
              
             
                  

               
                  

    

  @endsection

 