<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $billing_rules = [
            'fullname' => 'required',
            'email' => 'required|email',
            'billing_address1' => 'required',
            'city' => 'required',
            'phone_number' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
            'payment_method' => 'required',
            'agree-faq' => 'required',
        ];

        $shipping_rules = [
            'shipping_fullname' => 'required',
            'shipping_country' => 'required',
            'shipping_email' => 'required',
            'shipping_billing_address1' => 'required',
            'shipping_city' => 'required',
            'shipping_postal_code' => 'required',
            'shipping_phone_number' => 'required',
        ];

        return $this->get('ship_address') ? array_merge($billing_rules, $shipping_rules) : $billing_rules;
    }

    public function messages()
    {
        return [
            'email.required' => 'Die E-Mail-Adresse ist erforderlich.',
            'email.email' => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
            'fullname.required' => 'Der vollständige Name ist erforderlich.',
            'billing_address1.required' => 'Die Rechnungsadresse ist erforderlich.',
            'city.required' => 'Die Stadt ist erforderlich.',
            'phone_number.required' => 'Die Telefonnummer ist erforderlich.',
            'country.required' => 'Das Land ist erforderlich.',
            'postal_code.required' => 'Die Postleitzahl ist erforderlich.',
            'payment_method.required' => 'Die Zahlungsmethode ist erforderlich.',
            'agree-faq.required' => 'Sie müssen den FAQs zustimmen.',
            'shipping_fullname.required' => 'Der Versandvollname ist erforderlich.',
            'shipping_country.required' => 'Das Versandland ist erforderlich.',
            'shipping_email.required' => 'Die Versand-E-Mail-Adresse ist erforderlich.',
            'shipping_billing_address1.required' => 'Die Versandrechnungsadresse ist erforderlich.',
            'shipping_city.required' => 'Die Versandstadt ist erforderlich.',
            'shipping_postal_code.required' => 'Die Versandpostleitzahl ist erforderlich.',
            'shipping_phone_number.required' => 'Die Versandtelefonnummer ist erforderlich.',
        ];
    }
}

