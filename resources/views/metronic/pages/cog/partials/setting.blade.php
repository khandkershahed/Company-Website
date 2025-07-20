<div class="row g-2 rounded-3">
    <div class="mt-0 col-lg-3">
        <select class="bg-white form-select form-select-sm" id="country_select" name="country" data-allow-clear="true"
            data-control="select2" data-placeholder="Select Country" style="font-size: 12px" onchange="countryFunction()">
            <option></option>
            @if (!empty(optional($quotation)->country))
                @foreach ($countries as $country)
                    <option value="{{ $country->country_code }}" @selected(optional($quotation)->country == $country->country_code)>
                        {{ $country->country_name }}</option>
                @endforeach
            @else
                @foreach ($countries as $country)
                    <option value="{{ $country->country_code }}" @selected(optional($rfq)->country == $country->country_name)>
                        {{ $country->country_name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="mt-0 col-lg-3">
        <select class="bg-white form-select form-select-sm" data-control="select2" data-placeholder="Select Region"
            name="region" data-allow-clear="true" onchange="regionFunction()">
            <option></option>
            <option value="bangladesh" @selected(optional($quotation)->region == 'bangladesh')>Bangladesh</option>
            <option value="singapore" @selected(optional($quotation)->region == 'singapore')>Singapore</option>
            <option value="middle_east" @selected(optional($quotation)->region == 'middle_east')>Middle East</option>
            <option value="portugal" @selected(optional($quotation)->region == 'portugal')>Portugal</option>

        </select>
    </div>
    <div class="mt-0 col-lg-3">
        <select class="bg-white form-select form-select-sm" data-control="select2" id="currency_select" name="currency"
            onchange="currencyFunction()" data-placeholder="Select Currency">
            <option value="taka" @selected(optional($quotation)->currency == 'taka')>Taka(Tk)</option>
            <option value="euro" @selected(optional($quotation)->currency == 'euro')>Euro(&euro;)</option>
            <option value="dollar" @selected(optional($quotation)->currency == 'dollar')>Dollar($)</option>
            <option value="pound" @selected(optional($quotation)->currency == 'pound')>Pound(&pound;)</option>
        </select>
    </div>
    <div class="mt-0 col-lg-3">
        <div>
            <input type="number" step="0.01" class="bg-white border form-control form-control-sm"
                name="currency_rate" placeholder="Currency Ratio" value="{{ optional($quotation)->currency_rate ?? 1 }}"
                style="font-size: 12px;border: 1px solid #e4e6ef !important;" />

        </div>
    </div>
</div>
