<x-layout>
    <x-slot:title>Devises</x-slot:title>

    <x-slot:content>
        <div class="w-screen flex justify-around p-5">
            <a href="{{route('currency.create')}}">Nouvelle devise</a>
            <a href="{{route('converter')}}">Convertisseur</a>
        </div>

        <div class="mt-16 flex justify-center items-center">
            <table class="table-fixed">
                <thead>
                <tr>
                    <th class="px-8 py-4">Nom</th>
                    <th class="px-8 py-4">Code</th>
                </tr>
                </thead>
                <tbody>
                @if (count($currencies) > 0)
                    @foreach ($currencies as $currency)
                        <tr class="text-center">
                            <td>
                                {{ $currency->name }}
                            </td>
                            <td>
                                {{ $currency->code }}
                            </td>
                            <td>
                                <a href="{{ route('currency.edit', ['currency' => $currency]) }}">
                                    <i class="fa-solid fa-pen-to-square cursor-pointer"></i>
                                </a>
                            </td>
                            <td class="px-4">
                                <form action="{{ route('currency.destroy', ['currency' => $currency]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color: #ff0000;">
                                        <i class="fa-solid fa-trash cursor-pointer"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">
                            Aucune devise
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </x-slot:content>
</x-layout>
