<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\ApiDateFormat;
use OpenClassrooms\FrontDesk\Models\Plan;
use PHPUnit_Framework_Assert as Assert;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
trait PlanTestCase
{
    protected function assertPlan(Plan $expected, Plan $actual)
    {
        Assert::assertEquals($expected->getCanceledAt(), $actual->getCanceledAt());
        Assert::assertEquals($expected->getCount(), $actual->getCount());
        Assert::assertEquals($expected->getCreatedAt(), $actual->getCreatedAt());
        Assert::assertEquals($expected->getDescription(), $actual->getDescription());
        Assert::assertEquals(
            $expected->getEndDate()->format(ApiDateFormat::DATE_FORMAT_MIN),
            $actual->getEndDate()->format(ApiDateFormat::DATE_FORMAT_MIN)
        );
        Assert::assertEquals($expected->getId(), $actual->getId());
        Assert::assertEquals($expected->isConsiderMember(), $actual->isConsiderMember());
        Assert::assertEquals($expected->getLocationId(), $actual->getLocationId());
        Assert::assertEquals($expected->getName(), $actual->getName());
        Assert::assertEquals($expected->getPersonIds(), $actual->getPersonIds());
        Assert::assertEquals($expected->getPlanProductId(), $actual->getPlanProductId());
        Assert::assertEquals($expected->getPriceCents(), $actual->getPriceCents());
        Assert::assertEquals($expected->getStaffMemberId(), $actual->getStaffMemberId());
        Assert::assertEquals(
            $expected->getStartDate()->format(ApiDateFormat::DATE_FORMAT_MIN),
            $actual->getStartDate()->format(ApiDateFormat::DATE_FORMAT_MIN)
        );
        Assert::assertEquals($expected->getType(), $actual->getType());
        Assert::assertEquals(
            $expected->getUpdateAt()->format(ApiDateFormat::DATE_FORMAT_MIN),
            $actual->getUpdateAt()->format(ApiDateFormat::DATE_FORMAT_MIN)
        );
        Assert::assertTrue($actual->isActive());
    }
}
