 @extends('common.main')
 @section('title','ແກ້ໄຂຂໍ້ມູນສະມາຊິກພັກ')
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
                  <form action="{{route('webadmin.updatelaomember',$data->staffID)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group purple-border">
                        <label for="inputText3" class="col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                        
                        <select class="form-control" name="Name" readonly>
                          <option value="">ເລືອກສະມາຊິກ:</option>
                          
                          <option value="{{ $data->staffID }}" selected="">{{$data->fname}} {{$data->lname}}</option>
                          
                         </select>
                      </div>

                      <div class="form-group purple-border">
                          <label for="inputText1" class="col-form-label">ວັນທີ່ເຂົ້າພັກສຳຮອງ</label>
                          <input class="form-control" id="Laomember1" name="Laomember1" type="date" value="{{$data->member1}}">
                      </div>

                      <div class="form-group purple-border">
                          <label for="inputText2" class="col-form-label">ວັນທີ່ເຂົ້າພັກສົມບູນ</label>
                          <input class="form-control" id="Laomember2" name="Laomember2" type="date" value="{{$data->member2}}">
                      </div>

                      
                      <button type="submit" class="btn btn-success">save</button>
                  </form>
              </div>
        </div>


        

        
      </div>
      <!-- /.container-fluid -->
@endsection