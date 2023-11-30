<?php

namespace Etore\Utils;

use Illuminate\Support\Facades\Validator;

class DataValidator
{
    public function isPass(array $data, array $schema): bool
    {
        $validator = Validator::make($data, $schema);
        return $validator->errors()->isEmpty();
    }

    public function isValidatePass(array $data, array $schema): array
    {
        $validator = Validator::make($data, $schema);
        return $validator->errors()->getMessages();
    }
}
