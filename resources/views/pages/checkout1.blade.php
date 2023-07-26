@extends('../Layout.Layout')

@section("content")

<!--------------- Chekcout Page HTML Start ------------------------->

<div class="container mt-4">
    <form class="row g-3" method="post" action="" >
        <div class="col-xl-7 col-lg-7 col-md-12 col-12">
            @csrf
            <div class="bg-white shadow rounded">
                <h4 class="text-center p-4">RECHNUNGSDETAILS</h4>
                <div class="row p-3">
                    <div class="col-md-6 mb-3">
                        <label for="firstname" class="form-label">Vorname<span class="text-danger">*</span></label>
                        <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control input" />
                        @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastname" class="form-label">Nachname<span class="text-danger">*</span></label>
                        <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control input" />
                        @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!-- <div class="col-12 mb-3">
                        <label for="company_name" class="form-label">Firmenname (optional)</label>
                        <input type="text" name="company_name" class="form-control" id="company_name">
                    </div> -->
                    <div class="col-12 mb-3">
                        <label for="country" class="form-label">Land / Region <span class="text-danger">*</span></label>
                        <select id="country" name="country" class="form-select input">
                            <option selected value="Deutschland">Deutschland</option>
                            <option value="Österreich">Österreich</option>
                        </select>
                        @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label for="inputAddress1" class="form-label">Straße<span class="text-danger">*</span></label>
                        <input type="text" name="inputAddress1" value="{{ old('inputAddress1') }}" class="form-control input" id="inputAddress1" placeholder="Straßenname und Hausnummer" />
                        @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                        <input type="text" name="inputAddress2" class="form-control mt-3" id="inputAddress2" placeholder="Wohnung, Suite, Zimmer usw. (optional)" />
                    </div>
                    <div class="col-12 mb-3">
                        <label for="postal_code" class="form-label">Postleitzahl<span class="text-danger">*</span></label>
                        <input type="text" class="form-control input" value="{{ old('postal_code') }}" name="postal_code" id="postal_code" />
                        @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="state" class="form-label">Ort / Stadt<span class="text-danger">*</span></label>
                        <input type="text" class="form-control input" value="{{ old('state') }}" name="state" id="state" />
                        @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label for="exampleDataList" class="form-label">Bundesland / Landkreis (optional)</label>
                        <input class="form-control" list="countries-state" name="city" id="city" />
                        <datalist id="countries-state">
                            <option value="Baden-Württemberg"> </option>
                            <option value="Bayern"> </option>
                            <option value="Berlin"> </option>
                            <option value="Brandenburg"> </option>
                            <option value="Bremen"> </option>
                            <option value="Hamburg"> </option>
                            <option value="Hessen"> </option>
                            <option value="Mecklenburg-Vorpommern"> </option>
                            <option value="Niedersachsen"> </option>
                            <option value="Nordrhein-Westfalen"> </option>
                            <option value="Rheinland-Pfalz"> </option>
                            <option value="Saarland"> </option>
                            <option value="Sachsen"> </option>
                            <option value="Sachsen-Anhalt"> </option>
                            <option value="Schleswig-Holstein"> </option>
                            <option value="Thüringen"> </option>
                        </datalist>
                        @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="phone" class="form-label">Telefon<span class="text-danger">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control input" id="phone" />
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12 mb-5">
                        <label for="email" class="form-label">E-Mail-Adresse<span class="text-danger">*</span></label>
                        <input type="email" class="form-control input" name="email" value="{{ old('email') }}" id="email" />
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <hr />

                    <div class="col-12 mt-3 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" data-bs-toggle="collapse" href="#optional-form" role="checkbox" aria-expanded="false" aria-controls="collapseDetails">
                            <label class="form-check-label fw-bold " for="gridCheck"></label>
                            <span>LIEFERUNG AN EINE ANDERE ADRESSE SENDEN?</span>
                        </div>
                    </div>
                    <div class="collapse row" id="optional-form">
                        <input type="text" id="optinal_form_check" hidden name="optional_form">
                        <div class="col-md-6 mb-3">
                            <label for="firstname" class="form-label">Vorname</label>
                            <input type="text" class="form-control" value="{{ old('delivery_firstname') }}" name="delivery_firstname">
                            @error('delivery_firstname') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastname" class="form-label">Nachname</label>
                            <input type="text" class="form-control" value="{{ old('delivery_lastname') }}" name="delivery_lastname">
                            @error('delivery_lastname') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!-- <div class="col-12 mb-3">
                            <label for="inputAddress" class="form-label">Firmenname (optional)</label>
                            <input type="text" class="form-control" id="inputAddress">
                        </div> -->
                        <div class="col-12 mb-3">
                            <label for="inputState" class="form-label">Land / Region </label>
                            <select id="inputState" class="form-select" value="{{ old('delivery_country') }}" name="delivery_country">
                                <option selected>Deutschland</option>
                                <option>Österreich</option>
                            </select>
                            @error('delivery_country') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="inputAddress2" class="form-label">Straße</label>
                            <input type="text" name="deliveryAddress1" value="{{ old('deliveryAddress1') }}" class="form-control" id="deliveryAddress1" placeholder="Straßenname und Hausnummer">
                            @error('deliveryAddress1') <span class="text-danger">{{ $message }}</span> @enderror
                            <input type="text" name="deliveryAddress2" value="{{ old('deliveryAddress2') }}" class="form-control mt-3" id="deliveryAddress2" placeholder="Wohnung, Suite, Zimmer usw. (optional)">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="inputCity" class="form-label">Postleitzahl</label>
                            <input type="text" class="form-control" value="{{ old('inputCity') }}" id="inputCity" name="inputCity">
                            @error('inputCity') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="inputCity" class="form-label">Ort / Stadt</label>
                            <input type="text" class="form-control" value="{{ old('inputCity') }}" id="inputCity" name="delivery_city">
                            @error('inputCity') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- <div class="col-12 mb-3">
                            <label for="exampleDataList" class="form-label">Bundesland / Landkreis
                                (optional)</label>
                            <input class="form-control" list="countries-state" id="exampleDataList">
                            <datalist id="countries-state">
                                <option value="Baden-Württemberg">
                                <option value="Bayern">
                                <option value="Berlin">
                                <option value="Brandenburg">
                                <option value="Bremen">
                                <option value="Hamburg">
                                <option value="Hessen">
                                <option value="Mecklenburg-Vorpommern">
                                <option value="Niedersachsen">
                                <option value="Nordrhein-Westfalen">
                                <option value="Rheinland-Pfalz">
                                <option value="Saarland">
                                <option value="Sachsen">
                                <option value="Sachsen-Anhalt">
                                <option value="Schleswig-Holstein">
                                <option value="Thüringen">
                            </datalist>
                        </div> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" >Anmerkungen zur
                            Bestellung (optional)</label>
                        <textarea name="delivery_note" class="form-control" id="exampleFormControlTextarea1" rows="7" placeholder="Anmerkungen zu deiner Bestellung, z.B. besondere Hinweise für die Lieferung."></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-12 col-12">
            <div class="shadow rounded bg-white">
                <h4 class="text-center p-4">DEINE BESTELLUNG</h4>
                <div class="p-3">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">PRODUKT</th>
                                <th scope="col">ZWISCHENSUMME</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                           
                            <tr>
                                <td class="d-flex align-items-center">
                                    <div class="product_title_checkout p pe-3">
                                       <span>{{ @$details['name'] }}</span><br>
                                                @if (!empty(@$details['details']))
                                                    @foreach (@$details['details'] as $val)
                                                        <span>{{ $val }}</span><br>
                                                    @endforeach
                                                @endif
                                        <span class="text-muted p mt-2 d-block">Voraussichtliches Versanddatum Mai
                                            26, 2023</span>
                                    </div>
                                    <div class="product_checkout_qty d-flex">
                                        <p class="text-nowrap">{{ $details['quantity'] }} X</p>
                                    </div>
                                </td>
                                @php $total += $details['price'] *$details['quantity']  @endphp
                                <td class="text-end ci_green">€ {{ $details['price'] *$details['quantity']  }}</td>
                            </tr>
                            @endforeach @endif
                            <tr>
                                <td class="fw-bold">Zwischensumme</td>
                                <td class="text-end ci_green">€ {{ $total }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Versand</td>
                                <td class="text-end text-nowrap">Versandkosten: <span class="ci_green">€ 00,00 </span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Rabatt</td>
                                <td class="text-end ci_green">-€ 00,00</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="fw-bold">
                                <td class="fs-5">Gesamtsumme</td>
                                <td class="text-end fs-4 ci_green">€ {{ $total }}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="mt-3 payment-gateways">
                        <div class="accordion accordion-flush" id="bank_transfer_btn">
                            <div class="accordion-item border-0">
                                <div>
                                    <div type="button" data-bs-toggle="collapse" data-bs-target="#bank_transfer_collapse" aria-expanded="false" aria-controls="bank_transfer_collapse">
                                        <div class="form-ckeck p-3">
                                            <input class="form-check-input payment_method" type="radio" name="payment_method" id="radionbank_transfer_btn" value="Direkte Banküberweisung" required />
                                            <label class="form-check-label ms-2" for="radionbank_transfer_btn">Direkte Banküberweisung</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="bank_transfer_collapse" class="accordion-collapse collapse" data-bs-parent="#bank_transfer_btn">
                                    <div class="accordion-body p-0 ms-auto col-11">
                                        <p class="text-danger">Sonderrabatt Aktion 3% Rabatt bei Banküberweisung (inklusive Käuferschutz)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <div>
                                    <div type="button" data-bs-toggle="collapse" data-bs-target="#radionbank_kauf_collapse" aria-expanded="false" aria-controls="radionbank_kauf_collapse">
                                        <div class="form-ckeck p-3">
                                            <input class="form-check-input payment_method" type="radio" name="payment_method" id="radionbank_kauf_btn" value="Kauf auf Rechnung" required />
                                            <label class="form-check-label ms-2" for="radionbank_kauf_btn">
                                                Kauf auf Rechnung
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div id="radionbank_kauf_collapse" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body p-0 ms-auto col-11">
                                        Bezahlen Sie bequem nach Erhalt der Lieferung auf Rechnung.
                                        <p>
                                            Bitte beachten Sie, dass bei Zahlung per ‘Kauf auf Rechnung’ eine Bonitätsprüfung durchgeführt wird und Sie sich automatisch mit dieser Zahlungsmethode einverstanden erklären.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="accordion-item border-0">
                                <div>
                                    <div type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="radionbank_paypal_collapse">
                                        <div class="form-ckeck p-3">
                                            <input class="form-check-input" name="payment_method" type="radio" id="" required />
                                            <label class="form-check-label ms-2">
                                                PayPal
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body p-0 ms-auto col-11">Mit PayPal zahlen.</div>
                                </div>
                            </div> -->
                        </div>

                        <!-- <div class="form-check py-3 ms-3 close-collapse">
                            <input class="form-check-input" type="radio" name="payment_method" id="credit_card" required />
                            <label class="form-check-label" for="credit_card">
                                Kreditkarte
                            </label>
                            <img src="https://campergold.net/wp-content/plugins/mollie-payments-for-woocommerce/public/images/creditcards.svg" class="float-end" alt="pay with cards" />
                        </div>
                        <div class="form-check py-3 ms-3 close-collapse">
                            <input class="form-check-input" type="radio" name="payment_method" id="sofort" required />
                            <label class="form-check-label" for="5">
                                SOFORT-Bezahlen
                            </label>
                            <img src="https://campergold.net/wp-content/plugins/mollie-payments-for-woocommerce//public/images/sofort.svg" class="float-end" alt="pay with cards" />
                        </div>
                        <div class="form-check py-3 ms-3 close-collapse">
                            <input class="form-check-input" type="radio" name="payment_method" id="6" required />
                            <label class="form-check-label" for="6">
                                Klarna Später bezahlen
                            </label>
                            <img src="https://campergold.net/wp-content/plugins/mollie-payments-for-woocommerce//public/images/sofort.svg" class="float-end" alt="pay with cards" />
                        </div> -->
                    </div>
                    <hr />
                    <div class="col-12 mt-3">
                        <p>
                            Ihre personenbezogenen Daten werden verwendet, um Ihre Bestellung zu bearbeiten, Ihre Erfahrung auf dieser Website zu unterstützen und für andere Zwecke, die in unserer
                            <a href="#">Datenschutzerklärung</a> beschrieben sind. .
                        </p>
                    </div>
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn_primary w-100" >Kostenpflichtig bestellen</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    const myCheckbox = document.getElementById('gridCheck');

    myCheckbox.addEventListener('change', function(event) {
        if (event.target.checked) {
            // Checkbox is checked, perform your desired actions here
            document.querySelector("#optinal_form_check").value = "required";
        } else {
            // Checkbox is unchecked, perform your desired actions here
            document.querySelector("#optinal_form_check").value = "optional";
        }
    });
</script>

@endsection