<?php

/**
 * GeneratedArticleApi
 * PHP version 8.1.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */

/**
 * content-api.
 *
 * # Introduction and Process Overview  This API offers easy-to-use endpoints for managing articles on content sites using the Sedo Traffic Monetization Platform.  # Authentication The API uses a modern OAuth authentication process to ensure security without sacrificing simplicity. To access the API, you need an access token. For more details on authentication, please refer to the [Introduction](/cms/docs-api/introduction) section.  <!-- ReDoc-Inject: <security-definitions> -->
 *
 * The version of the OpenAPI document: 1.2.0
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.13.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Sedo\SedoTMP\Content\API;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Sedo\ApiException;
use Sedo\Configuration;
use Sedo\HeaderSelector;
use Sedo\ObjectSerializer;

/**
 * GeneratedArticleApi Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */
class GeneratedArticleApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] * */
    public const contentTypes = [
        'generatedArticlesPost' => [
            'application/json',
        ],
    ];

    /**
     * @param int $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ?ClientInterface $client = null,
        ?Configuration $config = null,
        ?HeaderSelector $selector = null,
        int $hostIndex = 0,
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index.
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index.
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation generatedArticlesPost.
     *
     * Generate a new article for a specified topic
     *
     * @param \Sedo\SedoTMP\Content\Model\GenerateArticle        $generateArticle  generateArticle (required)
     * @param \Sedo\SedoTMP\Content\Model\RequestFlowHeader|null $xSedoRequestFlow xSedoRequestFlow (optional)
     * @param string|null                                        $xSedoReferenceId xSedoReferenceId (optional)
     * @param string                                             $contentType      The value for the Content-Type header. Check self::contentTypes['generatedArticlesPost'] to see the possible values for this operation
     *
     * @return |\Sedo\SedoTMP\Content\Model\ArticleResponse|\Sedo\SedoTMP\Content\Model\Problem|\Sedo\SedoTMP\Content\Model\Problem|\Sedo\SedoTMP\Content\Model\Problem
     *
     * @throws ApiException              on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     */
    public function generatedArticlesPost($generateArticle, $xSedoRequestFlow = null, $xSedoReferenceId = null, string $contentType = self::contentTypes['generatedArticlesPost'][0])
    {
        list($response) = $this->generatedArticlesPostWithHttpInfo($generateArticle, $xSedoRequestFlow, $xSedoReferenceId, $contentType);

        return $response;
    }

    /**
     * Operation generatedArticlesPostWithHttpInfo.
     *
     * Generate a new article for a specified topic
     *
     * @param \Sedo\SedoTMP\Content\Model\GenerateArticle        $generateArticle  (required)
     * @param \Sedo\SedoTMP\Content\Model\RequestFlowHeader|null $xSedoRequestFlow (optional)
     * @param string|null                                        $xSedoReferenceId (optional)
     * @param string                                             $contentType      The value for the Content-Type header. Check self::contentTypes['generatedArticlesPost'] to see the possible values for this operation
     *
     * @return array of |\Sedo\SedoTMP\Content\Model\ArticleResponse|\Sedo\SedoTMP\Content\Model\Problem|\Sedo\SedoTMP\Content\Model\Problem|\Sedo\SedoTMP\Content\Model\Problem, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException              on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     */
    public function generatedArticlesPostWithHttpInfo($generateArticle, $xSedoRequestFlow = null, $xSedoReferenceId = null, string $contentType = self::contentTypes['generatedArticlesPost'][0])
    {
        $request = $this->generatedArticlesPostRequest($generateArticle, $xSedoRequestFlow, $xSedoReferenceId, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            switch ($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\Sedo\SedoTMP\Content\Model\ArticleResponse',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\Sedo\SedoTMP\Content\Model\Problem',
                        $request,
                        $response,
                    );
                case 429:
                    return $this->handleResponseWithDataType(
                        '\Sedo\SedoTMP\Content\Model\Problem',
                        $request,
                        $response,
                    );
                case 500:
                    return $this->handleResponseWithDataType(
                        '\Sedo\SedoTMP\Content\Model\Problem',
                        $request,
                        $response,
                    );
            }

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            return $this->handleResponseWithDataType(
                '\Sedo\SedoTMP\Content\Model\ArticleResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Sedo\SedoTMP\Content\Model\ArticleResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Sedo\SedoTMP\Content\Model\Problem',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Sedo\SedoTMP\Content\Model\Problem',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Sedo\SedoTMP\Content\Model\Problem',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }

            throw $e;
        }
    }

    /**
     * Operation generatedArticlesPostAsync.
     *
     * Generate a new article for a specified topic
     *
     * @param \Sedo\SedoTMP\Content\Model\GenerateArticle        $generateArticle  (required)
     * @param \Sedo\SedoTMP\Content\Model\RequestFlowHeader|null $xSedoRequestFlow (optional)
     * @param string|null                                        $xSedoReferenceId (optional)
     * @param string                                             $contentType      The value for the Content-Type header. Check self::contentTypes['generatedArticlesPost'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function generatedArticlesPostAsync($generateArticle, $xSedoRequestFlow = null, $xSedoReferenceId = null, string $contentType = self::contentTypes['generatedArticlesPost'][0])
    {
        return $this->generatedArticlesPostAsyncWithHttpInfo($generateArticle, $xSedoRequestFlow, $xSedoReferenceId, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation generatedArticlesPostAsyncWithHttpInfo.
     *
     * Generate a new article for a specified topic
     *
     * @param \Sedo\SedoTMP\Content\Model\GenerateArticle        $generateArticle  (required)
     * @param \Sedo\SedoTMP\Content\Model\RequestFlowHeader|null $xSedoRequestFlow (optional)
     * @param string|null                                        $xSedoReferenceId (optional)
     * @param string                                             $contentType      The value for the Content-Type header. Check self::contentTypes['generatedArticlesPost'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function generatedArticlesPostAsyncWithHttpInfo($generateArticle, $xSedoRequestFlow = null, $xSedoReferenceId = null, string $contentType = self::contentTypes['generatedArticlesPost'][0])
    {
        $returnType = '\Sedo\SedoTMP\Content\Model\ArticleResponse';
        $request = $this->generatedArticlesPostRequest($generateArticle, $xSedoRequestFlow, $xSedoReferenceId, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ('\SplFileObject' === $returnType) {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== $returnType) {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'generatedArticlesPost'.
     *
     * @param \Sedo\SedoTMP\Content\Model\GenerateArticle        $generateArticle  (required)
     * @param \Sedo\SedoTMP\Content\Model\RequestFlowHeader|null $xSedoRequestFlow (optional)
     * @param string|null                                        $xSedoReferenceId (optional)
     * @param string                                             $contentType      The value for the Content-Type header. Check self::contentTypes['generatedArticlesPost'] to see the possible values for this operation
     *
     * @return Request
     *
     * @throws \InvalidArgumentException
     */
    public function generatedArticlesPostRequest($generateArticle, $xSedoRequestFlow = null, $xSedoReferenceId = null, string $contentType = self::contentTypes['generatedArticlesPost'][0])
    {
        // verify the required parameter 'generateArticle' is set
        if (null === $generateArticle || (is_array($generateArticle) && 0 === count($generateArticle))) {
            throw new \InvalidArgumentException('Missing the required parameter $generateArticle when calling generatedArticlesPost');
        }

        $resourcePath = '/generated-articles';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if (null !== $xSedoRequestFlow) {
            $headerParams['X-Sedo-Request-Flow'] = ObjectSerializer::toHeaderValue($xSedoRequestFlow);
        }
        // header params
        if (null !== $xSedoReferenceId) {
            $headerParams['X-Sedo-Reference-Id'] = ObjectSerializer::toHeaderValue($xSedoReferenceId);
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($generateArticle)) {
            if (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($generateArticle));
            } else {
                $httpBody = $generateArticle;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer '.$this->config->getAccessToken();
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
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option.
     *
     * @return array of http client options
     *
     * @throws \RuntimeException on file opening failure
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: '.$this->config->getDebugFile());
            }
        }

        return $options;
    }

    private function handleResponseWithDataType(
        string $dataType,
        RequestInterface $request,
        ResponseInterface $response,
    ): array {
        if ('\SplFileObject' === $dataType) {
            $content = $response->getBody(); // stream goes to serializer
        } else {
            $content = (string) $response->getBody();
            if ('string' !== $dataType) {
                try {
                    $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                } catch (\JsonException $exception) {
                    throw new ApiException(sprintf('Error JSON decoding server response (%s)', $request->getUri()), $response->getStatusCode(), $response->getHeaders(), $content);
                }
            }
        }

        return [
            ObjectSerializer::deserialize($content, $dataType, []),
            $response->getStatusCode(),
            $response->getHeaders(),
        ];
    }

    private function responseWithinRangeCode(
        string $rangeCode,
        int $statusCode,
    ): bool {
        $left = (int) ($rangeCode[0].'00');
        $right = (int) ($rangeCode[0].'99');

        return $statusCode >= $left && $statusCode <= $right;
    }
}
