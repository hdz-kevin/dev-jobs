<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum UserRole: string
{
    case RECRUITER = "recruiter";
    case DEVELOPER = "developer";

    /**
     * Get all user roles as strings.
     *
     * @return \Illuminate\Support\Collection<int, string>
     */
    public static function values(): Collection
    {
        return (new Collection(self::cases()))
                ->map(fn (self $role) => $role->value);
    }
}
