<?php

namespace OpenClassrooms\FrontDesk\Client;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface ReportingApiClient
{
    /**
     * @param string $resourceName
     * @param mixed  $resourceData
     *
     * @return string
     */
    public function post($resourceName, $resourceData);
}
