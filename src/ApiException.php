<?php
/**
 * ApiException
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

namespace Beekube\BlupSDK;

use Exception;
use stdClass;

/**
 * ApiException Class Doc Comment
 *
 * @package  Beekube\BlupSDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ApiException extends Exception
{
    /**
     * The HTTP body of the server response either as Json or string.
     *
     * @var stdClass|string|null
     */
    protected stdClass|string|null $responseBody;

    /**
     * The HTTP header of the server response.
     *
     * @var string[][]|null
     */
    protected ?array $responseHeaders;

    /**
     * The deserialized response object
     *
     * @var mixed
     */
    protected mixed $responseObject = null;

    /**
     * Constructor
     *
     * @param string                $message         Error message
     * @param int                   $code            HTTP status code
     * @param string[][]|null       $responseHeaders HTTP response header
     * @param stdClass|string|null  $responseBody    HTTP decoded body of the server response either as stdClass or string
     */
    public function __construct(string $message = "", int $code = 0, ?array $responseHeaders = [], stdClass|string|null $responseBody = null)
    {
        parent::__construct($message, $code);
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
    }

    /**
     * Gets the HTTP response header
     *
     * @return string[][]|null HTTP response header
     */
    public function getResponseHeaders(): ?array
    {
        return $this->responseHeaders;
    }

    /**
     * Gets the HTTP body of the server response either as Json or string
     *
     * @return stdClass|string|null HTTP body of the server response either as \stdClass or string
     */
    public function getResponseBody(): stdClass|string|null
    {
        return $this->responseBody;
    }

    /**
     * Sets the deserialized response object (during deserialization)
     *
     * @param mixed $obj Deserialized response object
     *
     * @return void
     */
    public function setResponseObject(mixed $obj): void
    {
        $this->responseObject = $obj;
    }

    /**
     * Gets the deserialized response object (during deserialization)
     *
     * @return mixed the deserialized response object
     */
    public function getResponseObject(): mixed
    {
        return $this->responseObject;
    }
}
