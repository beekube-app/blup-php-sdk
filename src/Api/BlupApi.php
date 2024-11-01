<?php
/**
 * BlupApi
 * PHP version 8.1
 *
 * @package  Beekube\BlupSDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Beekube BLUP Mellifera API
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 1.0.0
 * Contact: tech@beekube.com
 * @generated Generated by: https://openapi-generator.tech
 * Generator version: 7.9.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Beekube\BlupSDK\Api;

use InvalidArgumentException;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Promise\PromiseInterface;
use Beekube\BlupSDK\ApiException;
use Beekube\BlupSDK\Configuration;
use Beekube\BlupSDK\HeaderSelector;
use Beekube\BlupSDK\ObjectSerializer;

/**
 * BlupApi Class Doc Comment
 *
 * @package  Beekube\BlupSDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class BlupApi
{
    /**
     * @var ClientInterface
     */
    protected ClientInterface $client;

    /**
     * @var Configuration
     */
    protected Configuration $config;

    /**
     * @var HeaderSelector
     */
    protected HeaderSelector $headerSelector;

    /**
     * @var int Host index
     */
    protected int $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'blupBlupPost' => [
            'application/json',
        ],
        'welcomeGet' => [
            'application/json',
        ],
    ];

    /**
     * @param ClientInterface|null $client
     * @param Configuration|null   $config
     * @param HeaderSelector|null  $selector
     * @param int                  $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        int $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex(int $hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex(): int
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * Operation blupBlupPost
     *
     * Perform BLUP calculation
     *
     * @param  \Beekube\BlupSDK\Models\BLUPInput $bLUPInput bLUPInput (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blupBlupPost'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return void
     */
    public function blupBlupPost(
        \Beekube\BlupSDK\Models\BLUPInput $bLUPInput,
        string $contentType = self::contentTypes['blupBlupPost'][0]
    ): void
    {
        $this->blupBlupPostWithHttpInfo($bLUPInput, $contentType);
    }

    /**
     * Operation blupBlupPostWithHttpInfo
     *
     * Perform BLUP calculation
     *
     * @param  \Beekube\BlupSDK\Models\BLUPInput $bLUPInput (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blupBlupPost'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function blupBlupPostWithHttpInfo(
        \Beekube\BlupSDK\Models\BLUPInput $bLUPInput,
        string $contentType = self::contentTypes['blupBlupPost'][0]
    ): array
    {
        $request = $this->blupBlupPostRequest($bLUPInput, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Beekube\BlupSDK\Models\ValidationErrorModel[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation blupBlupPostAsync
     *
     * Perform BLUP calculation
     *
     * @param  \Beekube\BlupSDK\Models\BLUPInput $bLUPInput (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blupBlupPost'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function blupBlupPostAsync(
        \Beekube\BlupSDK\Models\BLUPInput $bLUPInput,
        string $contentType = self::contentTypes['blupBlupPost'][0]
    ): PromiseInterface
    {
        return $this->blupBlupPostAsyncWithHttpInfo($bLUPInput, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation blupBlupPostAsyncWithHttpInfo
     *
     * Perform BLUP calculation
     *
     * @param  \Beekube\BlupSDK\Models\BLUPInput $bLUPInput (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blupBlupPost'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function blupBlupPostAsyncWithHttpInfo(
        $bLUPInput,
        string $contentType = self::contentTypes['blupBlupPost'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->blupBlupPostRequest($bLUPInput, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'blupBlupPost'
     *
     * @param  \Beekube\BlupSDK\Models\BLUPInput $bLUPInput (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blupBlupPost'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function blupBlupPostRequest(
        $bLUPInput,
        string $contentType = self::contentTypes['blupBlupPost'][0]
    ): Request
    {

        // verify the required parameter 'bLUPInput' is set
        if ($bLUPInput === null || (is_array($bLUPInput) && count($bLUPInput) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $bLUPInput when calling blupBlupPost'
            );
        }


        $resourcePath = '/blup';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($bLUPInput)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($bLUPInput));
            } else {
                $httpBody = $bLUPInput;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation welcomeGet
     *
     * Welcome endpoint
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['welcomeGet'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return void
     */
    public function welcomeGet(
        string $contentType = self::contentTypes['welcomeGet'][0]
    ): void
    {
        $this->welcomeGetWithHttpInfo($contentType);
    }

    /**
     * Operation welcomeGetWithHttpInfo
     *
     * Welcome endpoint
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['welcomeGet'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function welcomeGetWithHttpInfo(
        string $contentType = self::contentTypes['welcomeGet'][0]
    ): array
    {
        $request = $this->welcomeGetRequest($contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation welcomeGetAsync
     *
     * Welcome endpoint
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['welcomeGet'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function welcomeGetAsync(
        string $contentType = self::contentTypes['welcomeGet'][0]
    ): PromiseInterface
    {
        return $this->welcomeGetAsyncWithHttpInfo($contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation welcomeGetAsyncWithHttpInfo
     *
     * Welcome endpoint
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['welcomeGet'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function welcomeGetAsyncWithHttpInfo(
        string $contentType = self::contentTypes['welcomeGet'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->welcomeGetRequest($contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'welcomeGet'
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['welcomeGet'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function welcomeGetRequest(
        string $contentType = self::contentTypes['welcomeGet'][0]
    ): Request
    {


        $resourcePath = '/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption(): array
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
