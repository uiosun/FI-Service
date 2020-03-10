@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">个人资料</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    昵称：{{ Auth::user()->name }} (<button></button>)<br>
                    点数：{{ Auth::user()->point }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
