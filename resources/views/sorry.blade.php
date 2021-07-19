@extends('layouts.app')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center my-5">
            <h3 class=" h1 mb-2">Fail !!!</h3>
            <h2 class="mb-2"> Your transaction failed!</h2>
            <a href="{{route('home')}}">Home page</a>
            <div class="mt-4"
                @foreach(request()->all() as $k => $value)
                    <div>
                        {{$k}}: {{$value}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
