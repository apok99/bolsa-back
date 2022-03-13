<?php

declare(strict_types=1);

namespace App\MarketApi\Infrastructure\Service;

use App\Company\Domain\Model\Company;
use App\MarketApi\Domain\Service\MarketApi;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FMPMarketApi implements MarketApi
{
    private HttpClientInterface $httpClient;

    public function __construct(string $key, string $baseUrl, HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient->withOptions([
            'base_uri' => $baseUrl,
            'query' => [
                'apikey' => $key
            ]
        ]);
    }

    public function getCompanies(array $companies): array
    {
        $companySymbols = array_map(static function(Company $company) {
            return $company->symbol();
        }, $companies);

        $companiesString = implode(',', $companySymbols);

        $url = FMPMarketApiUrls::GET_COMPANIES_URL . $companiesString;

        return $this->makeRequest($url);
    }

    public function getCompanyPrice(Company $company): float
    {
        $response = $this->getCompany($company);

        return $response[0]['price'];
    }

    public function getCompany(Company $company): array
    {
        return $this->makeRequest(
            FMPMarketApiUrls::GET_COMPANIES_URL . $company->symbol()
        );
    }


    public function getCryptoPrice(string $identifier): float
    {
        // TODO: Implement getCryptoPrice() method.
        return 0.0;
    }

    public function getCryptos(array $cryptos): array
    {
        // TODO: Implement getCryptos() method.
        return [];
    }

    private function makeRequest($url): array
    {
        $response = $this->httpClient->request(
            'GET',
            $url
        );

        // TODO: Throw a custom exception and catch it in a KernelException subscriber
        //  This error could mean the API is down
        if ($response->getStatusCode() !== Response::HTTP_OK)
        {
            throw new Exception();
        }

        $decodedResponse = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);

        // TODO: Throw a custom exception and catch it in a KernelException subscriber
        //  This error probably means the API key is invalid
        if (isset($decodedResponse['Error Message']))
        {
            throw new Exception();
        }

        return $decodedResponse;
    }
}
