 @extends('common.main')
 @section('title','ແກ້ໄຂຂໍ້ມູນພະນັກງານ')
 @section('content')
 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">ພະນັກງານ</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <h5 class="card-header">ແກ້ໄຂໍ້ມູນ</h5>
              <div class="card-body">
                  <form action="{{route('webadmin.updatestaff',$staff->IDSDED)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="inputText1" class="col-form-label">ຊື່</label>
                          
                          <input id="inputText1" type="text" class="form-control" name="Name" value="{{$staff->SDEDName}}">
                      </div>

                      <div class="form-group">
                          <label for="inputText2" class="col-form-label">ນາມສະກຸນ</label>
                          <input id="inputText2" type="text" class="form-control" name="Lastname" value="{{$staff->LastName}}">
                      </div>

                      <div class="form-group">
                          <label for="inputText9" class="col-form-label">ວັນເດືອນປີເກີດ</label>
                          <input class="form-control" id="Birth_date" name="Birth_date" type="date" value="{{$staff->Birthdate}}">
                      </div>

                      <div class="form-group">
                          <label for="inputText7" class="col-form-label">ຊົນເຜົ່າ</label>
                          <select class="form-control" id="Clanlao" name="Clanlao" required="">
                            <option value="">ກະລຸນາເລືອກ ຊົນເຜົ່າ:</option>  
                            @foreach ($data2 as $clan)
                              <option value="{{$clan->id_Clan}}" {{$staff->Clan==$clan->id_Clan ? 'selected':''}}>{{$clan->Clan_name}}</option>
                              
                            @endforeach 
              
                            </select>
                      </div>

                      <div class="form-group">
                          <label for="inputText8" class="col-form-label">ລະດັບການສຶກສາ</label>
                          <select class="form-control" id="Educationlevel" name="Educationlevel" required="">
                            <option value="">ກະລຸນາເລືອກ ລະດັບການສຶກສາ:</option>  
                            @foreach ($data3 as $edu)
                              <option value="{{$edu->LevelID}}" {{$staff->Edu_level==$edu->LevelID ? 'selected':''}}>{{$edu->LevelName}}</option>
                              {{-- <option value="{{$edu->LevelID}}">{{$edu->LevelName}}</option> --}}
                            @endforeach 
              
                            </select>
                      </div>

                      <div class="form-group">
                          <label for="inputText3" class="col-form-label">ຕຳແໜ່ງ</label>
                          <select class="form-control" id="position" name="Position">
                            {{-- $staff->PositionID //  load data from id --}}
                            {{-- $data // table Position for select dropdown  --}}
                            @foreach ($data as $dt)
                            <option value="{{$dt->PositionID}}" {{$staff->PositionID==$dt->PositionID ? 'selected':''}}>{{$dt->PositionName}}</option>
                             
                            @endforeach 
              
                            </select>
                      </div>

                      <div class="form-group">
                          <label for="inputText4" class="col-form-label">ບ່ອນປະຈຳການ</label>
                          <select class="form-control" id="location" name="Location" required="">
                            <option value="">ກະລຸນາເລືອກ ບ່ອນປະຈຳການ:</option>
                            @foreach ($data1 as $dsl)
                              <option value="{{$dsl->SDListID}}" {{$staff->SDListID==$dsl->SDListID ? 'selected':''}}>{{$dsl->SDlistName}}</option>
                            @endforeach 
              
                            </select>
                      </div>

                      <div class="form-group">
                          <label for="inputText5" class="col-form-label">Member Date</label>
                          <input class="form-control" id="date" name="Reg_date" type="date" value="{{$staff->RegDate}}">
                      </div>

                      <div class="form-group">
                          
                          <label for="sex">Sex:</label>
                            <select class="form-control" id="sex" name="Sex">
    
                              <option value="M" {{$staff->Sex=='M' ? 'selected':''}}>Male</option>
                              <option value="F" {{$staff->Sex=='F' ? 'selected':''}}>Female</option>
              
                            </select>
                      </div>
                      
                      <div class="custom-file mb-3">
                          <input type="file" class="custom-file-input" id="customFile" name="Logo">
                          <label class="custom-file-label" for="customFile">Picture Profile</label>
                          <img class="image-circle"  style="max-height: 300px; max-width: 150px;" src="{{url('/')}}/upload/{{$staff->Logo}}" alt="logo">
                          <br>
                          <br>
                      </div>

                      
                      <button type="submit" class="btn btn-success">save</button>
                  </form>
              </div>
        </div>

        
      </div>
      <!-- /.container-fluid -->
@endsection