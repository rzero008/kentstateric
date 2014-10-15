<?php

/**
 * @file
 * Contains the group context argument default plugin.
 */

/**
 * The group context argument default handler.
 */
class kent_state_og_plugin_argument_default_group_context_short_name extends views_plugin_argument_default {

    /**
     * Retrieve the options when this is a new access
     * control plugin
     */
    function option_definition() {
        $options = parent::option_definition();
        $options['group_type'] = array('default' => 'node');

        return $options;
    }

    /**
     * Provide the default form for setting options.
     */
    function options_form(&$form, &$form_state) {
        $form['group_type'] = array(
            '#type' => 'select',
            '#options' => og_get_all_group_entity(),
            '#title' => t('Group type'),
            '#default_value' => $this->options['group_type'],
            '#description' => t('Determine what entity type that group should be of.')
        );
    }

    /**
     * Return the group context argument.
     */
    function get_argument() {
        if ($group = og_context($this->options['group_type'])) {
            $query = new EntityFieldQuery();
            $query->entityCondition('entity_type', 'node')
                  ->entityCondition('entity_id', $group['gid'], '=')
                  ->propertyCondition('status', 1);
            
            $result = $query->execute();
            
            $groups = $result['node'];
            
            $group_stub = array_shift($result['node']);
            
            $group_type = $this->options['group_type'];
            
            $fields = field_info_instances('node', $group_stub->type);
            $field_id = $fields['field_group_short_name']['field_id'];
            field_attach_load('node', $groups, FIELD_LOAD_CURRENT, array('field_id' => $field_id));
            $group = array_shift($groups);
            $field = field_get_items('node', $group, 'field_group_short_name', $langcode = NULL);
            if($field){
                return $field[0]['value'];
            }
            else{
                return $group_stub->nid;
            }
        }
        return FALSE;
    }
}