<x-layout>

  {{-- Session status --}}
  @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
  @endif

  {{-- Validation errors --}}
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  
  {{-- Form --}}
  <div class="container-fluid">
    <div class="row align-self-center">
      <div class="col-lg-10 col-xl-9 m-auto">
        <div class="card flex-row my-5 shadow">
          <div class="card-body">
            <h5 class="card-title text-center">LOGIN</h5>
            <form method="POST" action="{{route('login')}}" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                      <label for="userMail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="userMail">
                    </div>
                    <div class="mb-3">
                      <label for="userPass" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="userPass">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <p class="mt-2">
                      Not yet subscribed? <a class="tc-accent" href="{{'register'}}"> Subscribe here</a>
                    </p>
                    @if(Route::has('password.request'))
                      <a href="{{route('forgot-password')}}" class="btn btn-link">Forgot your password?</a>
                    @endif
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>

</x-layout>