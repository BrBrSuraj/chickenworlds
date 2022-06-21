@extends('layouts.app')

@section('content')
    <div class="card mb-4 mt-0">
        <div class="card-header">
            {{ __('Receive Your Order') }}
        </div>
        <div class="card-body">
            <div class="row mt-4">

                    <h5>Receive Your Orderd Product with Some Changes if needed.</h5>
                    <hr class="col-md-11 bg-danger" style="height:3px;width:97%">
                  <form action="{{ route('orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="">Weight</label>
                            <input type="number" class="form-control  @error('weight') is-invalid @enderror" type="number" name="weight" id="" value="{{ $order->weight }}">
                            @error('weight')
                                <p class="text-danger text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Rate</label>
                            <input type="number" class="form-control  @error('rate') is-invalid @enderror" type="number" name="rate" id="" value="{{ $order->rate }}">
                            @error('rate')
                                <p class="text-danger text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="number" class="form-control  @error('qty') is-invalid @enderror" type="number" name="qty" id="" value="{{ $order->qty }}">
                            @error('qty')
                                <p class="text-danger text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Finish</button>
                    </form>








            </div>
        </div>
    </div>
@endsection
