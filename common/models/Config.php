<?php
/*-------------------------------------------------------+
| Stormform
| Copyright (C) devstorm 2014-2016
+--------------------------------------------------------+
| Filename: Navigation.php
| Author: Flavio Kleiber (flaver12)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/

namespace Stormform\Models;

use Stormform\Models\BaseModel;

class Config extends BaseModel
{
    private $id;

    private $name;

    private $value;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }
}
