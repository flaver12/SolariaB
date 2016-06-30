<?php
/*-------------------------------------------------------+
| Stormform
| Copyright (C) devstorm 2014-2016
+--------------------------------------------------------+
| Filename: IndexController.php
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

use Stormform\Page\Controllers\BaseController;
use Stormform\Models\User;

 class UserController extends BaseController
 {

 /**
  * Create a user action
  *
  * @return void
  */
  public function createAction()
  {
      if($this->request->isPost()) {
          $user = new User();
          $user->username = $this->request->getPost('username');
          $user->password = sha1($this->request->getPost('password'));
          $user->email = $this->request->getPost('email', 'email');
          $user->create();
      } else {
          //Do here some view stuff
      }
  }

  public function loginAction()
  {
      if($this->request->isPost()) {
          $user = User::findFirst(array('username' => $this->request->getPost('username'), 'password' => $this->request->getPost('password')));
          if($user) {
              $this->session->set('auth', $user);
          }
      }
  }

 }
?>
