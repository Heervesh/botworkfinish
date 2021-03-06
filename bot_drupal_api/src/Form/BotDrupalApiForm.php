<?php

/**
*@file
*contains \Drupal\bot_drupal_api\Form\BotDrupalApiForm
*/

namespace Drupal\bot_drupal_api\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class BotDrupalApiForm extends ConfigFormBase {

  /**
  *{@inheridoc}
  */
  public function getFormId() {
    return 'bot_drupal_api_form';
  }
 
  public function buildForm(array $form, FormStateInterface $form_state){
    $form['bot_drupal_api_function_dumps'] = array(
       '#default_value'  => $config->get('bot_drupal_api_function_dumps', _bot_drupal_api_function_dumps_string()),
       '#description'    => t('Specify the api.module function dump URLs you would like to index.  The order URLs are specified will determine priority if multiple             function name matches are found: first found, first served. The syntax takes the form of "&lt;URL>:&lt;LABEL>", where &lt;LABEL> can be optionally used in an   IRC request with "check_markup:&lt;LABEL>?". api.module function dump URLs are always in the form of "http://&lt;DRUPAL_URL>/api/function_dump/&lt;API_BRANCH>".    The &lt;API_BRANCH> and &lt;LABEL> do not have to match. &lt;LABEL>s should be unique.'),
       '#title'          => $this => t('api.module function dump URLs'),
       '#type'           => 'textarea',
    );
    $form['bot_drupal_api_function_dump_update_frequency'] = array(
       '#default_value'  => $config->get('bot_drupal_api_function_dump_update_frequency', 604800),
       '#options'        => array(86400 => t('Day'), 86400 * 2 => t('2 days'), 86400 * 3 => t('3 days'), 604800 => t('Week'), 604800 * 2 => t('2 weeks'), 604800 * 3 =>   t('3 weeks')),
       '#title'          => $this =>t('Update every'), // we could have use format_interval here, but we didn't like "1 day" and "1 week" as strings.
       '#type'           => 'select',
    );

    return parent::buildForm($form, $form_state)
  }
  
  /**
  *{@inheridoc}
  */
  public function submitForm(array &$form, FormStateInterface $form_state){
    parent::submitForm($form, $form_state)
    
    $bot_drupal_api_function_dumps= $form_state->getValue('bot_drupal_api_function_dumps');
    $bot_drupal_api_function_dump_update_frequency= $form_state->getValue('bot_drupal_api_function_dump_update_frequency');
    
  }

 }

