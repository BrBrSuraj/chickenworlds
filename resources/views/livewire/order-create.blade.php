<div>
    <form wire:submit.prevent="order">
        @csrf
        {{-- selection of goods --}}
        <div class="row">
            <h5>Selection of Product</h5>
            <hr class="col-md-11 col-sm-11 bg-danger" style="height:3px;width:97%">
            <div class="col-md-4">
                <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <select wire:model="selectedCategory"
                        class="form-control  @error('selectedCategory') is-invalid @enderror" name="selectedCategory"
                        required autofocus>
                        <option value="">--Select Category--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        {{  $category->id }}
                    </select>
                    @error('selectedCategory')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <select wire:model="selectedProduct"
                        class="form-control  @error('selectedProduct') is-invalid @enderror" name="selectedProduct"
                        required autofocus>
                        <option value="">--Select Product--</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>

                    @error('selectedProduct')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

        </div>

        {{-- selection of supplier --}}
        <div class="row mt-2">
            <h5>Selection of Suppliers</h5>
            <hr class="col-md-11 col-sm-11 bg-danger" style="height:3px;width:97%">
            <div class="col-md-2">
                <div class="form-check">

                    <input wire:model="selectedSupplier" class="form-radio-input" type="radio" name="selectedSupplier"
                        id="farmer" value="farmer" selected>
                    <label class="form-check-label form-check-inline" for="flexRadioDefault1">
                        Farmer
                    </label>

                </div>
                <div class="form-check form-check-inline mt-1">

                    <input wire:model="selectedSupplier" class="form-radio-input" type="radio" name="selectedSupplier"
                        id="" value="firm">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Firm/person
                    </label>
                </div>
                @error('selectedSupplier')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-10">
                <div class="form form-inline">
                    @if ($selectedSupplier != null)
                        <table class="table table-sm text-center">
                            <tr class="text-center">
                                <td>
                                    <label class="label" for="flexRadioDefault2">
                                        {{ strtoupper($selectedSupplier)}} Name
                                    </label>
                                    <input wire:model="supplierName" class="form-control" type="text"
                                        name="supplierName">
                                    @error('supplierName')
                                        <p class="text-danger text-sm">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label class="form-label" for="flexRadioDefault2">
                                        {{ strtoupper($selectedSupplier) }} Address
                                    </label>
                                    <input wire:model="supplierAddress" class="form-control" type="text"
                                        name="supplierAddress" id="">
                                    @error('supplierAddress')
                                        <p class="text-danger text-sm">{{ $message }}</p>
                                    @enderror
                                </td>

                                <td>
                                    <label class="form-label" for="flexRadioDefault2">
                                        {{ strtoupper($selectedSupplier) }} Mob.No.
                                    </label>
                                    <input wire:model="supplierMobileNumber" class="form-control" type="text"
                                        name="supplierMobileNumber" id="">
                                    @error('supplierMobileNumber')
                                        <p class="text-danger text-sm">{{ $message }}</p>
                                    @enderror
                                </td>
                                    @if ($selectedSupplier=="firm")
                                 <td>
                                    <label class="form-label" for="flexRadioDefault2">
                                        {{ strtoupper($selectedSupplier) }} Rate
                                    </label>
                                    <input wire:model="customRate" class="form-control" type="number"
                                        name="customRate" id="" value="" required autofocus>
                                    @error('customRate')
                                        <p class="text-danger text-sm">{{ $message }}</p>
                                    @enderror
                                </td>
                                    @else
                                      <td class="bg-info">
                                    <p class="h3 mt-3 text-bold pr-2 pl-2 text-danger">
                                  Rate: {{ $rate }}
                                    </p>
                                </td>
                                    @endif
                            </tr>

                        </table>
                    @endif
                </div>
            </div>
        </div>
        {{-- end of supplier section --}}
        {{-- __________________________________________________________________________________________________ --}}

        {{-- specify weight and rate of goods --}}
        <div class="row mt-4">
            <h5>Amount/Weight Spcefication</h5>
            <hr class="col-md-11 bg-danger" style="height:3px;width:97%">

            <div class="col-md-4">
                <div class="input-group mb-3 col-12"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg></span>
                    <input wire:model="weight" class="form-control  @error('weight') is-invalid @enderror" type="number"
                        name="weight" placeholder="{{ __('weight in kg.') }}" autofocus>
                    @error('weight')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>



        </div>

        {{-- end of Weight/Amount --}}


        {{-- selection of payment method --}}
        <div class="row ml-1 mt-4">
            <h5>Selection of Payment Method</h5>
            <hr class="col-md-12 col-sm-11 bg-danger" style="height:3px;width:95%">
            <div class="col-md-12 mt-2 p-1 mb-2 ml-3">

                <div class="form-check form-check-inline mt-1">
                    <input wire:model="selectedPayment" class="form-radio-input" type="radio" name="selectedPayment"
                        value="cheque">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Cheque
                    </label>
                </div>

                <div class="form-check form-check-inline mt-1">
                    <input wire:model="selectedPayment" class="form-radio-input" type="radio" name="selectedPayment"
                        value="banking">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Mobile Banking
                    </label>
                </div>

                <div class="form-check form-check-inline mt-1">
                    <input wire:model="selectedPayment" class="form-radio-input" type="radio" name="selectedPayment"
                        id="esewa" value="esewa">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Esewa
                    </label>
                </div>

                <div class="form-check form-check-inline mt-1">
                    <input wire:model="selectedPayment" class="form-radio-input" type="radio" name="selectedPayment"
                        id="credit" value="khalti">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Khalti
                    </label>
                </div>

                <div class="form-check form-check-inline mt-1">
                    <input wire:model="selectedPayment" class="form-radio-input" type="radio" name="selectedPayment"
                        id="credit" value="vauchar">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Bank Vauchar
                    </label>
                </div>

                <div class="form-check form-check-inline mt-1">
                    <input wire:model="selectedPayment" class="form-radio-input" type="radio" name="selectedPayment"
                        id="credit" value="cash">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Cash on Delivers
                    </label>
                </div>

                @error('selectedPayment')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group form-inline">
                @if ($selectedPayment != null && $selectedPayment!="cash")
                    <table class="table ml-2">
                        <tr class="m-2 p-2">
                            <td>
                                {{ $titleName }}<br>
                            </td>

                            <td>
                                <input wire:model="titlesName" type="text" class="form-control m-2 p-2 form-control-sm"
                                    id="" value="">
                                @error('titlesName')
                                    <p class="text-danger text-sm">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                {{ $typeId }}<br>
                            </td>
                            <td>
                                <input wire:model="typesId" type="number" class="form-control m-2 p-2 form-control-sm"
                                    id="" value="" name="typesId">
                                @error('typesId')
                                    <p class="text-danger text-sm">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                {{ $issuedName }}<br>
                            </td>
                            <td>
                                <input wire:model="issuesName" type="text" class="form-control m-2 p-2 form-control-sm"
                                    id="" value="">
                                @error('issuesName')
                                    <p class="text-danger text-sm">{{ $message }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ $issueDate }}<br>
                            </td>
                            <td>
                                <input wire:model="issuesDate" type="date" class="form-control m-2 p-2 form-control-sm"
                                    id="" value="">
                                @error('issuesDate')
                                    <p class="text-danger text-sm">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                {{ $typeImage }}<br>
                            </td>
                            <td>
                                  @if ($typesImage)
<img style="height: 100px; weight:100px; float:inline-end" src="{{ $typesImage->temporaryUrl() }}" class="img-fluid img-thumbnail rounded">
    @endif
                                <input wire:model="typesImage" type="file" class=" form-control m-2 p-2 form-control-sm"
                                    id="" value="">
                                @error('typesImage')
                                    <p class="text-danger text-sm">{{ $message }}</p>
                                @enderror


                            </td>
                        </tr>
                    </table>
                @endif

            </div>

        </div>
        {{-- end of election of payment method --}}

        {{-- vaichele and staffs selection --}}
        <div class=row ml-1 mt-4>
            <div class="row mt-2">
                <h5>Selection Vaichele/Staff</h5>
                <hr class="col-md-12 col-sm-11 bg-danger" style="height:3px; width:97%;">
                <div class="col-md-8 mt-1 mb-3">

                    <select wire:model="vaichele" class="form-control col-md-6 @error('vaichele') is-invalid @enderror"
                        name="vaichele" required autofocus>
                        <option value="">--Select Vaichele--</option>
                        @foreach ($vaicheles as $vaichele )
                         <option value="{{ $vaichele->number }}">{{ $vaichele->number }}</option>
                        @endforeach

                    </select>
                    @error('vaichele')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror

                </div>
                <br>
                <div class="col-md-6">

                    <select id="staff" wire:model="staff" name="staff"
                        class="mb-4 p-1 form-multi-select @error('staff') is-invalid @enderror" multiple autofocus
                        multiple data-coreui-search="true" id="ms1">
                        <option value="" selected disabled>--Select Staffs--</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                        @endforeach
                    </select>

                    @error('staff')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                @if ($staff != null)
                    <div class="col-md-5 text-warning">
                        <p>You Select {{ implode(',' . '  ', $staff) }} for new load.</p>
                    </div>
                @endif

            </div>
        </div>
        {{-- vaichele and staffs selection --}}



        {{-- submit button --}}
        <div class="row mt-1">
            <div class="col-2 rounded">
                <button class="btn btn-primary px-4" type="submit">{{ __('Processed to Buy') }}</button>
            </div>
            <div class="col-4">
               @if( Session::has("message") )
  <div class="alert alert-success alert-block" role="alert">
  <button class="close" data-dismiss="alert"></button>
  {{ Session::get("message") }}
 </div>
 @endif
            </div>

            {{-- end submit button --}}

        </div>





        <!-- end of form -->
    </form>


</div>
