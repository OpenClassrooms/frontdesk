<?php

namespace OpenClassrooms\FrontDesk\Models;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
interface PersonBuilder
{
    /**
     * @return PersonBuilder
     */
    public function create();

    /**
     * @param string $address
     *
     * @return PersonBuilder
     */
    public function withAddress($address);

    /**
     * @return PersonBuilder
     */
    public function withBirthdate(\DateTime $birthdate);

    /**
     * @param array|null $customFields
     *
     * @return PersonBuilder
     */
    public function withCustomFields(array $customFields = null);

    /**
     * @param string $email
     *
     * @return PersonBuilder
     */
    public function withEmail($email);

    /**
     * @param string $firstName
     *
     * @return PersonBuilder
     */
    public function withFirstName($firstName);

    /**
     * @param string $guardianName
     *
     * @return PersonBuilder
     */
    public function withGuardianName($guardianName);

    /**
     * @param string $guardianEmail
     *
     * @return PersonBuilder
     */
    public function withGuardianEmail($guardianEmail);

    /**
     * @return PersonBuilder
     */
    public function withJoinedAt(\DateTime $joinedAt = null);

    /**
     * @param int $locationId
     *
     * @return PersonBuilder
     */
    public function withLocationId($locationId);

    /**
     * @param string $lastName
     *
     * @return PersonBuilder
     */
    public function withLastName($lastName);

    /**
     * @param string $middleName
     *
     * @return PersonBuilder
     */
    public function withMiddleName($middleName);

    /**
     * @param string $phone
     *
     * @return PersonBuilder
     */
    public function withPhone($phone);

    /**
     * @param bool $sendInvite
     *
     * @return PersonBuilder
     */
    public function withSendInvite($sendInvite);

    /**
     * @param bool $skipComplimentaryPasses
     *
     * @return PersonBuilder
     */
    public function withSkipComplimentaryPasses($skipComplimentaryPasses);

    /**
     * @return Person
     */
    public function build();
}
