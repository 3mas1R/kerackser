<?php

namespace Kerackser\LicenseClient;

use GuzzleHttp\Client;

class LicenseClient
{
    private $config;
    private $httpClient;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->httpClient = new Client([
            'base_uri' => $config['base_uri'],
        ]);
    }

    public function validateLicense($licenseKey)
    {
        $response = $this->httpClient->post('/api/validate-license', [
            'json' => [
                'license_key' => $licenseKey,
                'api_key' => $this->config['api_key'],
            ],
        ]);
    
        // ...
    }
    
    public function getLicenseStatus($licenseKey)
    {
        $response = $this->httpClient->post('/api/get-license-status', [
            'json' => [
                'license_key' => $licenseKey,
                'api_key' => $this->config['api_key'],
            ],
        ]);
        $data = json_decode($response->getBody(), true);

        return $data;
    }
}
