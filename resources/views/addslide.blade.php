 @extends('common.main')
 @section('title','ເພີ້ມຮູບສະໄລ')
 @section('content')
 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">slide show</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <h5 class="card-header">ເພີ້ມ Slide ໃໝ່</h5>
              <div class="card-body">
                  <form action="{{route('webadmin.saveslideshow')}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group purple-border">
                          <label for="inputText1" class="col-form-label">ຊື່ File :</label>
                          
                          <input id="LocationName" type="text" class="form-control" name="Name" required="">
                        </div>

                        <div class="custom-file mb-3">
                          <input type="file" class="custom-file-input" id="slide" name="slide" required="">
                          <label class="custom-file-label" for="customFile">Choose image/picture :</label>
                      </div>
                                            
                      <button type="submit" class="btn btn-success">ເພີ້ມ</button>
                  </form>
              </div>
        </div>

        
      </div>
      <!-- /.container-fluid -->
@endsection