<?php

declare(strict_types=1);

namespace App\MarketApi\Infrastructure\Service;

use App\Company\Domain\Model\Company;
use App\MarketApi\Domain\Service\MarketApi;
use Doctrine\DBAL\Exception;
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

    public function getCompanyPrice(string $identifier): array
    {
        // TODO: Implement getSharePrice() method.
        dd($this->makeRequest('api/v3/quote-short/' . $identifier));
        return [];
    }

    public function getCompany(string $identifier): array
    {
        dd($this->makeRequest('api/v3/quote/' . $identifier));

        return [];
    }


    public function getCryptoPrice(string $identifier): array
    {
        // TODO: Implement getCryptoPrice() method.
        return [];
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

        if ($response->getStatusCode() !== Response::HTTP_OK)
        {
            throw new Exception();
        }

        return json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);
    }
}
