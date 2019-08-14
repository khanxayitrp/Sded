 @extends('common.main')
 @section('title','ຮູບສະໄລທັງໝົດ')
 @section('content')
 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">all slides</li>
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

        <style>
          .image{
            max-height: 50px;
          }

        </style>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ຂໍ້ມູນທັງຫມົດ
          <i class="material-icons">account_box</i><a class="btn btn-outline-warrning" href="{{route('webadmin.addslideshow')}}">ເພີ້ມ</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ຊື່ File</th>
                    <th>ຮູບພາບ</th>
         
                    <th></th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach ($data as $key => $list)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$list->slidename}}</td>
                    <td><img class="image" src="{{url('/')}}/upload/{{$list->slidepath}}" alt="slideshow"></td>
   
                    <td>
                      @if(request()->user()->role === 'admin' || request()->user()->role === 'superadmin')
                        <form action="{{route('webadmin.deleteslideshow',$list->slideID)}}" method="post">
                            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}">  for delete method
                            <input type="hidden" name="_method" value="delete">    --}}
                            @csrf 
                           <button onclick="return confirmdelete();" class="btn btn-outline-danger">Delete</button>
                        </form>
                        @else

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