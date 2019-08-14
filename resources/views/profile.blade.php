@extends('common.main')
@section('title','Profile')
@section('content')

 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>


        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-users"></i>
            ປະຫວັດ ແລະ ການເຄື່ອນໄຫວ</div>

         <div class="card-body">
         	<div class="row">
				<div class="col-md-3 col-lg-3">
                    {{-- <img class="img-circle"
                         src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100"
                         alt="User Pic"> --}}

                    <img class="img-circle" style="max-height: 300px; max-width: 150px; border-radius: 50%;" src="{{url('/')}}/upload/{{$profile->logo}}" alt="logo">
                </div>


                <div class="col-md-9 col-lg-9">
                    <strong>{{$profile->fname}} {{$profile->lname}}</strong><br>
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Department :</td>
                            <td>{{$profile->location}}</td>
                        </tr>
                        <tr>
                            <td>Position :</td>
                            <td>{{$profile->Position}}</td>
                        </tr>
                        <tr>
                            <td>Birthdate :</td>
                            <td>{{$profile->birthdate}}</td>
                        </tr>
                        <tr>
                            <td>Education :</td>
                            <td>{{$profile->LevelName}}</td>
                        </tr>
                        <tr>
                            <td>Gender :</td>
                            <td>{{$profile->gender}}</td>
                        </tr>
                        <tr>
                            <td>Member's Date :</td>
                            <td>{{$profile->memberdate}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            
            </div>
          <div class="card-footer small text-muted">Updated on {{ date('Y-m-d H:i:s') }} PM</div>

        
        </div> 

		<div class="card mb-3">
          <div class="card-header">
            <i class="fab fa-dev"></i>
            ການເຄື່ອນໄຫວວຽກງານຊາວໜຸ່ມ</div>

         <div class="card-body">
			<div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>LastName</th>
                    <th>Location</th>
                    <th>Act date</th>
                    <th>Act mode</th>
                    <th>Description</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>LastName</th>
                    <th>Location</th>
                    <th>Act date</th>
                    <th>Act mode</th>
                    <th>Description</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($data as $key => $list)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$list->fname}}</td>
                    <td>{{$list->lname}}</td>
                    <td>{{$list->location}}</td>
                    <td>{{$list->actdate}}</td>
                    <td>{{$list->actmode}}</td>
                    <td>{{$list->description}}</td>
                    <td>
                      @if(request()->user()->role === 'admin' || request()->user()->role === 'superadmin')
                      <a class="btn btn-outline-primary" href="">Edit</a>
                        <form action="" method="post">
                            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}">  for delete method
                            <input type="hidden" name="_method" value="delete"> --}}   
                            @csrf 
                           <button onclick="return confirmdelete();" class="btn btn-outline-danger">Delete</button>
                        </form>
                        @else

                          @if(request()->user()->role === 'writer')
                             <a class="btn btn-outline-primary" href="">Edit</a>
                          @endif

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

        <div class="card mb-3">
          <div class="card-header">
            <i class="fab fa-facebook-square"></i>
            ການເຄື່ອນໄຫວວຽກງານກຳມະບານ</div>

         <div class="card-body">
			<div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>LastName</th>
                    <th>Location</th>
                    <th>Act date</th>
                    <th>Act mode</th>
                    <th>Description</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>LastName</th>
                    <th>Location</th>
                    <th>Act date</th>
                    <th>Act mode</th>
                    <th>Description</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($data1 as $keys => $list1)
                  <tr>
                    <td>{{$keys+1}}</td>
                    <td>{{$list1->fname}}</td>
                    <td>{{$list1->lname}}</td>
                    <td>{{$list1->location}}</td>
                    <td>{{$list1->actdate}}</td>
                    <td>{{$list1->actmode}}</td>
                    <td>{{$list1->description}}</td>
                    <td>
                      @if(request()->user()->role === 'admin' || request()->user()->role === 'superadmin')
                      <a class="btn btn-outline-primary" href="">Edit</a>
                        <form action="" method="post">
                            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}">  for delete method
                            <input type="hidden" name="_method" value="delete"> --}}   
                            @csrf 
                           <button onclick="return confirmdelete();" class="btn btn-outline-danger">Delete</button>
                        </form>
                        @else

                          @if(request()->user()->role === 'writer')
                             <a class="btn btn-outline-primary" href="">Edit</a>
                          @endif

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
		
		@if($profile->gender === 'F')
			<div class="card mb-3">
          <div class="card-header">
            <i class="fab fa-github"></i>
            ການເຄື່ອນໄຫວວຽກງານແມ່ຍິງ</div>

         <div class="card-body">
			<div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>LastName</th>
                    <th>Location</th>
                    <th>Act date</th>
                    <th>Act mode</th>
                    <th>Description</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>LastName</th>
                    <th>Location</th>
                    <th>Act date</th>
                    <th>Act mode</th>
                    <th>Description</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($data2 as $keyword => $list2)
                  <tr>
                    <td>{{$keyword+1}}</td>
                    <td>{{$list2->fname}}</td>
                    <td>{{$list2->lname}}</td>
                    <td>{{$list2->location}}</td>
                    <td>{{$list2->actdate}}</td>
                    <td>{{$list2->actmode}}</td>
                    <td>{{$list2->description}}</td>
                    <td>
                      @if(request()->user()->role === 'admin' || request()->user()->role === 'superadmin')
                      <a class="btn btn-outline-primary" href="">Edit</a>
                        <form action="" method="post">
                            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}">  for delete method
                            <input type="hidden" name="_method" value="delete"> --}}   
                            @csrf 
                           <button onclick="return confirmdelete();" class="btn btn-outline-danger">Delete</button>
                        </form>
                        @else

                          @if(request()->user()->role === 'writer')
                             <a class="btn btn-outline-primary" href="">Edit</a>
                          @endif

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
		@endif

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