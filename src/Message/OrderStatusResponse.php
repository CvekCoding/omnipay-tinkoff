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

final class OrderStatusResponse extends Response
{
    public function getOrderId()
    {
        return $this->data['OrderId'];
    }

    public function isSuccess()
    {
        return $this->data['Success'] && 'CONFIRMED' === $this->data['Status'];
    }

    public function getStatus()
    {
        return $this->data['Status'];
    }

    public function getPaymentId()
    {
        return $this->data['PaymentId'];
    }

    public function getErrorCode()
    {
        return $this->data['ErrorCode'];
    }

    public function getMessage()
    {
        return array_key_exists('Message', $this->data) ? $this->data['Message'] : null;
    }

    public function getDetails()
    {
        return array_key_exists('Details', $this->data) ? $this->data['Details'] : null;
    }
}
