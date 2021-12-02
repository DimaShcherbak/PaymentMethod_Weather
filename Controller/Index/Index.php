<?php
declare(strict_types=1);

namespace SDN\PMW\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use SDN\PMW\Model\Api\Custom;

class Index extends Action
{
    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;
    /**
     * @var Custom
     */
    private $customWather;

    /**
     * @param Context $context
     * @param JsonFactory $resultJsonFactory
     * @param Custom $customWather
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        Custom $customWather
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->customWather = $customWather;
    }

    /**
     * View  page action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $params = $this->getRequest()->getParams();
        $city = $params['city'];
        return $result->setData($this->customWather->getPost($city));
    }
}

