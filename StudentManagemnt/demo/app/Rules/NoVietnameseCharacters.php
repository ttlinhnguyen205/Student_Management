<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;

class NoVietnameseCharacters implements ValidationRule
{
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        if (preg_match('/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/i', $value)) {
            $fail("The :attribute field must not contain Vietnamese characters.");
        }
    }
}
