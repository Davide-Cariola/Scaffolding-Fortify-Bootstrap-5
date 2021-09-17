<x-layout>

    {{-- Session status --}}
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

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
    <div class="container-fluid">
        <div class="row align-self-center">
            <div class="col-lg-10 col-xl-9 m-auto">
                <div class="card flex-row my-5 shadow">
                    <div class="card-body">
                        <h1 class="my-3">REQUEST A NEW PASSWORD</h1>
                        <form action="{{route('password.email')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Request a new password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>