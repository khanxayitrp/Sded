 @extends('common.main')
 @section('title','ການເຄື່ອນໄຫວກິດຈະກຳ')
 @section('content')
 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Activity</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <h5 class="card-header">ກິດຈະກຳການເຄື່ອນໄຫວ</h5>
            <div class="card-body">
                <form action="{{route('webadmin.saveactivity')}}" method="post" enctype="multipart/form-data">
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
                          <label for="inputText5" class="col-form-label">ວັນທີປະຕິບັດ:</label>
                          <input class="form-control" id="date" name="Act_date" type="date" required="">
                      </div>

                    <div class="form-group purple-border">
                        <label for="inputText4" class="col-form-label">ໝວດອົງການຈັດຕັ້ງ:</label>
                        <select class="form-control" name="Act_type" required="">
                          <option value="">ເລືອກໝວດອົງການຈັດຕັ້ງ :</option>
                          <option value="1">ວຽກງານຊາວໜຸ່ມ</option>
                          <option value="2">ວຽກງານແມ່ຍິງແມ່ຍິງ</option>
                          <option value="3">ວຽກງານກຳມະບານ</option>
                          
                        </select>

                    </div>

                    <div class="form-group purple-border">
                        <label for="inputText5" class="col-form-label">ປະເພດກິດຈະກຳ</label>
                        
                        <select class="form-control" name="Acttypename" required="">
                          <option value="">ກະລຸນາເລືອກປະເພດກິດຈະກຳ:</option>
                          @foreach ($data1 as $acttype)
                          <option value="{{ $acttype->Act_id }}">{{$acttype->Act_Typename }}</option>
                          
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group purple-border">
                        <label for="exampleFormControlTextarea1">description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="Description" placeholder="ລະບຸກິດຈະກຳທີ່ຮ່ວມ" required=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">save</button>
                </form>
            </div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

      </div>
      <!-- /.container-fluid -->
@endsection