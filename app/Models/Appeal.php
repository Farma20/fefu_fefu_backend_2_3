<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
/**
 * @Property string $name
 * @Property string $surname
 * @Property string|null $patronymic
 * @Property int $age
 * @Property int $gender
 * @Property string|null $phone
 * @Property string|null $email
 * @Property string $message
*/
class Appeal extends Model
{
    use HasFactory;
}
