<?php

namespace OpenClassrooms\FrontDesk\Doubles\Models;

use OpenClassrooms\FrontDesk\Models\Person;
use PHPUnit_Framework_Assert as Assert;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
trait PersonTestCase
{
    /**
     * @param Person[] $people
     */
    protected function assertPeople(array $people)
    {
        $i = 0;
        foreach ($people as $person) {
            $personStub = '\OpenClassrooms\FrontDesk\Doubles\Models\PersonStub'.++$i;
            $this->assertPerson(new $personStub(), $person);
        }
    }

    protected function assertPerson(Person $expected, Person $actual)
    {
        Assert::assertEquals($expected->getAddress(), $actual->getAddress());
        Assert::assertEquals($expected->getBirthdate(), $actual->getBirthdate());
        Assert::assertEquals($expected->getCustomFields(), $actual->getCustomFields());
        Assert::assertEquals($expected->getEmail(), $actual->getEmail());
        Assert::assertEquals($expected->getFirstName(), $actual->getFirstName());
        Assert::assertEquals($expected->getGuardianEmail(), $actual->getGuardianEmail());
        Assert::assertEquals($expected->getGuardianName(), $actual->getGuardianName());
        Assert::assertEquals($expected->getJoinedAt(), $actual->getJoinedAt());
        Assert::assertEquals($expected->getLastName(), $actual->getLastName());
        Assert::assertEquals($expected->getLocationId(), $actual->getLocationId());
        Assert::assertEquals($expected->getMiddleName(), $actual->getMiddleName());
        Assert::assertEquals($expected->getPhone(), $actual->getPhone());
        Assert::assertEquals($expected->getPrimaryStaffMember(), $actual->getPrimaryStaffMember());
        Assert::assertEquals($expected->isSendInvite(), $actual->isSendInvite());
        Assert::assertEquals($expected->isSkipComplimentaryPasses(), $actual->isSkipComplimentaryPasses());
        Assert::assertEquals($expected->getStaffContactId(), $actual->getStaffContactId());
    }
}
