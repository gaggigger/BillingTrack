<?php

namespace BT\Modules\Merchant\Support\Drivers;

use BT\Modules\Invoices\Models\Invoice;
use BT\Modules\Merchant\Models\MerchantPayment;
use BT\Modules\Merchant\Support\MerchantDriverPayable;
use BT\Modules\Payments\Models\Payment;

class Mollie extends MerchantDriverPayable
{
    protected $isRedirect = true;

    public function getSettings()
    {
        return ['apiKey'];
    }

    public function pay(Invoice $invoice)
    {
        $mollie = new \Mollie_API_Client;

        $mollie->setApiKey($this->getSetting('apiKey'));

        $payment = $mollie->payments->create([
            'amount'      => $invoice->amount->balance,
            'description' => trans('bt.invoice') . ' #' . $invoice->number,
            'redirectUrl' => route('clientCenter.public.invoice.show', [$invoice->url_key]),
            'webhookUrl'  => route('merchant.webhookUrl', [$this->getName(), $invoice->url_key]),
        ]);

        return $payment->links->paymentUrl;
    }

    public function verify(Invoice $invoice)
    {
        $mollie = new \Mollie_API_Client;

        $mollie->setApiKey($this->getSetting('apiKey'));

        $payment = $mollie->payments->get(request('id'));

        if ($payment->isPaid())
        {
            $fiPayment = Payment::create([
                'client_id'         => $invoice->client->id,
                'invoice_id'        => $invoice->id,
                'amount'            => $payment->amount,
                'payment_method_id' => config('bt.onlinePaymentMethod'),
            ]);

            MerchantPayment::saveByKey($this->getName(), $fiPayment->id, 'id', $payment->id);
        }
    }
}
