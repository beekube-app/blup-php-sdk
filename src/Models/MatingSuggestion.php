<?php
/**
 * MatingSuggestion
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
 * MatingSuggestion Class Doc Comment
 *
 * @package  Beekube\BlupSDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements ArrayAccess<string, mixed>
 */
class MatingSuggestion extends AbstractModel
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'MatingSuggestion';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var array<string, string>
      */
    protected static array $openAPITypes = [
        'blupScore' => 'float',
        'diversityScore' => 'float',
        'mateBlup' => 'float',
        'queen' => 'string',
        'queenBlup' => 'float',
        'totalScore' => 'float'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var array<string, string|null>
      */
    protected static array $openAPIFormats = [
        'blupScore' => null,
        'diversityScore' => null,
        'mateBlup' => null,
        'queen' => null,
        'queenBlup' => null,
        'totalScore' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var array<string, bool>
      */
    protected static array $openAPINullables = [
        'blupScore' => false,
        'diversityScore' => false,
        'mateBlup' => false,
        'queen' => false,
        'queenBlup' => false,
        'totalScore' => false
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
        'blupScore' => 'blup_score',
        'diversityScore' => 'diversity_score',
        'mateBlup' => 'mate_blup',
        'queen' => 'queen',
        'queenBlup' => 'queen_blup',
        'totalScore' => 'total_score'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var array<string, string>
     */
    protected static array $setters = [
        'blupScore' => 'setBlupScore',
        'diversityScore' => 'setDiversityScore',
        'mateBlup' => 'setMateBlup',
        'queen' => 'setQueen',
        'queenBlup' => 'setQueenBlup',
        'totalScore' => 'setTotalScore'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var array<string, string>
     */
    protected static array $getters = [
        'blupScore' => 'getBlupScore',
        'diversityScore' => 'getDiversityScore',
        'mateBlup' => 'getMateBlup',
        'queen' => 'getQueen',
        'queenBlup' => 'getQueenBlup',
        'totalScore' => 'getTotalScore'
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
        $this->setIfExists('blupScore', $data ?? [], null);
        $this->setIfExists('diversityScore', $data ?? [], null);
        $this->setIfExists('mateBlup', $data ?? [], null);
        $this->setIfExists('queen', $data ?? [], null);
        $this->setIfExists('queenBlup', $data ?? [], null);
        $this->setIfExists('totalScore', $data ?? [], null);
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return string[] invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        if ($this->container['blupScore'] === null) {
            $invalidProperties[] = "'blupScore' can't be null";
        }
        if ($this->container['diversityScore'] === null) {
            $invalidProperties[] = "'diversityScore' can't be null";
        }
        if ($this->container['mateBlup'] === null) {
            $invalidProperties[] = "'mateBlup' can't be null";
        }
        if ($this->container['queen'] === null) {
            $invalidProperties[] = "'queen' can't be null";
        }
        if ($this->container['queenBlup'] === null) {
            $invalidProperties[] = "'queenBlup' can't be null";
        }
        if ($this->container['totalScore'] === null) {
            $invalidProperties[] = "'totalScore' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Gets blupScore
     *
     * @return float
     */
    public function getBlupScore(): float
    {
        return $this->container['blupScore'];
    }

    /**
     * Sets blupScore
     *
     * @param float $blupScore blupScore
     *
     * @return $this
     */
    public function setBlupScore(float $blupScore): static
    {
        if (is_null($blupScore)) {
            throw new InvalidArgumentException('non-nullable blupScore cannot be null');
        }
        $this->container['blupScore'] = $blupScore;

        return $this;
    }

    /**
     * Gets diversityScore
     *
     * @return float
     */
    public function getDiversityScore(): float
    {
        return $this->container['diversityScore'];
    }

    /**
     * Sets diversityScore
     *
     * @param float $diversityScore diversityScore
     *
     * @return $this
     */
    public function setDiversityScore(float $diversityScore): static
    {
        if (is_null($diversityScore)) {
            throw new InvalidArgumentException('non-nullable diversityScore cannot be null');
        }
        $this->container['diversityScore'] = $diversityScore;

        return $this;
    }

    /**
     * Gets mateBlup
     *
     * @return float
     */
    public function getMateBlup(): float
    {
        return $this->container['mateBlup'];
    }

    /**
     * Sets mateBlup
     *
     * @param float $mateBlup mateBlup
     *
     * @return $this
     */
    public function setMateBlup(float $mateBlup): static
    {
        if (is_null($mateBlup)) {
            throw new InvalidArgumentException('non-nullable mateBlup cannot be null');
        }
        $this->container['mateBlup'] = $mateBlup;

        return $this;
    }

    /**
     * Gets queen
     *
     * @return string
     */
    public function getQueen(): string
    {
        return $this->container['queen'];
    }

    /**
     * Sets queen
     *
     * @param string $queen queen
     *
     * @return $this
     */
    public function setQueen(string $queen): static
    {
        if (is_null($queen)) {
            throw new InvalidArgumentException('non-nullable queen cannot be null');
        }
        $this->container['queen'] = $queen;

        return $this;
    }

    /**
     * Gets queenBlup
     *
     * @return float
     */
    public function getQueenBlup(): float
    {
        return $this->container['queenBlup'];
    }

    /**
     * Sets queenBlup
     *
     * @param float $queenBlup queenBlup
     *
     * @return $this
     */
    public function setQueenBlup(float $queenBlup): static
    {
        if (is_null($queenBlup)) {
            throw new InvalidArgumentException('non-nullable queenBlup cannot be null');
        }
        $this->container['queenBlup'] = $queenBlup;

        return $this;
    }

    /**
     * Gets totalScore
     *
     * @return float
     */
    public function getTotalScore(): float
    {
        return $this->container['totalScore'];
    }

    /**
     * Sets totalScore
     *
     * @param float $totalScore totalScore
     *
     * @return $this
     */
    public function setTotalScore(float $totalScore): static
    {
        if (is_null($totalScore)) {
            throw new InvalidArgumentException('non-nullable totalScore cannot be null');
        }
        $this->container['totalScore'] = $totalScore;

        return $this;
    }
}


