@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
            <div class="card">

                <div class="card-header">DATA USER</div>

                <div class="card-body">
                    <div class="col-md-12 mb-2">
                       @if (Auth::user()->role->name != "Member")
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#usermodal">
                          Add User
                      </button>
                      @else

                      @endif
                  </div>
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Email</th>
                          <th scope="col">Random Password</th>
                          <th scope="col">Role</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=1  ?>
                    @foreach ($data as $dat)
                    <tr>  
                      <th scope="row">{{$no}}</th>
                      <td>{{$dat->name}}</td>
                      <td>{{$dat->email}}</td>
                      <td>{{$dat->random_pass}}</td>
                      <td>{{$dat->role->name}}</td>
                      @if (Auth::user()->role->name != "Member")
                      
                      <td>
                          <a href="{{route('user.edit',['id'=> $dat->id])}}" class="btn btn-warning btn-sm"> Edit</a>
                          <a href="{{route('user.delete',['id'=> $dat->id])}}" class="btn btn-danger btn-sm"> Delete</a>
                          <a href="{{route('user.assign',['id'=> $dat->id])}}" class="btn btn-danger btn-sm"> assign menu</a>
                         
                      </td> 
                      
                      @else 
                      <td>
                          --
                      </td>
                      @endif

                  </tr>
                  <?php $no++ ?>
                  @endforeach
              </tbody>
          </table>

      </div>
  </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="usermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <div class="card-body">
        <form method="POST" action="{{ route('user.create') }}" id="formadduser">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                <div class="col-md-6">
                   <select class="custom-select" name="role">
                    <option selected>Choose...</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>

                @error('Role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <!-- <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div> -->

        <!-- <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div> -->
    </form>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" form="formadduser" value="submit">{{ __('Register') }}</button>
</div>
</div>
</div>
</div>


</div>
@endsection
@push('scripts')

@endpush
