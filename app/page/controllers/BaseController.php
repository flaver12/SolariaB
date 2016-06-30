<?php
/*-------------------------------------------------------+
| Stormform
| Copyright (C) devstorm 2014-2015
+--------------------------------------------------------+
| Filename: BaseController.php
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

namespace Stormform\Page\Controllers;

use Stormform\Helpers\NaviHelper;
use Stormform\Models\Config;
use Stormform\Models\Role;
use Stormform\Models\Resource;

use \Phalcon\Acl\Role as ACLRole;
use \Phalcon\Acl\Resource as ALCResource;

class BaseController extends \Phalcon\Mvc\Controller
{

    /**
     * Init function
     *
     * @return void
     */
	public function initialize()
    {
        //Load now the configs
        $siteTitle = Config::findFirst(array(
            'name' => 'site_name'
        ));

		$this->tag->setTitle($siteTitle->getValue());
        $this->startACL();
	}

    private function startACL()
    {
        //Add the roles
        $roles = Role::find();
        foreach($roles as $role) {
            if(!is_null($role->extends)) {
                $parent = Role::findFirst($role->extends)->name;
                $this->acl->addRole(new ACLRole($role->name, new ACLRole($parent)));
            } else {
                $this->acl->addRole(new ACLRole($role->name));
            }

        }

        //Add now the recources
        $resources = Resource::find();

        foreach($resources as $resource) {

            $this->acl->addResource($resource->name, $resource->resource);
        }
        //var_dump($this->acl);die;
    }
}

?>
