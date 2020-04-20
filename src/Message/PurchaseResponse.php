<?php

namespace Omnipay\Tinkoff\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

class PurchaseResponse extends Response implements RedirectResponseInterface
{
    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->data['Success'] ?? false;
    }

    /**
     * Redirect is always required.
     *
     * @return bool
     */
    public function isRedirect()
    {
        return true;
    }

    /**
     * @return string|null
     */
    public function getRedirectUrl()
    {
        return $this->data["PaymentURL"];
    }

    /**
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }
}
