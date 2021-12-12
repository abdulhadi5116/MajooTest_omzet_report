@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Merchant') }}</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr class="table-success">
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Merchant</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($merchants as $merchant)
                                        <tr>
                                            <td>{{ $merchant->id }}</td>
                                            <td>{{ $merchant->merchant_name }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No Merchant exist for {{auth()->user()->name}}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
