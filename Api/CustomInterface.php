<?php
declare(strict_types=1);

namespace SDN\PMW\Api;

interface CustomInterface
{
    /**
     * GET for Post api
     * @param string $city
     * @return string
     */
    public function getPost(string $city): string;
}
