 @extends('common.main')
 @section('title','ການຈ່າຍເງິນສະຕິ')
 @section('content')
 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">payment</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <h5 class="card-header">Payments</h5>
            <div class="card-body">
                <form action="{{route('webadmin.savepayment')}}" method="post" enctype="multipart/form-data">
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
                        <label for="inputText3" class="col-form-label">Year :</label>
                        <select class="form-control" name="YearPay" required="">
                          <option value="">ເລືອກປີ:</option>
                          @foreach ($array_year as $year)
                          <option value="{{$year}}">{{ $year }}</option>
                          @endforeach
                        </select>

                    </div>

                    <div class="form-group purple-border">
                        <label for="inputText4" class="col-form-label">Payment for:</label>
                        <select class="form-control" name="Paytype" required="">
                          <option value="">ເລືອກໝວດ :</option>
                          <option value="1">ຊາວໜຸ່ມ</option>
                          <option value="2">ແມ່ຍິງ</option>
                          <option value="3">ກຳມະບານ</option>
                          
                        </select>

                    </div>

                    <div class="form-group purple-border">
                        <label for="inputText5" class="col-form-label">Amount:</label>
                        {{-- <input id="inputText5" type="text" class="form-control" name="Total" required="" placeholder="10000"> --}}
                         <select class="form-control" name="Total" required="">
                          <option value="">ເລືອກຈຳນວນ :</option>
                          <option value="5000">5,000 ກີບ/1ເດືອນ</option>
                          <option value="10000">10,000 ກີບ/2ເດືອນ</option>
                          <option value="15000">15,000 ກີບ/3ເດືອນ</option>
                          <option value="20000">20,000 ກີບ/4ເດືອນ</option>
                          <option value="25000">25,000 ກີບ/5ເດືອນ</option>
                          <option value="30000">30,000 ກີບ/6ເດືອນ</option>
                          <option value="35000">35,000 ກີບ/7ເດືອນ</option>
                          <option value="40000">40,000 ກີບ/8ເດືອນ</option>
                          <option value="45000">45,000 ກີບ/9ເດືອນ</option>
                          <option value="50000">50,000 ກີບ/10ເດືອນ</option>
                          <option value="55000">55,000 ກີບ/11ເດືອນ</option>
                          <option value="60000">60,000 ກີບ/12ເດືອນ</option>
                          
                        </select>
                    </div>
{{--                     
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile" name="Logo">
                        <label class="custom-file-label" for="customFile">Logo</label>
                    </div>
 --}}
                    <div class="form-group purple-border">
                        <label for="exampleFormControlTextarea1">Job description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="PayDetail" placeholder="ຈ່າຍເປັນ 3 ເດືອນ,6 ເດືອນ, 9 ເດືອນ ຫຼື ໝົດປີ" required=""></textarea>
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