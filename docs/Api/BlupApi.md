# Beekube\BlupSDK\BlupApi

All URIs are relative to https://mellifera.beekube.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**calulateBlupPost()**](BlupApi.md#calulateBlupPost) | **POST** /blup | Perform BLUP calculation |
| [**welcomeGet()**](BlupApi.md#welcomeGet) | **GET** / | Welcome endpoint |


## `calulateBlupPost()`

```php
calulateBlupPost($bLUPInput): \Beekube\BlupSDK\Models\BLUPOutput
```

Perform BLUP calculation

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Beekube\BlupSDK\Api\BlupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$bLUPInput = new \Beekube\BlupSDK\Models\BLUPInput(); // \Beekube\BlupSDK\Models\BLUPInput

try {
    $result = $apiInstance->calulateBlupPost($bLUPInput);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlupApi->calulateBlupPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bLUPInput** | [**\Beekube\BlupSDK\Models\BLUPInput**](../Model/BLUPInput.md)|  | |

### Return type

[**\Beekube\BlupSDK\Models\BLUPOutput**](../Model/BLUPOutput.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `welcomeGet()`

```php
welcomeGet(): \Beekube\BlupSDK\Models\WelcomeResponse
```

Welcome endpoint

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Beekube\BlupSDK\Api\BlupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->welcomeGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlupApi->welcomeGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Beekube\BlupSDK\Models\WelcomeResponse**](../Model/WelcomeResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
