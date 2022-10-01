<?php

namespace Redsnapper\LaravelVersionControl\Database;

use Illuminate\Database\Schema\Blueprint as LaravelBlueprint;

class Blueprint extends LaravelBlueprint
{

    public function vcKeyTableColumns(string $tableName)
    {
        $this->uuid('id')->unique();
        $this->uuid('vc_version_id');
        $this->boolean('vc_active')->default(1);
        $this->primary('id', "{$tableName}_vc_primary_key");
    }

    public function vcVersionTableColumns($tableName)
    {
        $this->uuid('id');
        $this->uuid('model_id');
        $this->uuid('vc_parent')->nullable();
        $this->boolean('vc_active')->default(true);
        $this->uuid('vc_modifier_id')->nullable();
        $this->primary('id', "{$tableName}_vc_primary_key");
    }
}
