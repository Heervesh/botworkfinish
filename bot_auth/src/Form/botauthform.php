<?php

/**
*@file
*contains Drupal\modules\bot\bot_auth\Form\botauthform
*/

namespace Drupal\modules\bot\Form;

use Drupal/Core/Form\ConfigFormBase;

class bot_auth extents ConfigFormBase {

 /**
 *{@inheridoc}
 */
 public function getFormId() {
  return 'bot_auth_form';
 }
}
