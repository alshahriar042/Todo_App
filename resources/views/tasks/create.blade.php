@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Task') }}</div>

                    <form method="POST" action="{{ route('task.save') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Description" class="col-md-4 col-form-label text-md-right">
                                {{ __('Description') }}
                            </label>
                            <div class="col-md-6">
                             <textarea id="description" class="form-control  @error('description')
                             is-invalid @enderror"
                                name="description"
                                autofocus>
                             </textarea>

                            </div>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>



                        <div class="form-group row">
                            <label for="Ending Date" class="col-md-4 col-form-label text-md-right">
                                {{ __('Ending Date') }}
                            </label>
                            <div class="col-md-6">
                             <input id="ending_time" type="datetime-local" class="form-control  @error('ending_time')
                                 is-invalid @enderror"
                                       name="ending_time"
                                       autofocus >
                            @error('ending_time')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Task') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
