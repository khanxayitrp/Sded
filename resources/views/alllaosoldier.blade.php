 @extends('common.main')
 @section('title','ພະນັກງານທະຫານທັງໝົດ')
 @section('content')
 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">ທະຫານ</li>
        </ol>

        @if(session('success'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
              {{session('success')}}
          </div>
        @endif

        @if(session('warning'))
          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
             {{session('warning')}}
          </div>
        @endif

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ຂໍ້ມູນທັງຫມົດ
          <i class="material-icons">account_box</i><a class="btn btn-outline-warrning" href="{{route('webadmin.addlaosoldier')}}">ເພີ້ມສະມາຊິກ</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ຊື່</th>
                    <th>ນາມສະກຸນ</th>
                    <th>ບ່ອນປະຈຳການ</th>
                    <th>ສະຖານະພາບ</th>
                    <th></th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach ($data as $key => $list)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$list->fname}}</td>
                    <td>{{$list->lname}}</td>
                    <td>{{$list->location}}</td>
                    <td>{{$list->status}}</td>
                    <td>
                      @if(request()->user()->role === 'admin' || request()->user()->role === 'superadmin' || request()->user()->role === 'writer')
                        <form action="{{route('webadmin.deletelaosoldier',$list->id)}}" method="post">
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

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

      </div>
      <!-- /.container-fluid -->

<script>
    function confirmdelete(){
        var con = confirm('Do you want to delete?');
        if(con ==true){
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
@endsection