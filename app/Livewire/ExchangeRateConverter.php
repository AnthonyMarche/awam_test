<?php

namespace App\Livewire;

use App\Models\CalculationHistory;
use App\Models\Currency;
use App\Services\ConverterService;
use Exception;
use InvalidArgumentException;
use Livewire\Component;

class ExchangeRateConverter extends Component
{
    public array $form = [
        'firstAmount' => null,
        'firstCurrency' => 'EUR',
        'operator' => '+',
        'secondAmount' => null,
        'secondCurrency' => 'EUR',
        'resultCurrency' => 'EUR',
    ];

    public $currencies;

    public function rules(): array
    {
        return [
            'form.firstAmount' => ['required', 'numeric'],
            'form.secondAmount' => ['required', 'numeric'],
            'form.firstCurrency' => ['required', 'exists:currencies,code'],
            'form.secondCurrency' => ['required', 'exists:currencies,code'],
            'form.resultCurrency' => ['required', 'exists:currencies,code']
        ];
    }

    public function messages(): array
    {
        return [
            'form.firstAmount.required' => 'Le montant est obligatoire.',
            'form.firstAmount.numeric' => 'Le montant doit être un nombre.',
            'form.secondAmount.required' => 'Le montant est obligatoire.',
            'form.secondAmount.numeric' => 'Le montant doit être un nombre.',
        ];
    }

    public $result = 0;

    public function render()
    {
        return view('livewire.exchange-rate-converter');
    }

    public function mount(): void
    {
        $this->currencies = Currency::all();
    }

    // Calculate and convert amount and add calculation in CalculationHistory
    public function calculate(ConverterService $converterService): void
    {
        $this->result = 0;
        $this->validate();

        try {
            $result = $converterService->convert($this->form);
            $this->result = $result . " " . $this->form['resultCurrency'];
            CalculationHistory::create([
                'detail' => $converterService->formatCalculationToString($this->form, $result)
            ]);
        } catch (InvalidArgumentException $e) {
            session()->flash('error', $e->getMessage());
        } catch (Exception $e) {
            session()->flash('error', "Une erreur est suvenue");
        }
    }
}
