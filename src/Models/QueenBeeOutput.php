<?php
/**
 * QueenBeeOutput
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
 * Generator version: 7.10.0
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
 * QueenBeeOutput Class Doc Comment
 *
 * @package  Beekube\BlupSDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements ArrayAccess<string, mixed>
 */
class QueenBeeOutput extends AbstractModel
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'QueenBeeOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var array<string, string>
      */
    protected static array $openAPITypes = [
        'apiaryDefault' => 'int',
        'blups' => 'array<string,mixed>',
        'born' => 'string',
        'droneParent' => 'string',
        'methods' => 'array<string,\Beekube\BlupSDK\Models\MethodsValue>',
        'queenbee' => 'string',
        'queenbeeParent' => 'string',
        'variety' => 'string',
        'died' => 'bool',
        'matingSuggestions' => '\Beekube\BlupSDK\Models\MatingSuggestion[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var array<string, string|null>
      */
    protected static array $openAPIFormats = [
        'apiaryDefault' => null,
        'blups' => null,
        'born' => null,
        'droneParent' => null,
        'methods' => null,
        'queenbee' => null,
        'queenbeeParent' => null,
        'variety' => null,
        'died' => null,
        'matingSuggestions' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var array<string, bool>
      */
    protected static array $openAPINullables = [
        'apiaryDefault' => true,
        'blups' => false,
        'born' => false,
        'droneParent' => false,
        'methods' => false,
        'queenbee' => false,
        'queenbeeParent' => false,
        'variety' => false,
        'died' => false,
        'matingSuggestions' => true
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var array<string, bool>
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var array<string, string>
     */
    protected static array $attributeMap = [
        'apiaryDefault' => 'apiary_default',
        'blups' => 'blups',
        'born' => 'born',
        'droneParent' => 'drone_parent',
        'methods' => 'methods',
        'queenbee' => 'queenbee',
        'queenbeeParent' => 'queenbee_parent',
        'variety' => 'variety',
        'died' => 'died',
        'matingSuggestions' => 'mating_suggestions'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var array<string, string>
     */
    protected static array $setters = [
        'apiaryDefault' => 'setApiaryDefault',
        'blups' => 'setBlups',
        'born' => 'setBorn',
        'droneParent' => 'setDroneParent',
        'methods' => 'setMethods',
        'queenbee' => 'setQueenbee',
        'queenbeeParent' => 'setQueenbeeParent',
        'variety' => 'setVariety',
        'died' => 'setDied',
        'matingSuggestions' => 'setMatingSuggestions'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var array<string, string>
     */
    protected static array $getters = [
        'apiaryDefault' => 'getApiaryDefault',
        'blups' => 'getBlups',
        'born' => 'getBorn',
        'droneParent' => 'getDroneParent',
        'methods' => 'getMethods',
        'queenbee' => 'getQueenbee',
        'queenbeeParent' => 'getQueenbeeParent',
        'variety' => 'getVariety',
        'died' => 'getDied',
        'matingSuggestions' => 'getMatingSuggestions'
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
        $this->setIfExists('apiaryDefault', $data ?? [], null);
        $this->setIfExists('blups', $data ?? [], null);
        $this->setIfExists('born', $data ?? [], null);
        $this->setIfExists('droneParent', $data ?? [], null);
        $this->setIfExists('methods', $data ?? [], null);
        $this->setIfExists('queenbee', $data ?? [], null);
        $this->setIfExists('queenbeeParent', $data ?? [], null);
        $this->setIfExists('variety', $data ?? [], null);
        $this->setIfExists('died', $data ?? [], false);
        $this->setIfExists('matingSuggestions', $data ?? [], null);
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return string[] invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        if ($this->container['apiaryDefault'] === null) {
            $invalidProperties[] = "'apiaryDefault' can't be null";
        }
        if ($this->container['blups'] === null) {
            $invalidProperties[] = "'blups' can't be null";
        }
        if ($this->container['born'] === null) {
            $invalidProperties[] = "'born' can't be null";
        }
        if ($this->container['droneParent'] === null) {
            $invalidProperties[] = "'droneParent' can't be null";
        }
        if ($this->container['methods'] === null) {
            $invalidProperties[] = "'methods' can't be null";
        }
        if ($this->container['queenbee'] === null) {
            $invalidProperties[] = "'queenbee' can't be null";
        }
        if ($this->container['queenbeeParent'] === null) {
            $invalidProperties[] = "'queenbeeParent' can't be null";
        }
        if ($this->container['variety'] === null) {
            $invalidProperties[] = "'variety' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Gets apiaryDefault
     *
     * @return int
     */
    public function getApiaryDefault(): ?int
    {
        return $this->container['apiaryDefault'];
    }

    /**
     * Sets apiaryDefault
     *
     * @param int $apiaryDefault apiaryDefault
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
     * Gets blups
     *
     * @return array<string,mixed>
     */
    public function getBlups(): array
    {
        return $this->container['blups'];
    }

    /**
     * Sets blups
     *
     * @param array<string,mixed> $blups BLUP values for different criteria
     *
     * @return $this
     */
    public function setBlups(array $blups): static
    {
        if (is_null($blups)) {
            throw new InvalidArgumentException('non-nullable blups cannot be null');
        }
        $this->container['blups'] = $blups;

        return $this;
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
     * Gets droneParent
     *
     * @return string
     */
    public function getDroneParent(): string
    {
        return $this->container['droneParent'];
    }

    /**
     * Sets droneParent
     *
     * @param string $droneParent droneParent
     *
     * @return $this
     */
    public function setDroneParent(string $droneParent): static
    {
        if (is_null($droneParent)) {
            throw new InvalidArgumentException('non-nullable droneParent cannot be null');
        }
        $this->container['droneParent'] = $droneParent;

        return $this;
    }

    /**
     * Gets methods
     *
     * @return array<string,\Beekube\BlupSDK\Models\MethodsValue>
     */
    public function getMethods(): array
    {
        return $this->container['methods'];
    }

    /**
     * Sets methods
     *
     * @param array<string,\Beekube\BlupSDK\Models\MethodsValue> $methods Methods used for calculations
     *
     * @return $this
     */
    public function setMethods(array $methods): static
    {
        if (is_null($methods)) {
            throw new InvalidArgumentException('non-nullable methods cannot be null');
        }
        $this->container['methods'] = $methods;

        return $this;
    }

    /**
     * Gets queenbee
     *
     * @return string
     */
    public function getQueenbee(): string
    {
        return $this->container['queenbee'];
    }

    /**
     * Sets queenbee
     *
     * @param string $queenbee queenbee
     *
     * @return $this
     */
    public function setQueenbee(string $queenbee): static
    {
        if (is_null($queenbee)) {
            throw new InvalidArgumentException('non-nullable queenbee cannot be null');
        }
        $this->container['queenbee'] = $queenbee;

        return $this;
    }

    /**
     * Gets queenbeeParent
     *
     * @return string
     */
    public function getQueenbeeParent(): string
    {
        return $this->container['queenbeeParent'];
    }

    /**
     * Sets queenbeeParent
     *
     * @param string $queenbeeParent queenbeeParent
     *
     * @return $this
     */
    public function setQueenbeeParent(string $queenbeeParent): static
    {
        if (is_null($queenbeeParent)) {
            throw new InvalidArgumentException('non-nullable queenbeeParent cannot be null');
        }
        $this->container['queenbeeParent'] = $queenbeeParent;

        return $this;
    }

    /**
     * Gets variety
     *
     * @return string
     */
    public function getVariety(): string
    {
        return $this->container['variety'];
    }

    /**
     * Sets variety
     *
     * @param string $variety variety
     *
     * @return $this
     */
    public function setVariety(string $variety): static
    {
        if (is_null($variety)) {
            throw new InvalidArgumentException('non-nullable variety cannot be null');
        }
        $this->container['variety'] = $variety;

        return $this;
    }

    /**
     * Gets died
     *
     * @return bool|null
     */
    public function getDied(): ?bool
    {
        return $this->container['died'];
    }

    /**
     * Sets died
     *
     * @param bool|null $died died
     *
     * @return $this
     */
    public function setDied(?bool $died): static
    {
        if (is_null($died)) {
            throw new InvalidArgumentException('non-nullable died cannot be null');
        }
        $this->container['died'] = $died;

        return $this;
    }

    /**
     * Gets matingSuggestions
     *
     * @return \Beekube\BlupSDK\Models\MatingSuggestion[]|null
     */
    public function getMatingSuggestions(): ?array
    {
        return $this->container['matingSuggestions'];
    }

    /**
     * Sets matingSuggestions
     *
     * @param \Beekube\BlupSDK\Models\MatingSuggestion[]|null $matingSuggestions matingSuggestions
     *
     * @return $this
     */
    public function setMatingSuggestions(?array $matingSuggestions): static
    {
        if (is_null($matingSuggestions)) {
            array_push($this->openAPINullablesSetToNull, 'matingSuggestions');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('matingSuggestions', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['matingSuggestions'] = $matingSuggestions;

        return $this;
    }
}


