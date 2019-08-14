 @extends('common.main')
 @section('title','Dashboard')
 @section('content')
 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">ສະມາຊິກ ພັກ ມີທັງຫມົດ {{$data1}} ຄົນ</div>
              </div>
              @auth
              <a class="card-footer text-white clearfix small z-1" href="{{route('webadmin.listlaomember')}}">
              @else
              <a class="card-footer text-white clearfix small z-1" href="#">
              @endauth
              
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">ສະມາຊິກຊາວໜຸ່ມມີທັງຫມົດ {{$data2}} ຄົນ</div>
              </div>
              @auth
              <a class="card-footer text-white clearfix small z-1" href="{{route('webadmin.listyouth')}}">
              @else
              <a class="card-footer text-white clearfix small z-1" href="#">
              @endauth
              
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">ສະມາຊິກແມ່ຍິງມີທັງຫມົດ {{$data3}} ຄົນ</div>
              </div>
               @auth
              <a class="card-footer text-white clearfix small z-1" href="{{route('webadmin.listwomen')}}">
              @else
              <a class="card-footer text-white clearfix small z-1" href="#">
              @endauth
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">ສະມາຊິກກຳມະບານມີທັງຫມົດ {{$data4}} ຄົນ</div>
              </div>
              @auth
              <a class="card-footer text-white clearfix small z-1" href="{{route('webadmin.listlaoworker')}}">
              @else
              <a class="card-footer text-white clearfix small z-1" href="#">
              @endauth
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>


<div align="center" id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach($slide as $keyslide => $slideshow)
      <div class="carousel-item{{ $keyslide == 0 ? ' active' : '' }}">
      <a class="fancybox"  href="{{url('/')}}/upload/{{$slideshow->slidepath}}" title="{{$slideshow->slidename}}">
      <img class="sp-image" src="{{url('/')}}/upload/{{$slideshow->slidepath}}" 
            data-src="{{url('/')}}/upload/{{$slideshow->slidepath}}" 
            data-retina="{{url('/')}}/upload/{{$slideshow->slidepath}}" height="500" align="center"/>
          </a>
      {{-- <img src="..." class="d-block w-100" alt="..."> --}}
    </div>
    @endforeach
    {{-- <div class="carousel-item active">
      <a class="fancybox"  href="http://bqworks.com/slider-pro/images2/image1_medium.jpg" title="Twilight Memories (doraartem)">
      <img class="sp-image" src="http://bqworks.com/slider-pro/images2/image1_medium.jpg" 
            data-src="http://bqworks.com/slider-pro/images2/image1_medium.jpg" 
            data-retina="http://bqworks.com/slider-pro/images2/image1_large.jpg" height="500" align="center"/>
          </a>
      
    </div>
    <div class="carousel-item">
      <a class="fancybox"  href="http://bqworks.com/slider-pro/images2/image2_medium.jpg" title="Twilight Memories (doraartem)">
      <img class="sp-image" src="http://bqworks.com/slider-pro/images2/image2_medium.jpg" 
                data-src="http://bqworks.com/slider-pro/images2/image2_medium.jpg" 
                data-retina="http://bqworks.com/slider-pro/images2/image2_large.jpg" height="500" align="center"/>
              </a>
      
    </div>
    <div class="carousel-item">
      <a class="fancybox"  href="http://bqworks.com/slider-pro/images2/image3_medium.jpg" title="Twilight Memories (doraartem)">
      <img class="sp-image" src="http://bqworks.com/slider-pro/images2/image3_medium.jpg" 
            data-src="http://bqworks.com/slider-pro/images2/image3_medium.jpg" 
            data-retina="http://bqworks.com/slider-pro/images2/image3_large.jpg" height="500" align="center" />
          </a>
     
    </div> --}}
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

        
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
            ປະຫວັດການຈ່າຍເງິນສະຕິ</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ຊື່</th>
                    <th>ນາມສະກຸນ</th>
                    <th>ສັງກັດ</th>
                    <th>ວັນທີຈ່າຍ</th>
                    <th>ມູນຄ່າ</th>
                    <th>ລາຍລະອຽດການຈ່າຍ</th>
                    <th>ໝວດການຈ່າຍ</th>
                  
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>ລວມທັງໝົດ</th>
                    <th>{{ number_format($data6,2) }}</th>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($data5 as $key => $report)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$report->fname}}</td>
                    <td>{{$report->lname}}</td>
                    <td>{{$report->location}}</td>
                    <td>{{$report->Paydate}}</td>
                    <td>{{ number_format($report->total,2) }}</td>
                    <td>{{$report->PayDetail}}</td>
                    <td>{{$report->Paytype}}</td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated on {{ date('Y-m-d H:i:s') }} PM</div>
        </div>

        

        <!-- Area Chart Example-->
        {{-- <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Area Chart Example</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div> --}}

        

      </div>
      <!-- /.container-fluid -->


@endsection

