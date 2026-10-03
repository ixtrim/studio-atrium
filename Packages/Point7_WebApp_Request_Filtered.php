<?php
/**
 * Request with per-action param validation driven by module XML config.
 * The dispatcher populates $allowedParams, $errors, and $valid after parsing the XML.
 */
class Point7_WebApp_Request_Filtered extends Point7_WebApp_Request
{
    private $valid         = true;
    /** @var array<string, list<string>> field => messages */
    private $errors        = [];
    private $invalidFields = [];
    private $allowedNames  = [];

    public function markInvalid(string $field, string $message)
    {
        $this->valid = false;
        if (!isset($this->errors[$field])) {
            $this->errors[$field] = [];
        }
        $this->errors[$field][] = $message;
        if (!in_array($field, $this->invalidFields, true)) {
            $this->invalidFields[] = $field;
        }
    }

    public function setAllowedParams(array $names)
    {
        $this->allowedNames = $names;
    }

    /**
     * Copy validation outcome onto this instance (used after request rebuild).
     *
     * @param array<string, list<string>> $errors
     * @param list<string> $invalidFields
     */
    public function restoreValidationState($valid, array $errors, array $invalidFields)
    {
        $this->valid         = (bool)$valid;
        $this->errors        = $errors;
        $this->invalidFields = $invalidFields;
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @return array<string, list<string>>
     */
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
