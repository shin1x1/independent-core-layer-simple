<?php
declare(strict_types=1);

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $account_number
 * @property int $balance
 */
final class EloquentAccount extends Model
{
    protected $table = 'accounts';

    public $timestamps = false;
}
