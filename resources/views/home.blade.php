@extends('layouts.app')

@section('content')
<div class="container">
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
                 @if(count($tasks)<=0)
                     You Don't have any task yet!!
                     May be <a href="" >Create</a> one?
                        @else
<table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Order</th>
                <th scope="col">Ending Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <th>{{$task->name}}</th>
                    <th>{{$task->description}}</th>
                    <th>{{$task->order}}</th>
                    <th>{{$task->ending_time}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
