 @extends('common.main')
 @section('title','ເພີ້ມພະນັກງານ')
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
          <h5 class="card-header">add new staff</h5>
              <div class="card-body">
                  <form action="{{route('webadmin.savestaff')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="inputText1" class="col-form-label">ຊື່</label>
                          
                          <input id="inputText1" type="text" class="form-control" name="Name" required="">
                      </div>

                      <div class="form-group">
                          <label for="inputText2" class="col-form-label">ນາມສະກຸນ</label>
                          <input id="inputText2" type="text" class="form-control" name="Lastname" required="">
                      </div>

                      <div class="form-group">
                          <label for="inputText6" class="col-form-label">ວັນເດືອນປີເກີດ</label>
                          <input class="form-control" id="Birth_date" name="Birth_date" type="date" required="">
                      </div>

                      <div class="form-group">
                          <label for="inputText7" class="col-form-label">ຊົນເຜົ່າ</label>
                          <select class="form-control" id="Clanlao" name="Clanlao" required="">
                            <option value="">ກະລຸນາເລືອກ ຊົນເຜົ່າ:</option>  
                            @foreach ($data2 as $clan)
                              <option value="{{$clan->id_Clan}}">{{$clan->Clan_name}}</option>
                            @endforeach 
              
                            </select>
                      </div>

                      <div class="form-group">
                          <label for="inputText8" class="col-form-label">ລະດັບການສຶກສາ</label>
                          <select class="form-control" id="Educationlevel" name="Educationlevel" required="">
                            <option value="">ກະລຸນາເລືອກ ລະດັບການສຶກສາ:</option>  
                            @foreach ($data3 as $edu)
                              <option value="{{$edu->LevelID}}">{{$edu->LevelName}}</option>
                            @endforeach 
              
                            </select>
                      </div>

                      <div class="form-group">
                          <label for="inputText3" class="col-form-label">ຕຳແໜ່ງ</label>
                          <select class="form-control" id="position" name="Position" required="">
                            <option value="">ກະລຸນາເລືອກ ຕຳແໜ່ງ:</option>  
                            @foreach ($data as $dt)
                              <option value="{{$dt->PositionID}}">{{$dt->PositionName}}</option>
                            @endforeach 
              
                            </select>
                      </div>

                      <div class="form-group">
                          <label for="inputText4" class="col-form-label">ບ່ອນປະຈຳການ</label>
                          <select class="form-control" id="location" name="Location" required="">
                            <option value="">ກະລຸນາເລືອກ ບ່ອນປະຈຳການ:</option>
                            @foreach ($data1 as $dsl)
                              <option value="{{$dsl->SDListID}}">{{$dsl->SDlistName}}</option>
                            @endforeach 
              
                            </select>
                      </div>

                      <div class="form-group">
                          <label for="inputText5" class="col-form-label">ວັນທີ່ເລີ້ມວຽກ</label>
                          <input class="form-control" id="date" name="Reg_date" type="date" required="">
                      </div>

                      <div class="form-group">
                          
                          <label for="sex">Sex:</label>
                            <select class="form-control" id="sex" name="Sex" required="">
                              <option value="">choose</option>
                              <option value="M">Male</option>
                              <option value="F">Female</option>
              
                            </select>
                      </div>


                      
                      <div class="custom-file mb-3">
                          <input type="file" class="custom-file-input" id="customFile" name="Logo">
                          <label class="custom-file-label" for="customFile">Picture Profile</label>
                      </div>

                      
                      <button type="submit" class="btn btn-success">save</button>
                  </form>
              </div>
        </div>

        
      </div>
      <!-- /.container-fluid -->
@endsection