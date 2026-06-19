{{-- @extends('layouts.app')

@section('content') --}}

<a href="{{ url('/') }}"><img src="{{ asset($appSetting->logo) }}" alt="logo"></a>
<h1 style="text-align:center;">Thank you for using this page!</h1>
<p style="text-align:center;">Click <strong><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Here</a></strong> to logout.</p>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>

<style>
img {
  margin: 0 auto;
  display: block;
  margin-top: 20%;
}
</style>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- @endsection --}}
