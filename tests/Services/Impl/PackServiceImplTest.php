<?php

namespace OpenClassrooms\FrontDesk\Services\Impl;

use OpenClassrooms\FrontDesk\Doubles\Gateways\PackGatewayMock;
use OpenClassrooms\FrontDesk\Doubles\Models\PackStub1;
use OpenClassrooms\FrontDesk\Doubles\Models\PackTestCase;
use OpenClassrooms\FrontDesk\Models\Impl\PackBuilderImpl;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class PackServiceImplTest extends \PHPUnit_Framework_TestCase
{
    use PackTestCase;

    const PACK_PRODUCT_ID = 2222222;

    const PACK_ID = 11111;

    /**
     * @var PackServiceImpl
     */
    protected $service;

    /**
     * @test
     */
    public function create_ReturnId()
    {
        $actualId = $this->service->create($this->buildPack(), self::PACK_PRODUCT_ID);

        $this->assertEquals(1, $actualId);
        $this->assertPack(new PackStub1(), PackGatewayMock::$packs[1]);
    }

    /**
     * @return \OpenClassrooms\FrontDesk\Models\Pack
     */
    private function buildPack()
    {
        $packBuilder = new PackBuilderImpl();

        return $packBuilder
            ->create()
            ->withCount(PackStub1::COUNT)
            ->withEndDate(new \DateTime(PackStub1::END_DATE))
            ->withPersonIds(PackStub1::PERSON_IDS)
            ->withStartDate(new \DateTime(PackStub1::START_DATE))
            ->build();
    }

    /**
     * @test
     */
    public function deletePack_ReturnNull()
    {
        $actualPack = $this->service->deletePack(self::PACK_ID);
        $this->assertEmpty($actualPack);
    }

    protected function setUp()
    {
        $this->service = new PackServiceImpl();
        $this->service->setPackGateway(new PackGatewayMock([new PackStub1()]));
    }
}
