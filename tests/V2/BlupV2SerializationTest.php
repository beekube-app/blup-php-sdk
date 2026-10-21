<?php

namespace Beekube\BlupSDK\Test\V2;

use Beekube\BlupSDK\Api\BlupApi;
use Beekube\BlupSDK\Configuration;
use Beekube\BlupSDK\Models\BLUPOutput;
use Beekube\BlupSDK\Models\BlupV2Input;
use Beekube\BlupSDK\Models\BlupV2Output;
use Beekube\BlupSDK\Models\CriterionIn;
use Beekube\BlupSDK\Models\ExternalSummary;
use Beekube\BlupSDK\Models\MatingOut;
use Beekube\BlupSDK\Models\ModelInterface;
use Beekube\BlupSDK\Models\RecordIn;
use Beekube\BlupSDK\ObjectSerializer;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Contrat v2 (spec §5.1 / §5.2) : les exemples de la spec passent dans les deux sens,
 * les maps restent indexées par identifiant de critère, et le v1 est toujours là.
 */
final class BlupV2SerializationTest extends TestCase
{
    private static function input(): array
    {
        return [
            'exploitation' => 798,
            'profile' => 'standard',
            'options' => [
                'base_years' => 5, 'estimate_variances' => 'auto', 'default_n_drones' => 12,
                'inbreeding_penalty' => 100, 'max_inbreeding' => 0.0625, 'n_suggestions' => 10,
            ],
            'criteria' => [[
                'id' => 44, 'name' => 'Douceur', 'direction' => 1, 'kind' => 'note', 'weight' => 3,
                'elimination' => false, 'h2' => null, 'repeatability' => null, 'queen_ratio' => null, 'rg' => null,
            ]],
            'queens' => [[
                'id' => 4074, 'born' => 2021, 'mother' => 3257, 'mother_ref_ext' => null,
                'mating' => [
                    'type' => 'insemination', 'drone_queens' => [3301], 'drone_queens_mother' => null,
                    'n_drone_queens' => null, 'n_drones' => 8, 'external_ref' => null,
                    'station' => null, 'year' => 2021,
                ],
                'variety' => 'Buckfast', 'died' => false, 'eliminated' => false,
                'available_as_mother' => true, 'available_as_drone_source' => true,
            ]],
            'records' => [[
                'queen' => 4074, 'criterion' => 44, 'value' => 3, 'scale_min' => 1, 'scale_max' => 5,
                'date' => '2024-03-15', 'evaluator' => 848, 'apiary' => 1504,
                'hive_type' => 'dadant-10', 'hive_class' => 'hive', 'visit' => 99812,
            ]],
        ];
    }

    private static function output(): array
    {
        return [
            'status' => 'success',
            'engine_version' => '2.0.0',
            'profile' => 'standard',
            'parameters' => ['44' => [
                'source' => 'prior', 'h2' => 0.25, 'repeatability' => 0.30,
                'sigma2_a' => 0.012, 'sigma2_pe' => 0.002, 'sigma2_e' => 0.034,
                'sigma2_aq' => null, 'rg' => null, 'profile_used' => 'standard', 'known_mating_share' => null,
                'n_records' => 412, 'n_queens' => 69, 'n_contemporary_groups' => 6,
                'reliability_method' => 'exact',
            ]],
            'base' => ['birth_years' => [2020, 2021, 2022, 2023, 2024], 'n_queens' => 69],
            'queens' => [[
                'id' => 4074, 'inbreeding' => 0.0, 'inbreeding_workers' => 0.0,
                'total_index' => 104.2, 'total_reliability' => 0.41,
                'indexes' => ['44' => [
                    'status' => 'evaluated', 'ebv' => 0.031, 'index' => 106.1, 'reliability' => 0.44,
                    'index_queen' => 103.0, 'index_worker' => null,
                    'n_records' => 6, 'n_evaluators' => 1, 'n_years' => 1,
                ]],
            ]],
            'matings' => [[
                'mother' => 4074, 'drone_source' => 3301, 'expected_total_index' => 105.3,
                'expected_indexes' => ['44' => 104.9], 'expected_inbreeding' => 0.0312,
                'score' => 102.2, 'warnings' => [],
            ]],
            'trend' => ['44' => [['birth_year' => 2023, 'mean_index' => 101.2, 'n' => 47]]],
            'connectivity' => ['n_components' => 2, 'minor_share' => 0.12, 'components' => [[1504, 1505, 1565], [1212, 1213, 4948]]],
            'warnings' => [['code' => 'disconnected_groups', 'message' => '12 % des reines notées hors du groupe principal', 'criterion' => null]],
        ];
    }

    private static function toModel(array $data, string $class): mixed
    {
        return ObjectSerializer::deserialize(json_decode(json_encode($data)), $class);
    }

    public function testEntreeSerialiseeEnSnakeCase(): void
    {
        $input = self::toModel(self::input(), BlupV2Input::class);
        self::assertInstanceOf(BlupV2Input::class, $input);

        $json = json_decode(json_encode(ObjectSerializer::sanitizeForSerialization($input)), true);

        self::assertSame(798, $json['exploitation']);
        self::assertSame('standard', $json['profile']);
        self::assertEquals(0.0625, $json['options']['max_inbreeding']);
        self::assertSame('insemination', $json['queens'][0]['mating']['type']);
        self::assertSame([3301], $json['queens'][0]['mating']['drone_queens']);
        self::assertTrue($json['queens'][0]['available_as_drone_source']);
        self::assertSame('hive', $json['records'][0]['hive_class']);
        self::assertEquals(5, $json['records'][0]['scale_max']);
        self::assertSame('2024-03-15', $json['records'][0]['date']);
        self::assertSame(848, $json['records'][0]['evaluator']);
        self::assertSame(99812, $json['records'][0]['visit']);
        self::assertSame('dadant-10', $json['records'][0]['hive_type']);
    }

    public function testParametresDeCritereRenseignesSontSerialisesEnNombres(): void
    {
        $data = self::input();
        $data['criteria'][0]['h2'] = 0.25;
        $data['criteria'][0]['repeatability'] = 0.3;
        $data['criteria'][0]['queen_ratio'] = 2;
        $data['criteria'][0]['rg'] = 0.5;

        $input = self::toModel($data, BlupV2Input::class);
        $json = json_decode(json_encode(ObjectSerializer::sanitizeForSerialization($input)), true);

        self::assertIsFloat($json['criteria'][0]['h2']);
        self::assertEquals(0.25, $json['criteria'][0]['h2']);
        self::assertIsFloat($json['criteria'][0]['repeatability']);
        self::assertEquals(0.3, $json['criteria'][0]['repeatability']);
        // Le modèle porte un float (2.0) ; json_encode() l'écrit « 2 » (sans JSON_PRESERVE_ZERO_FRACTION),
        // d'où un entier après le json_decode() ci-dessus : sur le fil, c'est un nombre JSON valide.
        self::assertIsFloat($input->getCriteria()[0]->getQueenRatio());
        self::assertIsNumeric($json['criteria'][0]['queen_ratio']);
        self::assertEquals(2, $json['criteria'][0]['queen_ratio']);
        self::assertIsFloat($json['criteria'][0]['rg']);
        self::assertEquals(0.5, $json['criteria'][0]['rg']);
    }

    public function testSortieAvecMapsParCritere(): void
    {
        /** @var BlupV2Output $out */
        $out = self::toModel(self::output(), BlupV2Output::class);

        self::assertSame('2.0.0', $out->getEngineVersion());
        self::assertEquals(0.25, $out->getParameters()['44']->getH2());
        self::assertEquals(0.012, $out->getParameters()['44']->getSigma2A());
        self::assertSame(412, $out->getParameters()['44']->getNRecords());
        self::assertEquals(0.30, $out->getParameters()['44']->getRepeatability());
        self::assertNull($out->getParameters()['44']->getKnownMatingShare());

        $queen = $out->getQueens()[0];
        self::assertSame(4074, $queen->getId());
        self::assertEquals(104.2, $queen->getTotalIndex());
        self::assertSame('evaluated', $queen->getIndexes()['44']->getStatus());
        self::assertEquals(106.1, $queen->getIndexes()['44']->getIndex());
        self::assertNull($queen->getIndexes()['44']->getIndexWorker());

        self::assertEquals(104.9, $out->getMatings()[0]->getExpectedIndexes()['44']);
        self::assertIsFloat($out->getMatings()[0]->getExpectedIndexes()['44']);
        self::assertSame(2023, $out->getTrend()['44'][0]->getBirthYear());
        self::assertSame(2, $out->getConnectivity()->getNComponents());
        self::assertEquals(0.12, $out->getConnectivity()->getMinorShare());
        self::assertSame('disconnected_groups', $out->getWarnings()[0]->getCode());
    }

    public function testCodesDAvertissementEtPartDAccouplementsConnus(): void
    {
        $data = self::output();
        $data['profile'] = 'breeder';
        $data['parameters']['44']['profile_used'] = 'standard';
        $data['parameters']['44']['known_mating_share'] = 0.071;
        $data['warnings'] = array_map(
            static fn (string $code): array => ['code' => $code, 'message' => $code, 'criterion' => $code === 'self_reference_removed' ? null : 44],
            ['disconnected_groups', 'breeder_fallback', 'few_records', 'reml_not_converged', 'low_heritability', 'scale_mixed',
                'unknown_parent_added', 'self_reference_removed', 'no_variation', 'reliability_approx', 'criterion_failed']
        );

        /** @var BlupV2Output $out */
        $out = self::toModel($data, BlupV2Output::class);

        self::assertEquals(0.071, $out->getParameters()['44']->getKnownMatingShare());
        self::assertSame(
            ['disconnected_groups', 'breeder_fallback', 'few_records', 'reml_not_converged', 'low_heritability', 'scale_mixed',
                'unknown_parent_added', 'self_reference_removed', 'no_variation', 'reliability_approx', 'criterion_failed'],
            array_map(static fn ($warning): string => $warning->getCode(), $out->getWarnings())
        );
        self::assertNull($out->getWarnings()[7]->getCriterion());
        self::assertSame(44, $out->getWarnings()[8]->getCriterion());
    }

    public function testCaractereStandardEtProfondeurDuPedigreeExterneSerialises(): void
    {
        $data = self::input();
        $data['criteria'][0]['trait'] = 'gentleness';
        $data['options']['external_pedigree_depth'] = 12;

        /** @var BlupV2Input $input */
        $input = self::toModel($data, BlupV2Input::class);
        $json = json_decode(json_encode(ObjectSerializer::sanitizeForSerialization($input)), true);

        self::assertSame(CriterionIn::MODEL_TRAIT_GENTLENESS, $input->getCriteria()[0]->getTrait());
        self::assertSame('gentleness', $json['criteria'][0]['trait']);
        self::assertSame(12, $json['options']['external_pedigree_depth']);
        self::assertSame([], $input->listInvalidProperties());
    }

    public function testCaractereStandardNullableEtLimiteAuCatalogue(): void
    {
        $criterion = (new CriterionIn())->setTrait('honey_yield');
        $criterion->setTrait(null);
        self::assertNull($criterion->getTrait());
        self::assertCount(30, $criterion->getTraitAllowableValues());

        $this->expectException(\InvalidArgumentException::class);
        $criterion->setTrait('miel');
    }

    public function testCodesDAvertissementDesNotesEtDuPedigreeExternes(): void
    {
        $codes = ['external_ref_resolved', 'external_ref_unknown', 'external_pedigree_unavailable',
            'external_records_added', 'external_records_unavailable'];
        $data = self::output();
        $data['engine_version'] = '2.2.0';
        $data['warnings'] = array_map(
            static fn (string $code): array => ['code' => $code, 'message' => $code, 'criterion' => null],
            $codes
        );

        /** @var BlupV2Output $out */
        $out = self::toModel($data, BlupV2Output::class);

        self::assertSame($codes, array_map(static fn ($warning): string => $warning->getCode(), $out->getWarnings()));
        foreach ($out->getWarnings() as $warning) {
            self::assertSame([], $warning->listInvalidProperties());
        }
    }

    public function testResumeDesLigneesExternesLuAvecSesMaps(): void
    {
        $data = self::output();
        $data['engine_version'] = '2.3.0';
        $data['external'] = [
            'pedigree_used' => true, 'references_linked' => 3, 'unknown_references' => ['FR-XXX-B-0001-2020'],
            'ancestors' => 6, 'links_cut' => 0, 'ancestors_without_year' => 1, 'ancestors_capped' => false,
            'records_used' => true, 'records' => 7, 'records_by_criterion' => ['44' => 7], 'record_ancestors' => 2,
            'contemporaries' => 4, 'contemporaries_capped' => false, 'discarded' => ['no_queen' => 1, 'alone' => 1],
        ];

        /** @var BlupV2Output $out */
        $out = self::toModel($data, BlupV2Output::class);
        $external = $out->getExternal();

        self::assertInstanceOf(ExternalSummary::class, $external);
        self::assertTrue($external->getPedigreeUsed());
        self::assertSame(3, $external->getReferencesLinked());
        self::assertSame(['FR-XXX-B-0001-2020'], $external->getUnknownReferences());
        self::assertSame(['44' => 7], $external->getRecordsByCriterion());
        self::assertSame(['no_queen' => 1, 'alone' => 1], $external->getDiscarded());
        self::assertSame(4, $external->getContemporaries());
        self::assertSame([], $external->listInvalidProperties());
    }

    public function testResumeDesLigneesExternesNullOuAbsent(): void
    {
        $data = self::output();
        self::assertNull(self::toModel($data, BlupV2Output::class)->getExternal());

        $data['external'] = null;
        self::assertNull(self::toModel($data, BlupV2Output::class)->getExternal());
    }

    public function testV1ToujoursPresent(): void
    {
        self::assertTrue(method_exists(BlupApi::class, 'calulateBlupPost'));

        $v1 = ObjectSerializer::deserialize(
            json_decode('{"status":"success","results":{"blup":[{"queenbee":"1","blups":{"44":0.12},"mating_suggestions":[]}],"heritabilities":{}}}'),
            BLUPOutput::class
        );

        self::assertSame('1', $v1->getResults()->getBlup()[0]->getQueenbee());
        self::assertEquals(0.12, $v1->getResults()->getBlup()[0]->getBlups()['44']);
    }

    public function testRequeteV2VisLeCheminEtRespecteLHote(): void
    {
        $api = new BlupApi(null, (new Configuration())->setHost('http://blup.test'));
        $request = $api->blupV2PostRequest(self::toModel(self::input(), BlupV2Input::class));

        self::assertSame('POST', $request->getMethod());
        self::assertSame('http://blup.test/v2/blup', (string) $request->getUri());
        self::assertSame(798, json_decode((string) $request->getBody(), true)['exploitation']);
    }

    public function testH2NullableNeLevePasDException(): void
    {
        $criterion = new CriterionIn();
        $criterion->setH2(null);

        self::assertNull($criterion->getH2());
    }

    public function testChampsDEnregistrementNullablesAcceptentNullSansSerialiserUnObjetVide(): void
    {
        $data = self::input()['records'][0];
        self::assertSame(848, $data['evaluator']);

        // Par les mutateurs, en remplaçant des valeurs renseignées.
        /** @var RecordIn $record */
        $record = self::toModel($data, RecordIn::class);
        $record->setEvaluator(null)->setVisit(null)->setHiveType(null);

        self::assertNull($record->getEvaluator());
        self::assertNull($record->getVisit());
        self::assertNull($record->getHiveType());

        $json = json_encode(ObjectSerializer::sanitizeForSerialization($record));

        // Comportement observé : le null est conservé tel quel, jamais remplacé par « {} ».
        self::assertStringContainsString('"evaluator":null', $json);
        self::assertStringContainsString('"visit":null', $json);
        self::assertStringContainsString('"hive_type":null', $json);
        self::assertStringNotContainsString('{}', $json);

        // Par la désérialisation d'un JSON portant des null.
        $data['evaluator'] = $data['visit'] = $data['hive_type'] = null;
        /** @var RecordIn $fromJson */
        $fromJson = self::toModel($data, RecordIn::class);
        $decoded = json_decode(json_encode(ObjectSerializer::sanitizeForSerialization($fromJson)), true);

        self::assertNull($fromJson->getEvaluator());
        self::assertNull($fromJson->getVisit());
        self::assertNull($fromJson->getHiveType());
        foreach (['evaluator', 'visit', 'hive_type'] as $key) {
            self::assertArrayHasKey($key, $decoded);
            self::assertNull($decoded[$key]);
        }
    }

    public function testIndexAttendusDUnAccouplementConserventLesValeursNulles(): void
    {
        $data = self::output()['matings'][0];
        $data['expected_indexes'] = ['44' => 104.9, '45' => null, '46' => 105];

        /** @var MatingOut $mating */
        $mating = self::toModel($data, MatingOut::class);
        $indexes = $mating->getExpectedIndexes();

        self::assertCount(3, $indexes);
        self::assertArrayHasKey('45', $indexes);
        self::assertNull($indexes['45']);
        self::assertIsFloat($indexes['44']);
        self::assertEquals(104.9, $indexes['44']);
        self::assertIsFloat($indexes['46']);
        self::assertEquals(105, $indexes['46']);
    }

    public function testAucunModeleGenereNEstVide(): void
    {
        $fichiers = glob(dirname(__DIR__, 2) . '/src/Models/*.php');
        self::assertNotEmpty($fichiers, 'Aucun fichier trouvé dans src/Models.');

        $examines = 0;
        $vides = [];
        foreach ($fichiers as $fichier) {
            $classe = 'Beekube\\BlupSDK\\Models\\' . basename($fichier, '.php');
            self::assertTrue(
                class_exists($classe) || interface_exists($classe),
                sprintf('%s ne définit pas %s.', basename($fichier), $classe)
            );

            $reflexion = new ReflectionClass($classe);
            // Les énumérations du générateur sont des enum PHP natifs, sans propriétés par construction.
            if ($reflexion->isInterface() || $reflexion->isAbstract() || $reflexion->isEnum()
                || !$reflexion->implementsInterface(ModelInterface::class)) {
                continue;
            }

            ++$examines;
            if ($classe::openAPITypes() === []) {
                $vides[] = $reflexion->getShortName();
            }
        }

        self::assertGreaterThan(0, $examines, 'Aucun modèle examiné : le test ne contrôle plus rien.');
        self::assertSame(
            [],
            $vides,
            'Modèles générés sans aucune propriété (anyOf mal lu par le générateur ?) : ' . implode(', ', $vides)
        );
    }
}
