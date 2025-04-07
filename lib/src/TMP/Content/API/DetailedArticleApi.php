<?php
/**
 * DetailedArticleApi
 * PHP version 5
 *
 * @category Class
 * @package  Sedo
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * content-api
 *
 * # Introduction and Process Overview  This API offers easy-to-use endpoints for managing articles on content sites using the Sedo Traffic Monetization Platform.  # Authentication The API uses a modern OAuth authentication process to ensure security without sacrificing simplicity. To access the API, you need an access token. For more details on authentication, please refer to the [Introduction](/cms/docs-api/introduction) section.  <!-- ReDoc-Inject: <security-definitions> -->
 *
 * OpenAPI spec version: 1.2.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.68
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Sedo\SedoTMP\Content\API;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Sedo\ApiException;
use Sedo\Configuration;
use Sedo\HeaderSelector;
use Sedo\ObjectSerializer;

/**
 * DetailedArticleApi Class Doc Comment
 *
 * @category Class
 * @package  Sedo
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DetailedArticleApi
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
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation detailedArticlesGet
     *
     * List detailed-articles, compared to article this includes additionally published-article information
     *
     * @param  \Sedo\SedoTMP\Content\Model\Pageable $page Pageable object (every key is a separate query parameter) (optional)
     * @param  string $term Search term for matching against any text field e.g. ID, title, excerpt, text.. (optional)
     *
     * @throws \Sedo\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Sedo\SedoTMP\Content\Model\DetailedArticleResponse[]
     */
    public function detailedArticlesGet($page = null, $term = null)
    {
        list($response) = $this->detailedArticlesGetWithHttpInfo($page, $term);
        return $response;
    }

    /**
     * Operation detailedArticlesGetWithHttpInfo
     *
     * List detailed-articles, compared to article this includes additionally published-article information
     *
     * @param  \Sedo\SedoTMP\Content\Model\Pageable $page Pageable object (every key is a separate query parameter) (optional)
     * @param  string $term Search term for matching against any text field e.g. ID, title, excerpt, text.. (optional)
     *
     * @throws \Sedo\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Sedo\SedoTMP\Content\Model\DetailedArticleResponse[], HTTP status code, HTTP response headers (array of strings)
     */
    public function detailedArticlesGetWithHttpInfo($page = null, $term = null)
    {
        $returnType = '\Sedo\SedoTMP\Content\Model\DetailedArticleResponse[]';
        $request = $this->detailedArticlesGetRequest($page, $term);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Sedo\SedoTMP\Content\Model\DetailedArticleResponse[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Sedo\SedoTMP\Content\Model\Problem',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Sedo\SedoTMP\Content\Model\Problem',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation detailedArticlesGetAsync
     *
     * List detailed-articles, compared to article this includes additionally published-article information
     *
     * @param  \Sedo\SedoTMP\Content\Model\Pageable $page Pageable object (every key is a separate query parameter) (optional)
     * @param  string $term Search term for matching against any text field e.g. ID, title, excerpt, text.. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function detailedArticlesGetAsync($page = null, $term = null)
    {
        return $this->detailedArticlesGetAsyncWithHttpInfo($page, $term)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation detailedArticlesGetAsyncWithHttpInfo
     *
     * List detailed-articles, compared to article this includes additionally published-article information
     *
     * @param  \Sedo\SedoTMP\Content\Model\Pageable $page Pageable object (every key is a separate query parameter) (optional)
     * @param  string $term Search term for matching against any text field e.g. ID, title, excerpt, text.. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function detailedArticlesGetAsyncWithHttpInfo($page = null, $term = null)
    {
        $returnType = '\Sedo\SedoTMP\Content\Model\DetailedArticleResponse[]';
        $request = $this->detailedArticlesGetRequest($page, $term);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'detailedArticlesGet'
     *
     * @param  \Sedo\SedoTMP\Content\Model\Pageable $page Pageable object (every key is a separate query parameter) (optional)
     * @param  string $term Search term for matching against any text field e.g. ID, title, excerpt, text.. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function detailedArticlesGetRequest($page = null, $term = null)
    {

        $resourcePath = '/detailed-articles';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, null);
        }
        // query params
        if ($term !== null) {
            $queryParams['term'] = ObjectSerializer::toQueryValue($term, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

            // // this endpoint requires Bearer token
            if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
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

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation detailedArticlesIdGet
     *
     * Retrieve an detailed-articles by its articleId, compared to article this includes additionally published-article information
     *
     * @param  \Sedo\SedoTMP\Content\Model\Id $id Resource id (required)
     *
     * @throws \Sedo\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Sedo\SedoTMP\Content\Model\DetailedArticleResponse
     */
    public function detailedArticlesIdGet($id)
    {
        list($response) = $this->detailedArticlesIdGetWithHttpInfo($id);
        return $response;
    }

    /**
     * Operation detailedArticlesIdGetWithHttpInfo
     *
     * Retrieve an detailed-articles by its articleId, compared to article this includes additionally published-article information
     *
     * @param  \Sedo\SedoTMP\Content\Model\Id $id Resource id (required)
     *
     * @throws \Sedo\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Sedo\SedoTMP\Content\Model\DetailedArticleResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function detailedArticlesIdGetWithHttpInfo($id)
    {
        $returnType = '\Sedo\SedoTMP\Content\Model\DetailedArticleResponse';
        $request = $this->detailedArticlesIdGetRequest($id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Sedo\SedoTMP\Content\Model\DetailedArticleResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Sedo\SedoTMP\Content\Model\Problem',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Sedo\SedoTMP\Content\Model\Problem',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation detailedArticlesIdGetAsync
     *
     * Retrieve an detailed-articles by its articleId, compared to article this includes additionally published-article information
     *
     * @param  \Sedo\SedoTMP\Content\Model\Id $id Resource id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function detailedArticlesIdGetAsync($id)
    {
        return $this->detailedArticlesIdGetAsyncWithHttpInfo($id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation detailedArticlesIdGetAsyncWithHttpInfo
     *
     * Retrieve an detailed-articles by its articleId, compared to article this includes additionally published-article information
     *
     * @param  \Sedo\SedoTMP\Content\Model\Id $id Resource id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function detailedArticlesIdGetAsyncWithHttpInfo($id)
    {
        $returnType = '\Sedo\SedoTMP\Content\Model\DetailedArticleResponse';
        $request = $this->detailedArticlesIdGetRequest($id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'detailedArticlesIdGet'
     *
     * @param  \Sedo\SedoTMP\Content\Model\Id $id Resource id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function detailedArticlesIdGetRequest($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling detailedArticlesIdGet'
            );
        }

        $resourcePath = '/detailed-articles/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

            // // this endpoint requires Bearer token
            if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
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

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
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
    protected function createHttpClientOption()
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
