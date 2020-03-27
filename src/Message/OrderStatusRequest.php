<?php
/*
 * This file is part of the Aqua Delivery package.
 *
 * (c) Sergey Logachev <svlogachev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Omnipay\Tinkoff\Message;

use Omnipay\Common\Exception\RuntimeException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Tinkoff\Common\RequestHelpers;

final class OrderStatusRequest extends Request
{
    use RequestHelpers;

    const SIGNATURE_KEYS_TO_SKIP = [
        'DATA',
        'Receipt',
    ];

    /**
     * @inheritDoc
     */
    protected function getMethod()
    {
        return 'GetState';
    }

    /**
     * @return string
     */
    public function getPaymentId()
    {
        return $this->getParameter('paymentId');
    }

    /**
     * @param string $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setPaymentId($value)
    {
        return $this->setParameter('paymentId', $value);
    }

    /**
     * @inheritDoc
     */
    protected function getUnsignedData()
    {
        return [
            'TerminalKey' => $this->getTerminalId(),
            'IP'          => $this->httpRequest->server->get('SERVER_ADDR'),
            'PaymentId'   => $this->getPaymentId(),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getResponseClass()
    {
        return OrderStatusResponse::class;
    }
}
