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

                <div class="card-header">DATA ASSIGN</div>

                <div class="card-body">
                    <div class="col-md-12 mb-2">
                       @if (Auth::user()->role->name != "Member")
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#usermodal">
                          Add Assign
                      </button>
                      @else

                      @endif
                  </div>
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">name</th>
                          <th scope="col">desc</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=1  ?>
                    @foreach ($data as $dat)
                    <tr>  
                      <th scope="row">{{$no}}</th>
                      <td>{{$dat->name}}</td>
                      <td>{{$dat->description}}</td>
                     
                      @if (Auth::user()->role->name != "Member")
                      
                      <td>
                         <!--  <a href="{{route('user.edit',['id'=> $dat->id])}}" class="btn btn-warning btn-sm"> Edit</a>
                          <a href="{{route('user.delete',['id'=> $dat->id])}}" class="btn btn-danger btn-sm"> Delete</a> -->
                         
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
        <h5 class="modal-title" id="exampleModalLabel">Add Assign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <div class="card-body">
        <form method="POST" action="{{ route('assign.create') }}" id="formadduser">
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
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                  <textarea class="form-control  @error('description') is-invalid @enderror" id="description" rows="3" value="{{ old('description') }}" name="description">
                    
                  </textarea>
                    @error('description')
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
    <button type="submit" class="btn btn-primary" form="formadduser" value="submit">{{ __('Add') }}</button>
</div>
</div>
</div>
</div>


</div>
@endsection
@push('scripts')

@endpush
