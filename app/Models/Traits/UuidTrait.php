<?php
namespace App\Models\Traits;

use Illuminate\Support\Str;

/**
 * Trait para geração de uuids.
 */
trait UuidTrait
{
    public static function bootUuidTrait()
    {
        static::creating(function ($model) {
            $uid = $model->getKeyName();
            if (!empty($model->$uid)) {
                return;
            }
            $model->$uid = Str::uuid();
        });
    }
}
