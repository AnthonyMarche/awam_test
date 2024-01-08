<x-layout>
    <x-slot:title>Devise | Edition {{ $currency->name }}</x-slot:title>

    <x-slot:content>
        <h1 class="p-5">Edition de la devise : {{ $currency->name }}</h1>
        @include('currency.form')
    </x-slot:content>
</x-layout>
