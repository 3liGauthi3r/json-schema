<?php

namespace JsonSchema\Validator;

/**
 * The String Validator, validates an string against a given schema
 *
 * @author Robert Schönthal <seroscho@googlemail.com>
 * @author Bruno Prieto Reis <bruno.p.reis@gmail.com>
 */
class String extends Validator
{
    /**
     * {inheritDoc}
     */
    public function check($element, $schema = null, $path = null, $i = null)
    {
        // verify maxLength
        if (isset($schema->maxLength) && strlen($element) > $schema->maxLength) {
            $this->addError($path, "must be at most " . $schema->maxLength . " characters long");
        }

        //verify minLength
        if (isset($schema->minLength) && strlen($element) < $schema->minLength) {
            $this->addError($path, "must be at least " . $schema->minLength . " characters long");
        }

        // verify a regex pattern
        if (isset($schema->pattern) && !preg_match('/' . $schema->pattern . '/', $element)) {
            $this->addError($path, "does not match the regex pattern " . $schema->pattern);
        }
    }
}