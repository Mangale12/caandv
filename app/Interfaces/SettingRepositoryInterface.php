<?php

namespace App\Interfaces;

interface SettingRepositoryInterface
{
    public function getAllSettings();
    public function getSettingById($id);
    public function deleteSetting($id);
    public function createSetting(object $SettingDetails);
    public function updateSetting($id, object $SettingDetails);
    public function getCountry($name);
}
