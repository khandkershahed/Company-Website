<div class="fade-setting show" id="setting-show">
    <div class="row align-items-center justify-content-center">
        <div class="col-lg-7 mb-2">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-primary">
                        <tbody>
                            <tr>
                                <td width="18%">
                                    <select class="form-select" id="country_select" name="country" data-allow-clear="true"
                                        data-placeholder="Select Country" onchange="countryFunction()">
                                        <option value="">Select Country</option>
                                        @if (!empty(optional($quotation)->country))
                                            @foreach ($countires as $country)
                                                <option value="{{ $country->country_code }}"
                                                    @selected(optional($quotation)->country == $country->country_code)>
                                                    {{ $country->country_name }}</option>
                                            @endforeach
                                        @else
                                            @foreach ($countires as $country)
                                                <option value="{{ $country->country_code }}"
                                                    @selected(optional($rfq_details)->country == $country->country_name)>
                                                    {{ $country->country_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td width="18%">
                                    <select class="form-select" id="region_select" name="region"
                                        data-allow-clear="true" data-placeholder="Select Region"
                                        onchange="regionFunction()">
                                        <option value="">Select Region</option>
                                        <option value="bangladesh" @selected(optional($quotation)->region == 'bangladesh')>Bangladesh</option>
                                        <option value="singapore" @selected(optional($quotation)->region == 'singapore')>Singapore</option>
                                        <option value="middle_east" @selected(optional($quotation)->region == 'middle_east')>Middle East</option>
                                        <option value="portugal" @selected(optional($quotation)->region == 'portugal')>Portugal</option>
                                    </select>
                                </td>
                                <td width="14%">
                                    <select class="form-select" id="currency_select" name="currency"
                                        onchange="currencyFunction()">
                                        <option value="">Select Currency</option>
                                        <option value="taka" @selected(optional($quotation)->currency == 'taka')>Taka(Tk)</option>
                                        <option value="euro" @selected(optional($quotation)->currency == 'euro')>Euro(&euro;)</option>
                                        <option value="dollar" @selected(optional($quotation)->currency == 'dollar')>Dollar($)</option>
                                        <option value="pound" @selected(optional($quotation)->currency == 'pound')>Pound(&pound;)</option>
                                    </select>
                                </td>
                                <td width="12%">
                                    <input type="number" step="0.01"
                                        value="{{ optional($quotation)->currency_rate ?? 1 }}"
                                        class="form-control form-control-sm form-setting border" name="currency_rate"
                                        placeholder="Cur. Rate">
                                </td>
                                {{-- <td width="9%">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" {{ optional($quotation)->individual_tax == '1' ? 'checked' : '' }} value="1" id="individual_tax" name="individual_tax">
                                        <label class="form-check-label" for="individual_tax">
                                            Tax
                                        </label>
                                    </div>
                                </td> --}}
                                <td width="12%">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            {{ optional($quotation)->vat_display == '1' ? 'checked' : '' }}
                                            value="1" id="vat_display" name="vat_display">
                                        <label class="form-check-label" for="vat_display">
                                            VAT / GST
                                        </label>
                                    </div>
                                </td>
                                <td width="16%">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            {{ optional($quotation)->special_discount_display == '1' ? 'checked' : '' }}
                                            value="1" id="special_discount_display"
                                            name="special_discount_display">
                                        <label class="form-check-label" for="special_discount_display">
                                            Special Discount
                                        </label>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            Client Type :
                                            {{ !empty($rfq_details->client_type) ? ucfirst($rfq_details->client_type) : 'Anonymous' }}
                                        </div>
                                        {{-- @dd($rfq_details->client_type) --}}
                                        @if ($rfq_details->client_type == 'anonymous')
                                            <div>
                                                <a href="javascript:void(0);" class="text-primary"
                                                    data-bs-toggle="modal" title="View & Assign Sales Manager"
                                                    data-bs-target="#create-account-{{ $rfq_details->rfq_code }}">
                                                    <i class="fa-solid fa-user-tie dash-icons me-3"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>

                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
