<div>
    <x-flash-message/>
    <div class="p-5 mb-28">
    <a href="{{route('currency.index')}}">Gestion des devises</a>
    </div>
    <div class="flex flex-col justify-center items-center h-full w-screen">
        <form wire:submit.prevent="calculate" class="flex justify-center items-center flex-col space-y-8">
            <div class="flex">
                <div class="flex flex-col">
                    <label class="text-center" for="firstAmount">Montant 1</label>
                    <div class="flex">
                        <input wire:model="form.firstAmount" type="text" name="firstAmount" id="firstAmount">
                        <select class="p-2 bg-gray-400" wire:model="form.firstCurrency" name="firstCurrency"
                                id="firstCurrency">
                            @foreach($currencies as $currency)
                                <option value="{{$currency->code}}">{{$currency->code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="text-red-700">
                    @error('form.firstAmount') {{ $message }} @enderror
                        @error('form.firstCurrency') {{ $message }} @enderror
                </span>
                </div>

                <select wire:model="form.operator" class="mx-6 p-2 self-end bg-gray-400" name="operator" id="operator">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>

                <div class="flex flex-col">
                    <label class="text-center" for="secondAmount">Montant 2</label>
                    <div class="flex">
                        <input wire:model="form.secondAmount" type="text" name="secondAmount" id="secondAmount">
                        <select class="p-2 bg-gray-400" wire:model="form.secondCurrency" name="secondCurrency"
                                id="secondCurrency">
                            @foreach($currencies as $currency)
                                <option value="{{$currency->code}}">{{$currency->code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-red-700">
                        @error('form.secondAmount') {{ $message }} @enderror
                        @error('form.secondCurrency') {{ $message }} @enderror
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <label for="resultCurrency">Devise du résultat</label>
                <select class="p-2 bg-gray-400" wire:model="form.resultCurrency" name="resultCurrency"
                        id="resultCurrency">
                    @foreach($currencies as $currency)
                        <option value="{{$currency->code}}">{{$currency->code}}</option>
                    @endforeach
                </select>
                <div class="text-red-700">
                    @error('form.resultCurrency') {{ $message }} @enderror
                </div>
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white text-2xl font-bold py-3 px-5 rounded" type="submit">
                Calculer
            </button>
        </form>

        <div class="mt-14 text-3xl">
            @if($result)
                Le résultat est {{ $result }}
            @endif
        </div>
    </div>
</div>
