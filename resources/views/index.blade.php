@extends('layout')

@section('title', 'List request')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 p-0 mt-3 mb-2">
            <div class="text-center">
                <a href="{{ route('form') }}" class="btn btn-primary">Go to Form</a>
            </div>
            <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Body</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log['id'] }}</td>
                            <td>{{ $log['email'] }}</td>
                            <td>{{ $log['date'] }}</td>
                            <td>{{ $log['body'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    @if ($logs->total() > $logs->count())
                    {{ $logs->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
