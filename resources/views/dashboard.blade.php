
 @extends('master')

 @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
            @if(session()->has('message'))

                          <div class="alert alert-success">

                          <button type="button" class="close" data-dismiss="alert" >X</button>
                    
                          </button>

                                {{session()->get('message')}}

                  @endif
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $registeredSubjects }}</h3>

                <p>Registered Subjects</p>
              </div>
              <div class="icon">
                <i class="ion"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $registeredClass }}<sup style="font-size: 20px"></sup></h3>

                <p>Registered Class</p>
              </div>
              <div class="icon">
                <i class="ion"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> {{ $userCount }}</h3>

                <p>User </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $registeredStudents }}</h3>

                <p>Registered Students</p>
              </div>
              <div class="icon">
                <i class="ion"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title" ><b>Notification</b> </h3>

                <div class="card-tools">
                  <span title="3 New Messages" class="badge badge-primary">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <form class="container" action="{{route('bulksend')}}" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <br>
                <!-- Conversations are loaded here -->
              
                  @csrf
                  <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Notification Title" name="title">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Message</label>
                      <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Notification Description" name="body" required></textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Image Url</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter image link" name="img">
                  </div>
                 
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                 <button type="submit" class="btn btn-primary">Send Notification</button>
                
              </div>
              </form>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
            
            <!-- TO DO List -->
            <div class="card" >
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Subject Entry
                </h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4">
                    <form  action="{{route('subjectEntry')}}" method="post">
                      @csrf
                   Subject ID
                   <br>
                   
                  <input type="text" name="subject_id" placeholder="Subject Id">
                  <span class="text-danger">
                    @error('subject_id')
                    {{$message}}
                    @enderror
                  </span>
                </div>
                  <div class="col-lg-4">
                    
                      
                   Subject Name
                   <br>
                   
                  <input type="text" name="subject_name" placeholder="Subject Name">
                  <span class="text-danger">
                    @error('subject_name')
                    {{$message}}
                    @enderror
                  </span>
                </div>
                   <div class="col-lg-4">
                   Class Id
                    <br>
                 <input type="text" name="class_id" placeholder="Class Id">
                 <span class="text-danger">
                    @error('class_id')
                    {{$message}}
                    @enderror
                  </span>
                  </div>
                  
                  
                   
                 
                   
                </div>
               <br>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="Submit" class="btn btn-primary float-left"><!-- <i class="fas fa-plus"></i>  -->Submit</button>

               </form> 
              </div>
            </div>
             <div class="card" >
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Class Entry
                </h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4">
                    <form  action="{{route('classEntry')}}" method="post">
                      @csrf
                   Class Id
                   <br>
                   
                  <input type="text" name="class_id" placeholder="Class Id">
                  <span class="text-danger">
                    @error('class_id')
                    {{$message}}
                    @enderror
                  </span>
                </div>
                  <div class="col-lg-4">
                    
                      @csrf
                   Class Name
                   <br>
                   
                  <input type="text" name="class_name" placeholder="Class Name">
                  <span class="text-danger">
                    @error('class_name')
                    {{$message}}
                    @enderror
                  </span>
                </div>
                   
                   
                  
                   
                </div>
               <br>
                 
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="Submit" class="btn btn-primary float-left"><!-- <i class="fas fa-plus"></i>  -->Submit</button>

               </form> 
              </div>
            </div>
             <div class="card" >
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Terminal Entry
                </h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4">
                    <form  action="{{route('terminalExamEntry')}}" method="post">
                      @csrf
                   Terminal Id
                   <br>
                   
                  <input type="text" name="terminal_id" placeholder="Terminal Id">
                   <span class="text-danger">
                    @error('terminal_id')
                    {{$message}}
                    @enderror
                  </span>

                </div>
                  <div class="col-lg-4">
                    
                   Terminal Type
                   <br>
                   
                  <input type="text" name="terminalTypes" placeholder="Terminal Type">
                   <span class="text-danger">
                    @error('terminalTypes')
                    {{$message}}
                    @enderror
                  </span>
                </div>
                   
                </div>
               <br>
                
                  
              </div>
              <div class="card-footer clearfix">
                <button type="Submit" class="btn btn-primary float-left"><!-- <i class="fas fa-plus"></i>  -->Submit</button>

               </form> 
              </div>
            </div>
             <div class="card" >
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Student Entry
                </h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4">
                    <form  action="{{route('studentEntry')}}" method="post">
                      @csrf
                   Student Id
                   <br>
                   
                  <input type="text" name="student_id" placeholder="Student Id">
                  <span class="text-danger">
                    @error('student_id')
                    {{$message}}
                    @enderror
                  </span>
                </div>
                  <div class="col-lg-4">
                    
                   Student Name
                   <br>
                   
                  <input type="text" name="studentName" placeholder="Student Name">
                  <span class="text-danger">
                    @error('studentName')
                    {{$message}}
                    @enderror
                  </span>
                </div>

                 <div class="col-lg-4">
                    
                   Class Id
                   <br>
                   
                  <input type="text" name="class_id" placeholder="Class Id">
                  <span class="text-danger">
                    @error('class_id')
                    {{$message}}
                    @enderror
                  </span>
                </div>

                   <div class="col-lg-4">
                    
                   Subject Id
                   <br>
                   
                  <input type="text" name="subject_id" placeholder="Subject Id">
                  <span class="text-danger">
                    @error('subject_id')
                    {{$message}}
                    @enderror
                  </span>
                </div>


                   <div class="col-lg-4">
                    
                   Section
                   <br>
                   
                  <input type="text" name="section" placeholder="Section">
                  <span class="text-danger">
                    @error('section')
                    {{$message}}
                    @enderror
                  </span>
                </div>


                   <div class="col-lg-4">
                    
                   Class Name
                   <br>
                   
                  <input type="text" name="class_name" placeholder="Class Name">
                  <span class="text-danger">
                    @error('class_name')
                    {{$message}}
                    @enderror
                  </span>
                </div>
                   
                </div>
               <br>
                 
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="Submit" class="btn btn-primary float-left"><!-- <i class="fas fa-plus"></i>  -->Submit</button>

               </form> 
              </div>
            </div>
             <div class="card" >
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Marks Entry
                </h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4">
                    <form  action="{{route('add')}}" method="post">
                      @csrf
                   Class ID
                   <br>
                   
                  <input type="text" name="class_id" placeholder="Class ID">
                </div>
                  <div class="col-lg-4">
                    <form  action="{{route('add')}}" method="post">
                      @csrf
                   Student ID
                   <br>
                   
                  <input type="text" name="student_id" placeholder="Student ID">
                </div>
                   <div class="col-lg-4">
                   Subject ID
                    <br>
                 <input type="text" name="subject_id" placeholder="Subject ID">
                  </div>
                    <div class="col-lg-4">
                   Terminal Id
                    <br>
                   <input type="text" name="terminal_id" placeholder="Terminal Id">
                  
                  
                  </div>
                   <div class="col-lg-4">
                   Terminal Types
                    <br>
                   <input type="text" name="terminalTypes" placeholder="Terminal Types">
                  
                  
                  </div>
                   <div class="col-lg-4">
                   Marks
                    <br>
                   <input type="text" name="marks" placeholder="Marks">
                  
                  
                  </div>
                   
                </div>
               <br>
                  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="Submit" class="btn btn-primary float-left"><!-- <i class="fas fa-plus"></i>  -->Submit</button>

               </form> 
              </div>
            </div>



            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Sales Graph
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="col-sm-12 text-center" >
   
     
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

 @endsection