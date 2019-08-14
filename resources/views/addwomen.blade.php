 @extends('common.main')
 @section('title','ເພີ້ມສະມາຊິກແມ່ຍິງ')
 @section('content')
 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">ສະມາຊິກແມ່ຍິງ</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <h5 class="card-header">add new staff</h5>
              <div class="card-body">
                  <form action="{{route('webadmin.savewomen')}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                          <label for="inputText3" class="col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                          
                          <select class="form-control" name="Name" required="">
                            <option value="">ເລືອກ:</option>  
                            @foreach ($data as $dt)
                            <option value="{{ $dt->IDSDED }}">{{$dt->SDEDName}} {{$dt->LastName}}</option>
                            @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="inputText5" class="col-form-label">ວັນທີເປັນສະມາຊິກ:</label>
                          <input class="form-control" id="date" name="Reg_date" type="date" required="">
                      </div>

                                            
                      <button type="submit" class="btn btn-success">save</button>
                  </form>
              </div>
        </div>

         <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ຂໍ້ມູນທັງຫມົດ</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>LastName</th>

                    <th>Location</th>
                    <th>Member date</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                     <th>Name</th>
                    <th>LastName</th>
  
                    <th>Location</th>
                    <th>Member date</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($data1 as $list)
                  <tr>
                    <td>{{$list->fname}}</td>
                    <td>{{$list->lname}}</td>

                    <td>{{$list->location}}</td>
                    <td>{{$list->memberdate}}</td>
                    <td>
                       @if(request()->user()->role === 'admin' || request()->user()->role === 'superadmin' || request()->user()->role === 'writer')
                        <form action="{{route('webadmin.deletewomen',$list->id)}}" method="post">
                            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}">  for delete method
                            <input type="hidden" name="_method" value="delete"> --}}   
                            @csrf 
                           <button onclick="return confirmdelete();" class="btn btn-outline-danger">Delete</button>
                        </form>
                        @else

                          {{-- @if(request()->user()->role === 'writer')
                             <a class="btn btn-outline-primary" href="">Edit</a>
                          @endif --}}

                        @endif
                     </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated on {{ date('Y-m-d H:i:s') }} PM</div>
        </div>

        
      </div>
      <!-- /.container-fluid -->
@endsection