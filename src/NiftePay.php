<?php

namespace niftepay\NiftePay;
use  superlogicdev\niftepay\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NiftePay extends Payment
{

    /**
     * Send Request
     * @return Response|Application|ResponseFactory
     */
    public function sendRequest(): Response|Application|ResponseFactory
    {
        $data['pp_Version'] = '1.1';
        $data['pp_TxnType'] = '';
        $data['pp_Language'] = "EN";
        $data['pp_MerchantID'] = $this->merchant_id;
        $data['pp_SubMerchantID'] = '';
        $data['pp_Password'] = $this->password;
        $data['pp_TxnRefNo'] = "TX" . date('YmdHis') . mt_rand(10, 100); // You can customize it (only Max 20 Alpha-Numeric characters)
        $data['pp_Amount'] = $this->getAmount() * 100;  //Last two digits will be considered as Decimal
        $data['pp_TxnCurrency'] = 'PKR';
        $data['pp_TxnDateTime'] = date('YmdHis');
        $data['pp_BillReference'] = $this->getBillRefernce();
        $data['pp_Description'] = trim($this->getProductDescription(),"'");
        $data['pp_IsRegisteredCustomer'] = "No";
        $data['pp_BankID'] = '';
        $data['pp_ProductID'] = '';
        $data['pp_TxnExpiryDateTime'] = date('YmdHis', strtotime('+1 Days'));
        $data['pp_ReturnURL'] = $this->return_url;
        $data['ppmpf_1'] = '';
        $data['ppmpf_2'] = '';
        $data['ppmpf_3'] = '';
        $data['ppmpf_4'] = '';
        $data['ppmpf_5'] = '';
        $data['pp_SecureHash'] = $this->HashArray($data);
        return response($this->renderPage($data));
    }
    /**
     * Generate the HTML to render in Mobile Application to send Request:
     *
     */
    public function renderPage($data): string
    {
        $niftepayForm[] = '<div id="header"><form id="jc-params" action="' . $this->apiUrl . '" method="post" id="niftepay-checkout">';

        foreach ($data as $key => $value) {
            $niftepayForm[] = '<input type="hidden" name="' . ($key) . '" id="' . ($key) . '" value="' . ($value) . '" />';
        }
        $niftepayForm[] = '<input style="display:none;" type="submit" class="button paydast-submit" name="" value="Submit" />';
        $niftepayForm[] = '<script> window.addEventListener("DOMContentLoaded", function() {    document.getElementById("np-params").submit();  });</script></form></div>';

        return implode('', $niftepayForm);
    }
}
