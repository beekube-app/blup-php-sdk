<?php
/**
 * BLUPInput
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
 * SDK PHP pour l'API BLUP de Beekube - Calcul génétique des abeilles mellifères
 *
 * The version of the OpenAPI document: 1.0.0
 * Contact: contact@beekube.com
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
 * BLUPInput Class Doc Comment
 *
 * @package  Beekube\BlupSDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements ArrayAccess<string, mixed>
 */
class BLUPInput implements ModelInterface, ArrayAccess, JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'BLUPInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var array<string, string>
      */
    protected static array $openAPITypes = [
        'data' => '\Beekube\BlupSDK\Models\QueenBeeInput[]',
        'evaluate' => 'int[]',
        'evaluateElimination' => 'int[]',
        'exploitation' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var array<string, string|null>
      */
    protected static array $openAPIFormats = [
        'data' => null,
        'evaluate' => null,
        'evaluateElimination' => null,
        'exploitation' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var array<string, bool>
      */
    protected static array $openAPINullables = [
        'data' => false,
        'evaluate' => false,
        'evaluateElimination' => false,
        'exploitation' => false
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
        'data' => 'data',
        'evaluate' => 'evaluate',
        'evaluateElimination' => 'evaluate_elimination',
        'exploitation' => 'exploitation'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var array<string, string>
     */
    protected static array $setters = [
        'data' => 'setData',
        'evaluate' => 'setEvaluate',
        'evaluateElimination' => 'setEvaluateElimination',
        'exploitation' => 'setExploitation'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var array<string, string>
     */
    protected static array $getters = [
        'data' => 'getData',
        'evaluate' => 'getEvaluate',
        'evaluateElimination' => 'getEvaluateElimination',
        'exploitation' => 'getExploitation'
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
        $this->setIfExists('data', $data ?? [], null);
        $this->setIfExists('evaluate', $data ?? [], null);
        $this->setIfExists('evaluateElimination', $data ?? [], null);
        $this->setIfExists('exploitation', $data ?? [], null);
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

        if ($this->container['data'] === null) {
            $invalidProperties[] = "'data' can't be null";
        }
        if ($this->container['evaluate'] === null) {
            $invalidProperties[] = "'evaluate' can't be null";
        }
        if ($this->container['evaluateElimination'] === null) {
            $invalidProperties[] = "'evaluateElimination' can't be null";
        }
        if ($this->container['exploitation'] === null) {
            $invalidProperties[] = "'exploitation' can't be null";
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
     * Gets data
     *
     * @return \Beekube\BlupSDK\Models\QueenBeeInput[]
     */
    public function getData(): array
    {
        return $this->container['data'];
    }

    /**
     * Sets data
     *
     * @param \Beekube\BlupSDK\Models\QueenBeeInput[] $data data
     *
     * @return $this
     */
    public function setData(array $data): static
    {
        if (is_null($data)) {
            throw new InvalidArgumentException('non-nullable data cannot be null');
        }
        $this->container['data'] = $data;

        return $this;
    }

    /**
     * Gets evaluate
     *
     * @return int[]
     */
    public function getEvaluate(): array
    {
        return $this->container['evaluate'];
    }

    /**
     * Sets evaluate
     *
     * @param int[] $evaluate evaluate
     *
     * @return $this
     */
    public function setEvaluate(array $evaluate): static
    {
        if (is_null($evaluate)) {
            throw new InvalidArgumentException('non-nullable evaluate cannot be null');
        }
        $this->container['evaluate'] = $evaluate;

        return $this;
    }

    /**
     * Gets evaluateElimination
     *
     * @return int[]
     */
    public function getEvaluateElimination(): array
    {
        return $this->container['evaluateElimination'];
    }

    /**
     * Sets evaluateElimination
     *
     * @param int[] $evaluateElimination evaluateElimination
     *
     * @return $this
     */
    public function setEvaluateElimination(array $evaluateElimination): static
    {
        if (is_null($evaluateElimination)) {
            throw new InvalidArgumentException('non-nullable evaluateElimination cannot be null');
        }
        $this->container['evaluateElimination'] = $evaluateElimination;

        return $this;
    }

    /**
     * Gets exploitation
     *
     * @return int
     */
    public function getExploitation(): int
    {
        return $this->container['exploitation'];
    }

    /**
     * Sets exploitation
     *
     * @param int $exploitation exploitation
     *
     * @return $this
     */
    public function setExploitation(int $exploitation): static
    {
        if (is_null($exploitation)) {
            throw new InvalidArgumentException('non-nullable exploitation cannot be null');
        }
        $this->container['exploitation'] = $exploitation;

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


