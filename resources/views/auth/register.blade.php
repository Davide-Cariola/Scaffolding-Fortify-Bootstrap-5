<x-layout>

  {{-- Validation Errors --}}
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
  <div class="container-fluid h-100 m-0">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 shadow">
          <div class="card-body">
            <h5 class="card-title text-center">REGISTER</h5>
              <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="userName" class="form-label">User name</label>
                  <input type="text" name="name" class="form-control" id="userName">
                </div>
                <div class="mb-3">
                  <label for="userMail" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="userMail">
                </div>
                <div class="mb-3">
                    <label for="userPass" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="userPass">
                </div>
                <div class="mb-3">
                    <label for="confirmationPass" class="form-label">Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" id="confirmationPass">
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
                <p class="mt-2">
                  Already registered?<a class="tc-accent" href="{{'login'}}">Login here!</a>
                </p>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-layout>