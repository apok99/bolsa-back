<?php

declare(strict_types=1);

namespace App\MarketApi\Infrastructure;

use App\MarketApi\Domain\MarketApi;
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

    public function getCompanies(): array
    {
        // TODO: Implement getShares() method.
        return [];
    }

    public function getCompanyPrice(string $identifier): int
    {
        // TODO: Implement getSharePrice() method.
        dd($this->makeRequest('api/v3/quote-short/' . $identifier));
        return 0;
    }

    public function getCompany(string $identifier): array
    {
        dd($this->makeRequest('api/v3/quote/' . $identifier));

        return [];
    }


    public function getCryptoPrice(string $identifier): int
    {
        // TODO: Implement getCryptoPrice() method.
        return 0;
    }

    public function getCryptos(): array
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

        return json_decode($response->getContent(), false, 512, JSON_THROW_ON_ERROR);
    }
}
