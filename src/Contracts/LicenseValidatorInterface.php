<?php
namespace Kerackser\LicenseClient\Contracts;

interface LicenseValidatorInterface
{
    public function validateLicense(string $licenseKey): bool;
}
?>