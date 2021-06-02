@extends('layout')

@section('title', 'Form')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 p-0 mt-3 mb-2">
            <div class="px-0 pt-4 pb-0 mt-3 mb-3">

                @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
                @elseif (session('errors'))
                <div class="alert alert-danger text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('errors') }}</h4>
                </div>
                @endif

                <form action="{{ route('send') }}" class="form" method="POST" id="myForm">
                    @csrf
                    <fieldset class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" maxlength="100" required>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="body">Date</label>
                        <input type="datetime-local" id="date" name="date" class="form-control" required>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="3" maxlength="255"
                            required></textarea>
                    </fieldset>

                    <div class="text-center">
                        <a href="{{ route('index') }}" class="btn btn-primary">Check lists</a>
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
