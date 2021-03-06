<?php

namespace OpenClassrooms\FrontDesk\Repository;

use OpenClassrooms\FrontDesk\Doubles\Client\Impl\ReportingApiClientMock;
use OpenClassrooms\FrontDesk\Gateways\StaffMemberGateway;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class StaffMemberRepositoryTest extends \PHPUnit_Framework_TestCase
{
    const DATA_RESPONSE = 'data';

    const DATA_RESPONSE_2 = 'data2';

    const DATA_RESPONSE_3 = 'data3';

    const DATA_RESPONSE_4 = 'data4';

    /**
     * @var StaffMemberGateway
     */
    private $staffMemberRepository;

    /**
     * @test
     */
    public function multiplePages_PostQuery_ReturnResult()
    {
        ReportingApiClientMock::$response = [
            json_encode(
                [
                    'data' => [
                        'attributes' => [
                            'rows'     => [
                                0 => [self::DATA_RESPONSE, self::DATA_RESPONSE_2],
                            ],
                            'has_more' => true,
                            'last_key' => 1,
                        ],
                    ],
                ]
            ),
            json_encode(
                [
                    'data' => [
                        'attributes' => [
                            'rows'     => [
                                0 => [self::DATA_RESPONSE_3, self::DATA_RESPONSE_4],
                            ],
                            'has_more' => false,
                            'last_key' => 1,
                        ],
                    ],
                ]
            ),
        ];

        $result = $this->staffMemberRepository->query(['email', 'id']);

        $this->assertEquals([0 => ['email' => self::DATA_RESPONSE, 'id' => self::DATA_RESPONSE_2]], $result[0]);
        $this->assertEquals([0 => ['email' => self::DATA_RESPONSE_3, 'id' => self::DATA_RESPONSE_4]], $result[1]);
    }

    /**
     * @test
     */
    public function onePage_PostQuery_ReturnResult()
    {
        ReportingApiClientMock::$response = [
            json_encode(
                [
                    'data' => [
                        'attributes' => [
                            'rows'     => [
                                0 => [self::DATA_RESPONSE, self::DATA_RESPONSE_2],
                            ],
                            'has_more' => false,
                            'last_key' => null,
                        ],
                    ],
                ]
            ),
        ];

        $result = $this->staffMemberRepository->query(['email', 'id']);

        $this->assertEquals([0 => ['email' => self::DATA_RESPONSE, 'id' => self::DATA_RESPONSE_2]], $result[0]);
    }

    protected function setUp()
    {
        $this->staffMemberRepository = new StaffMemberRepository();
        $this->staffMemberRepository->setReportingApiClient(new ReportingApiClientMock());
    }
}
