@extends('layouts/app', ['activePage' => 'welcome', 'title' => 'Test Publianagrama'])

@section('content')
    <div class="full-page section-image" data-color="white" data-image="">
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-8">

                                        <div class="row">

                                            <div class="card col-md-12">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-8">
                                                            <h3 class="mb-0">{{ __('Nueva Evaluación') }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form method="post" action="{{ route('evaluation.store') }}" autocomplete="off"
                                                        >
                                                        @csrf


                                                        @include('alerts.success')
                                                        @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                                                        <div class="pl-lg-4">
                                                            <div class="rating form-group{{ $errors->has('rating') ? ' has-danger' : '' }}">

                                                                    <label>
                                                                        <input type="radio" name="rating" value="1" />
                                                                        <span class="icon">★</span>
                                                                    </label>
                                                                    <label>
                                                                        <input type="radio" name="rating" value="2" />
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                    </label>
                                                                    <label>
                                                                        <input type="radio" name="rating" value="3" />
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                    </label>
                                                                    <label>
                                                                        <input type="radio" name="rating" value="4" />
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                    </label>
                                                                    <label>
                                                                        <input type="radio" name="rating" value="5" />
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                    </label>

                                                                @include('alerts.feedback', ['field' => 'rating'])
                                                            </div>


                                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                                <label class="form-control-label" for="input-name">
                                                                    {{ __('Nombre') }}
                                                                </label>
                                                                <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" value="{{ old('name') }}" required autofocus>

                                                                @include('alerts.feedback', ['field' => 'name'])
                                                            </div>
                                                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                                                <label class="form-control-label" for="input-title">
                                                                    {{ __('Titulo') }}
                                                                </label>
                                                                <input type="text" name="title" id="input-title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Titulo') }}" value="{{ old('title') }}" required autofocus>

                                                                @include('alerts.feedback', ['field' => 'title'])
                                                            </div>
                                                            <div class="form-group{{ $errors->has('eval') ? ' has-danger' : '' }}">
                                                                <label class="form-control-label" for="input-eval">
                                                                    {{ __('Evaluación') }}
                                                                </label>
                                                                <textarea rows="10" type="text" name="eval" id="input-eval" class="form-control{{ $errors->has('eval') ? ' is-invalid' : '' }}" placeholder="{{ __('Evaluacion') }}" required autofocus>{{ old('eval') }}</textarea>

                                                                @include('alerts.feedback', ['field' => 'eval'])
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-default mt-4">{{ __('Guardar') }}</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>


                                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
@endpush
