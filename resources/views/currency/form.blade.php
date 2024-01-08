<form
    action="{{ isset($currency) ? route('currency.update', ['currency' => $currency]) : route('currency.store') }}"
    method="POST"
    class="flex space-x-6"
>
    @csrf
    @method(isset($currency) ? 'PUT' : 'POST')

    <label for="name">Nom</label>
    <input type="text" name="name" id="name" value="{{ isset($currency) ? $currency->name : ''}}">
    <div class="text-red-700">
        @error('title') {{ $message }} @enderror
    </div>

    <label for="code">Code</label>
    <input type="text" name="code" id="code" value="{{ isset($currency) ? $currency->code : ''}}">
    <div class="text-red-700">
        @error('code') {{ $message }} @enderror
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded">
        {{ isset($currency) ? 'Editer' : 'Créer' }}
    </button>

    <a href="{{ route('currency.index') }}" class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-4 rounded">Annuler</a>
</form>
