<?php
/**
 * QueenBeeInput
 *
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

namespace Beekube\BlupSDK\Models;

use ArrayAccess;
use JsonSerializable;
use InvalidArgumentException;
use ReturnTypeWillChange;
use Beekube\BlupSDK\ObjectSerializer;

/**
 * QueenBeeInput Class Doc Comment
 *
 * @package  Beekube\BlupSDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements ArrayAccess<string, mixed>
 */
class QueenBeeInput implements ModelInterface, ArrayAccess, JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'QueenBeeInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var array<string, string>
      */
    protected static array $openAPITypes = [
        'born' => 'string',
        'queenbee' => 'int',
        'apiaryDefault' => 'int',
        'droneParent' => 'int',
        'evaluate' => 'array<string,\Beekube\BlupSDK\Models\Evaluation[]>',
        'queenbeeParent' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var array<string, string|null>
      */
    protected static array $openAPIFormats = [
        'born' => null,
        'queenbee' => null,
        'apiaryDefault' => null,
        'droneParent' => null,
        'evaluate' => null,
        'queenbeeParent' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var array<string, bool>
      */
    protected static array $openAPINullables = [
        'born' => false,
        'queenbee' => false,
        'apiaryDefault' => true,
        'droneParent' => true,
        'evaluate' => false,
        'queenbeeParent' => true
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var array<string, bool>
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array<string, string>
     */
    public static function openAPITypes(): array
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array<string, string>
     */
    public static function openAPIFormats(): array
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array<string, bool>
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return array<string, bool>
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param array<string, bool> $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var array<string, string>
     */
    protected static array $attributeMap = [
        'born' => 'born',
        'queenbee' => 'queenbee',
        'apiaryDefault' => 'apiary_default',
        'droneParent' => 'drone_parent',
        'evaluate' => 'evaluate',
        'queenbeeParent' => 'queenbee_parent'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var array<string, string>
     */
    protected static array $setters = [
        'born' => 'setBorn',
        'queenbee' => 'setQueenbee',
        'apiaryDefault' => 'setApiaryDefault',
        'droneParent' => 'setDroneParent',
        'evaluate' => 'setEvaluate',
        'queenbeeParent' => 'setQueenbeeParent'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var array<string, string>
     */
    protected static array $getters = [
        'born' => 'getBorn',
        'queenbee' => 'getQueenbee',
        'apiaryDefault' => 'getApiaryDefault',
        'droneParent' => 'getDroneParent',
        'evaluate' => 'getEvaluate',
        'queenbeeParent' => 'getQueenbeeParent'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array<string, string>
     */
    public static function attributeMap(): array
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array<string, string>
     */
    public static function setters(): array
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array<string, string>
     */
    public static function getters(): array
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName(): string
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var array
     */
    protected array $container = [];

    /**
     * Constructor
     *
     * @param array $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('born', $data ?? [], null);
        $this->setIfExists('queenbee', $data ?? [], null);
        $this->setIfExists('apiaryDefault', $data ?? [], null);
        $this->setIfExists('droneParent', $data ?? [], null);
        $this->setIfExists('evaluate', $data ?? [], null);
        $this->setIfExists('queenbeeParent', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, mixed $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return string[] invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        if ($this->container['born'] === null) {
            $invalidProperties[] = "'born' can't be null";
        }
        if ($this->container['queenbee'] === null) {
            $invalidProperties[] = "'queenbee' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid(): bool
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets born
     *
     * @return string
     */
    public function getBorn(): string
    {
        return $this->container['born'];
    }

    /**
     * Sets born
     *
     * @param string $born born
     *
     * @return $this
     */
    public function setBorn(string $born): static
    {
        if (is_null($born)) {
            throw new InvalidArgumentException('non-nullable born cannot be null');
        }
        $this->container['born'] = $born;

        return $this;
    }

    /**
     * Gets queenbee
     *
     * @return int
     */
    public function getQueenbee(): int
    {
        return $this->container['queenbee'];
    }

    /**
     * Sets queenbee
     *
     * @param int $queenbee queenbee
     *
     * @return $this
     */
    public function setQueenbee(int $queenbee): static
    {
        if (is_null($queenbee)) {
            throw new InvalidArgumentException('non-nullable queenbee cannot be null');
        }
        $this->container['queenbee'] = $queenbee;

        return $this;
    }

    /**
     * Gets apiaryDefault
     *
     * @return int|null
     */
    public function getApiaryDefault(): ?int
    {
        return $this->container['apiaryDefault'];
    }

    /**
     * Sets apiaryDefault
     *
     * @param int|null $apiaryDefault apiaryDefault
     *
     * @return $this
     */
    public function setApiaryDefault(?int $apiaryDefault): static
    {
        if (is_null($apiaryDefault)) {
            array_push($this->openAPINullablesSetToNull, 'apiaryDefault');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('apiaryDefault', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['apiaryDefault'] = $apiaryDefault;

        return $this;
    }

    /**
     * Gets droneParent
     *
     * @return int|null
     */
    public function getDroneParent(): ?int
    {
        return $this->container['droneParent'];
    }

    /**
     * Sets droneParent
     *
     * @param int|null $droneParent droneParent
     *
     * @return $this
     */
    public function setDroneParent(?int $droneParent): static
    {
        if (is_null($droneParent)) {
            array_push($this->openAPINullablesSetToNull, 'droneParent');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('droneParent', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['droneParent'] = $droneParent;

        return $this;
    }

    /**
     * Gets evaluate
     *
     * @return array<string,\Beekube\BlupSDK\Models\Evaluation[]>|null
     */
    public function getEvaluate(): ?array
    {
        return $this->container['evaluate'];
    }

    /**
     * Sets evaluate
     *
     * @param array<string,\Beekube\BlupSDK\Models\Evaluation[]>|null $evaluate evaluate
     *
     * @return $this
     */
    public function setEvaluate(?array $evaluate): static
    {
        if (is_null($evaluate)) {
            throw new InvalidArgumentException('non-nullable evaluate cannot be null');
        }
        $this->container['evaluate'] = $evaluate;

        return $this;
    }

    /**
     * Gets queenbeeParent
     *
     * @return int|null
     */
    public function getQueenbeeParent(): ?int
    {
        return $this->container['queenbeeParent'];
    }

    /**
     * Sets queenbeeParent
     *
     * @param int|null $queenbeeParent queenbeeParent
     *
     * @return $this
     */
    public function setQueenbeeParent(?int $queenbeeParent): static
    {
        if (is_null($queenbeeParent)) {
            array_push($this->openAPINullablesSetToNull, 'queenbeeParent');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('queenbeeParent', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['queenbeeParent'] = $queenbeeParent;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[ReturnTypeWillChange]
    public function offsetGet(mixed $offset): mixed
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[ReturnTypeWillChange]
    public function jsonSerialize(): mixed
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString(): string
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue(): string
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


