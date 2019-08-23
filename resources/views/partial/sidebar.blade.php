 <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('index')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
        
          @auth
          {{-- {{$userrole =auth::user()->role}}
          {{dd($userrole)}} --}}

          <a class="dropdown-item" href="{{route('webadmin.addstaff')}}">ເພີ້ມສະມາຊິກກົມ</a>
          <a class="dropdown-item" href="{{route('webadmin.addyouth')}}">ເພີ້ມສະມາຊິກຊາວໜຸ່ມ</a>
          <a class="dropdown-item" href="{{route('webadmin.addwomen')}}">ເພີ້ມສະມາຊິກແມ່ຍິງ</a>
          <a class="dropdown-item" href="{{route('webadmin.addlaoworker')}}">ເພີ້ມສະມາຊິກກຳມະບານ</a>
          <a class="dropdown-item" href="{{route('webadmin.addlaomember')}}">ເພີ້ມສະມາຊິກພັກ</a>
          <a class="dropdown-item" href="{{route('webadmin.addlaosoldier')}}">ເພີ້ມຜູ້ເປັນທະຫານ</a>
          <a class="dropdown-item" href="{{route('webadmin.payment')}}">ການຈ່າຍເງິນສະຕິ</a>
          <a class="dropdown-item" href="{{route('webadmin.addactivity')}}">ວຽກງານການເຄື່ອນໄຫວ</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          
          <a class="dropdown-item" href="{{route('webadmin.addactivitytype')}}">ເພີ້ມປະເພດກິດຈະກຳ</a>
          <a class="dropdown-item" href="{{route('webadmin.addlocation')}}">ເພີ້ມຊື່ບ່ອນປະຈຳການ</a>
          <a class="dropdown-item" href="{{route('webadmin.addposition')}}">ເພີ້ມຕຳແໜ່ງ</a>
          {{-- <a class="dropdown-item" href="forgot-password.html">Forgot Password</a> --}}
          @else
          <a class="dropdown-item" href="{{route('web.signin')}}">Login</a>
          <a class="dropdown-item" href="{{route('web.signup')}}">Register</a>
          {{-- <a class="dropdown-item" href="forgot-password.html">Forgot Password</a> --}}
          @endauth
          {{-- <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a> --}}
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('showcharts')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('webadmin.index')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>ສະມາຊິກທັງໝົດ</span></a>
      </li>

      <li class="nav-item">
          <div class="row">
            <div class="col-md-2">
                      
                    
              </div>
            <div class="col-md-8" align="Center">
                  <a href="#" data-toggle="modal" data-target="#flagModel1"><img class="img-responsive img-rounded" style="max-width: 50%;  float:left;" src="{{url('/')}}/img/lao.jpeg" title="ຊາດລາວ" alt="logo"></a>
                   <a href="#" data-toggle="modal" data-target="#flagModel2"><img class="img-responsive img-rounded" style="max-width: 50%; float:left;" src="{{url('/')}}/img/com.jpeg" title="ພັກປະຊາຊົນປະຕິວັດລາວ" alt="logo"></a> 
  
                    
              </div>
              {{-- <div class="col-md-4 col-md-offset-1">
   
                  <a href="#" data-toggle="modal" data-target="#flagModel2"><img class="img-responsive img-rounded" style="max-width: 100%; float:left;" src="{{url('/')}}/img/com.jpeg" title="ພັກປະຊາຊົນປະຕິວັດລາວ" alt="logo"></a>
                    
              </div> --}}
             
          </div>

          <div class="row">
            <div class="col-md-2">

              </div>
            <div class="col-md-8" align="Center">
              <a href="#"  data-toggle="modal" data-target="#flagModel3"><img class="img-responsive img-circle" style="max-width: 35%;  float:left; border-radius: 50%;" src="{{url('/')}}/img/laoworker.jpeg" title="ກຳມະບານລາວ" alt="logo"></a>
              <a href="#"  data-toggle="modal" data-target="#flagModel4"><img class="img-responsive img-circle" style="max-width: 33%;  float:left; border-radius: 50%;" src="{{url('/')}}/img/women.jpeg" title="ສະຫະພັນແມ່ຍິງລາວ" alt="logo"></a>
              <a href="#"  data-toggle="modal" data-target="#flagModel5"><img class="img-responsive img-circle" style="max-width: 32%;  float:left; border-radius: 50%;" src="{{url('/')}}/img/youth.jpeg" title="ຊາວໜຸ່ມປະຊາຊົນປະຕິວັດລາວ" alt="logo"></a>
                
     
              </div>
            

          </div>
            
        
      </li>
    </ul>
