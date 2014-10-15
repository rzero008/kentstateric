<?php

/**
 * Validate whether an argument is a valid group.
 *
 * This supports numeric arguments (GID). This validator also sets the
 * argument's title to the group label, which is the main reason behind this
 * validator.
 */
class ksu_custom_tweaks_plugin_argument_validate_group_short_name extends views_plugin_argument_validate {

    /**
     * List the options relevant for this plugin.
     */
    function option_definition() {
        $options = parent::option_definition();
        $groups = og_get_all_group_entity();
        $options['group_type'] = array('default' => key($groups));

        return $options;
    }

    /**
     * Provide the default form for setting options.
     */
    function options_form(&$form, &$form_state) {
        $form['group_type'] = array(
            '#type' => 'select',
            '#title' => t('Group type'),
            '#description' => t('Select the group type.'),
            '#options' => og_get_all_group_entity(),
            '#default_value' => $this->options['group_type'],
            '#required' => og_get_all_group_entity(),
        );
    }

    function validate_argument($argument) {
        if (empty($argument)) {
            return;
        }

        if(is_numeric($argument)){
            $group_type = $this->options['group_type'];
            $entity = entity_load_single($group_type, $argument);
            
            if (!$entity || !og_is_group($group_type, $entity)) {
                return FALSE;
            }
            
            $this->argument->argument = $argument;
            $this->argument->validated_title = entity_label($group_type, $entity);
            ksu_custom_blocks\OGContext::init($argument);
            return TRUE;
        }
        
        $query = new EntityFieldQuery();
        
        $query->entityCondition('entity_type', 'node')
              ->propertyCondition('status', 1)
              ->fieldCondition('field_group_short_name', 'value', $argument, '=');
        
        $result = $query->execute();
        
        if(!empty($result)){
            $group = array_shift($result['node']);
            $group_type = $this->options['group_type'];
            $entity = entity_load_single($group_type, $group->nid);
            
            if(!og_is_group($group_type, $entity)){
                return false;
            }
            
            $this->argument->argument = $group->nid;
            $this->argument->validated_title = entity_label($group_type, $entity);
            ksu_custom_blocks\OGContext::init($group->nid);
            return true;
        }
        
        return false;
    }
}