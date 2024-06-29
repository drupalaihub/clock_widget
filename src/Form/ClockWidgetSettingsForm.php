<?php

namespace Drupal\clock_widget\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure clock widget settings for this site.
 */
class ClockWidgetSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'clock_widget_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['clock_widget.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('clock_widget.settings');

    $form['display_est'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Display EST Clock'),
      '#default_value' => $config->get('display_est'),
    ];

    $form['display_utc'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Display UTC Clock'),
      '#default_value' => $config->get('display_utc'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('clock_widget.settings')
      ->set('display_est', $form_state->getValue('display_est'))
      ->set('display_utc', $form_state->getValue('display_utc'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
