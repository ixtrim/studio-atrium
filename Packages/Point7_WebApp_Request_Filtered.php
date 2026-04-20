<?php
/**
 * Request with per-action param validation driven by module XML config.
 * The dispatcher populates $allowedParams, $errors, and $valid after parsing the XML.
 */
class Point7_WebApp_Request_Filtered extends Point7_WebApp_Request
{
    private bool   $valid         = true;
    private array  $errors        = [];
    private array  $invalidFields = [];
    private array  $allowedNames  = [];

    public function markInvalid(string $field, string $message): void
    {
        $this->valid           = false;
        $this->errors[]        = $message;
        $this->invalidFields[] = $field;
    }

    public function setAllowedParams(array $names): void
    {
        $this->allowedNames = $names;
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function getErrorMessages(): array
    {
        return $this->errors;
    }

    public function getInvalidFields(): array
    {
        return $this->invalidFields;
    }

    public function isParamAllowed(string $name): bool
    {
        return empty($this->allowedNames) || in_array($name, $this->allowedNames, true);
    }
}
