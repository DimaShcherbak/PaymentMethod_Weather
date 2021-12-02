<?php
declare(strict_types=1);

namespace SDN\PMW\Model\Api;

use Magento\Framework\HTTP\Client\Curl;
use Psr\Log\LoggerInterface;

class Custom
{
    /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * @var Curl
     */
    protected $curl;

    /**
     * @param LoggerInterface $logger
     * @param Curl $curl
     */
    public function __construct(
        LoggerInterface $logger,
        Curl            $curl
    )
    {
        $this->logger = $logger;
        $this->curl = $curl;
    }

    /**
     * @param $city
     * @return false|string
     */
    public function getPost($city)
    {
//        $response = ['success' => false];
        $api_key = '81495dbb50ff24bb2be39de7f757f19f';
        $api_url = 'https://api.openweathermap.org/data/2.5/weather';
        try {
            $url = $api_url . '?q=' . $city . '&appid=' . $api_key;
            $this->curl->setOption(CURLOPT_TIMEOUT, 60);
            $this->curl->setOption(CURLOPT_RETURNTRANSFER, true);
            $this->curl->setOption(CURLOPT_CUSTOMREQUEST, 'GET'); //set curl header
            $this->curl->addHeader("Content-Type", "application/json");
            //get request with url
            $this->curl->get($url);
            //read response
            $response = $this->curl->getBody();
            return $response;
//            $response = ['success' => true, 'message' => $value];
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
        $returnArray = json_encode($response);
        return $returnArray;
    }
}
