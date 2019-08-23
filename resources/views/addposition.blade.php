 @extends('common.main')
 @section('title','ເພີ້ມຕຳແໜ່ງ')
 @section('content')
 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">ຕຳແໜ່ງ</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <h5 class="card-header">ເພີ້ມຕຳແໜ່ງໃໝ່</h5>
              <div class="card-body">
                  <form action="{{route('webadmin.saveposition')}}" method="post">
                      @csrf
                        <div class="form-group">
                          <label for="inputText1" class="col-form-label">ຊື່ຕຳແໜ່ງ</label>
                          
                          <input id="PositionName" type="text" class="form-control" name="PositionName" required="">
                      </div>
                                            
                      <button type="submit" class="btn btn-success">ເພີ້ມ</button>
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
                    <th>no</th>
                    <th>ຊື່ຕຳແໜ່ງ</th>

                    <th></th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach ($data as $key => $list)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$list->PositionName}}</td>

      
                    <td>
                      @if(request()->user()->role === 'admin' || request()->user()->role === 'superadmin')
                     {{--  <a class="btn btn-outline-primary" href="">Edit</a> --}}
                        <form action="{{route('webadmin.deleteposition',$list->PositionID)}}" method="post">
                     
                            @csrf 
                           <button onclick="return confirmdelete();" class="btn btn-outline-danger">Delete</button>
                        </form>
                        @else

                          @if(request()->user()->role === 'writer')
                          {{--    <a class="btn btn-outline-primary" href="">Edit</a> --}}
                          @endif

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