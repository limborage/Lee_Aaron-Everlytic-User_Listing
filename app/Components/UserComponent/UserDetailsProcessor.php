<?php

namespace App\Components\UserComponent;

use Symfony\Component\HttpFoundation\Request;

class UserDetailsProcessor
{
    public const USER_DETAIL_FIELDS = [
        'name',
        'surname',
        'email',
        'position'
    ];

    public function RequestUserDetailsExtractor(array $userRequestData = []): array
    {
        $userDetailsArray = [];

        if ($userRequestData !== null) {
            foreach (self::USER_DETAIL_FIELDS as $fieldToCheck) {
                $userDetailsArray[$fieldToCheck] = $userRequestData[$fieldToCheck] ?? '';
            }
        }

        return $userDetailsArray;
    }
}