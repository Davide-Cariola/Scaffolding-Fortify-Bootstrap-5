<x-layout>

    {{-- Session status --}}
    @if (session('status'))
        <div class="alert alert-success" role="alert">
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
                        <h5 class="my-3">SET NEW PASSWORD</h5>
                        <form action="{{route('password.update')}}" method="POST">
                            @csrf
                            
                            <input type="hidden" name="token" value="{{ request()->route('token') }}">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label">New Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPasswordConfirmation" class="form-label">Confirm New Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword">
                            </div>
                            <button type="submit" class="btn btn-primary">Reset the password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>