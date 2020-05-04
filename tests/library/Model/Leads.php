<?php

namespace Baka\Test\Model;

use Baka\Database\Contracts\CustomFields\CustomFieldsTrait;
use Baka\Database\Model;

class Leads extends Model
{
    use CustomFieldsTrait;

    /**
     * Specify the table.
     *
     * @return void
     */
    public function getSource()
    {
        return 'leads';
    }
}
