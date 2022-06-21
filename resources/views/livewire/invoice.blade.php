<form action="{{ route('invoices.store') }}" method="post">
    @csrf
    <input type="hidden" value="{{ $productId }}" name="product_id">
      <input type="hidden" value="{{ $product_name }}" name="product_name">
    <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
            <tr>
                <th class="text-center"> SN </th>
                <th class="text-center"> Good </th>
                <th class="text-center"> Quantity </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sellGoods as $index => $sellGood)
                <tr>
                    <td>{{ $sn++ }}</td>
                    <td>
                        <select name="sellGoods[{{ $index }}][good_id]" class="form-control"
                            wire:model="sellGoods.{{ $index }}.good_id">
                            <option selected hidden disabled>--Choose--</option>
                            @foreach ($allGoods as $allGood)
                                <option value=" {{ $allGood->id }}">
                                    {{ $allGood->name . ' ' }}({{ $allGood->sp . ' ' }}Rs.)</option>
                            @endforeach
                        </select>
                    </td>

                    <td><input wire:model="sellGoods.{{ $index }}.quantity" type="number" class="form-control"
                            name="sellGoods[{{ $index }}][quantity]" /></td>

                    <td>
                        <a class="btn btn-sm btn-danger text-white" href="#"
                            wire:click.prevent="removeProduct({{ $index }})">Delete</a>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-sm btn-primary " wire:click.prevent="addSell({{ $rate }})">+ Add Another
                Product</button>
        </div>
    </div>
    <hr>
    <input onclick="return confirm('Are you sure? You can not modify the product once you sell. Check once if same product for multiple time');" type="submit" value="Sell & genarate slip" class="btn btn-sm btn-success text-white float-right">

</form>
