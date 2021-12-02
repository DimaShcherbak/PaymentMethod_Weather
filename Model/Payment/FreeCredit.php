<?php
declare(strict_types=1);

namespace SDN\PMW\Model\Payment;

use Magento\Payment\Model\Method\AbstractMethod;
use Magento\Quote\Api\Data\CartInterface;

class FreeCredit extends AbstractMethod
{

    protected $_code = "freecredit";
    protected $_isOffline = true;

    public function isAvailable(
        CartInterface $quote = null
    )
    {
        return parent::isAvailable($quote);
    }
}
