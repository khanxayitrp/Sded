 @extends('common.main')
 @section('title','ສະມາຊິກພັກທັງໝົດ')
 @section('content')
 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">ສະມາຊິກພັກ</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <h5 class="card-header">ເພີ້ມສະມາຊິກໃໝ່</h5>
              <div class="card-body">
                  <form action="{{route('webadmin.savelaomember')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group purple-border">
                        <label for="inputText3" class="col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                        
                        <select class="form-control" name="Name" required="" autofocus="autofocus">
                          <option value="">ເລືອກສະມາຊິກ:</option>
                          @foreach ($data as $dt)
                          <option value="{{ $dt->IDSDED }}">{{$dt->SDEDName}} {{$dt->LastName}}</option>
                          
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group purple-border">
                          <label for="inputText1" class="col-form-label">ວັນທີ່ເຂົ້າພັກສຳຮອງ</label>
                          <input class="form-control" id="Laomember1" name="Laomember1" type="date" required="">
                      </div>

                      <div class="form-group purple-border">
                          <label for="inputText2" class="col-form-label">ວັນທີ່ເຂົ້າພັກສົມບູນ</label>
                          <input class="form-control" id="Laomember2" name="Laomember2" type="date">
                      </div>

                      
                      <button type="submit" class="btn btn-success">save</button>
                  </form>
              </div>
        </div>


        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ຂໍ້ມູນທັງຫມົດ</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                    <th>ບ່ອນປະຈຳການ</th>
                    <th>ເຂົ້າພັກສຳຮອງ</th>
                    <th>ເຂົ້າພັກສົມບູນ</th>

                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                    <th>ບ່ອນປະຈຳການ</th>
                    <th>ເຂົ້າພັກສຳຮອງ</th>
                    <th>ເຂົ້າພັກສົມບູນ</th>

                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($data1 as $key => $list)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$list->fname}} {{$list->lname}}</td>
                    <td>{{$list->location}}</td>
                    <td>{{$list->member1}}</td>
                    <td>{{$list->member2}}</td>
          
                    <td>
                      @if(request()->user()->role === 'admin' || request()->user()->role === 'superadmin')
                      <a class="btn btn-outline-primary" href="{{route('webadmin.getupdatelaomember',$list->id)}}">Edit</a>
                        <form action="{{route('webadmin.deletelaomember',$list->id)}}" method="post">
                            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}">  for delete method
                            <input type="hidden" name="_method" value="delete">    --}}
                            @csrf 
                           <button onclick="return confirmdelete();" class="btn btn-outline-danger">Delete</button>
                        </form>
                        @else

                          @if(request()->user()->role === 'writer')
                             <a class="btn btn-outline-primary" href="{{route('webadmin.getupdatelaomember',$list->id)}}">Edit</a>
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