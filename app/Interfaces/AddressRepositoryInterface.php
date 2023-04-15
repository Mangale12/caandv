<?php

namespace App\Interfaces;

interface AddressRepositoryInterface
{
    public function getAllCountry();
    public function getCountryById($CountryId);
    public function deleteCountry($CountryId);
    public function createCountry(object $CountryDetails);
    public function updateCountry($CountryId, object $newDetails);
}
