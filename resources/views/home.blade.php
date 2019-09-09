@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<div>
  
                   <h3>Data Login</h3>
                    
                   <h4>Email : {{Auth::user()->email}}</h4>
                   <h4>password anda : {{Auth::user()->random_pass}}</h4> <br>
                    You are logged in!  

</div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
