 @extends('master')

 @section('content')

<div class="card-body" id="marks">
                <div class="row">
                  <div class="col-lg-4">
                   Class
                   <br>
                   <form  action="{{route('search')}}" method="get">
                   <select class="form-control" id="sel1" name="class_name">
                    <option value="">Select Class</option>
                 @if(!empty($classes))
                    @foreach($classes as $class) 
                        <option value="{{$class->class_name}}">{{$class->class_name}}</option>
                    @endforeach  
                 @endif     
                  
                  </select>
                </div>
                   <div class="col-lg-4">
                   Subject
                    <br>
                   <select class="form-control" id="sel1" name="subject_name">
                  <option value="">Select Subject</option>
                   @if(!empty($subjects))
                    @foreach($subjects as $subject) 
                        <option value="{{$subject->subject_name}}">{{$subject->subject_name}}</option>
                    @endforeach  
                 @endif    
                  </select>
                  </div>
                   <div class="col-lg-4">
                   Terminal Exam
                    <br>
                   <select class="form-control" id="sel1" name="terminalType" >
                    <option value="">Select Terminal Exam</option>
                @if(!empty($terminal_types))
                    @foreach($terminal_types as $terminalType) 
                        <option  value="{{$terminalType->terminalTypes}}">{{$terminalType->terminalTypes}}</option>
                    @endforeach  
                 @endif 
                  
                  </select>
                  </div>
                   
                </div>
               <br>
                <div class="row">
                <button type="Submit" class="btn btn-primary float-left">Search</button>  
                <button type="button" class="btn btn-outline-primary" id=bt-1><a href="{{route('search')}}">Reset</a></button>
              </form>
              <br>
         
                </div>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix" id="searchMarks" >
                   <table class="table table-dark" border="1" width="5em">
        <tr>
            <td>Student ID</td>
            <td>Students Name</td>
            <td>Subject</td>
            <td>Marks</td>
         </tr>    
    @if (!empty($marks))
    @foreach($marks as $mark)
            <tr>
               <td>{{$mark->student_id}}</td> 
               <td>{{$mark->studentName}}</td>
               <td>{{$mark->subject_name}}</td>
               <td>{{$mark->marks}}</td>
        
               
            </tr>
       @endforeach
    @endif
 </table>

              </div>
            </div>
    
 @endsection