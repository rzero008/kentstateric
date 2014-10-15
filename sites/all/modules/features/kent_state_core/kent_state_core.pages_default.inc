<?php
/**
 * @file
 * kent_state_core.pages_default.inc
 */

/**
 * Implements hook_default_page_manager_handlers().
 */
function kent_state_core_default_page_manager_handlers() {
  $export = array();

  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'user_view_panel_context';
  $handler->task = 'user_view';
  $handler->subtask = '';
  $handler->handler = 'panel_context';
  $handler->weight = -99;
  $handler->conf = array(
    'title' => 'Panel',
    'no_blocks' => 0,
    'pipeline' => 'standard',
    'body_classes_to_remove' => '',
    'body_classes_to_add' => '',
    'css_id' => '',
    'css' => '',
    'contexts' => array(
      0 => array(
        'identifier' => 'User',
        'keyword' => 'user_2',
        'name' => 'user',
        'type' => 'current',
        'uid' => '',
        'id' => 1,
      ),
    ),
    'relationships' => array(),
  );
  $display = new panels_display();
  $display->layout = 'onecol';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'middle' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = '';
  $display->uuid = 'e7b83905-a406-4eec-ab31-a2d31a59bd3c';
  $display->content = array();
  $display->panels = array();
    $pane = new stdClass();
    $pane->pid = 'new-11a50e73-1507-43a6-b824-025f485dfaba';
    $pane->panel = 'middle';
    $pane->type = 'user_profile';
    $pane->subtype = 'user_profile';
    $pane->shown = TRUE;
    $pane->access = array();
    $pane->configuration = array(
      'view_mode' => 'full',
      'context' => 'argument_entity_id:user_1',
      'override_title' => 0,
      'override_title_text' => 'My profile',
    );
    $pane->cache = array();
    $pane->style = array(
      'settings' => NULL,
    );
    $pane->css = array();
    $pane->extras = array();
    $pane->position = 0;
    $pane->locks = array();
    $pane->uuid = '11a50e73-1507-43a6-b824-025f485dfaba';
    $display->content['new-11a50e73-1507-43a6-b824-025f485dfaba'] = $pane;
    $display->panels['middle'][0] = 'new-11a50e73-1507-43a6-b824-025f485dfaba';
    $pane = new stdClass();
    $pane->pid = 'new-70ca5200-f269-47b6-9444-7e826c2a3900';
    $pane->panel = 'middle';
    $pane->type = 'views_panes';
    $pane->subtype = 'user_content-panel_pane_1';
    $pane->shown = TRUE;
    $pane->access = array(
      'plugins' => array(
        0 => array(
          'name' => 'compare_users',
          'settings' => array(
            'equality' => '1',
          ),
          'context' => array(
            0 => 'argument_entity_id:user_1',
            1 => 'logged-in-user',
          ),
          'not' => FALSE,
        ),
      ),
    );
    $pane->configuration = array(
      'context' => array(
        0 => 'argument_entity_id:user_1',
      ),
      'override_title' => 0,
      'override_title_text' => 'My Content',
    );
    $pane->cache = array();
    $pane->style = array(
      'settings' => NULL,
    );
    $pane->css = array();
    $pane->extras = array();
    $pane->position = 1;
    $pane->locks = array();
    $pane->uuid = '70ca5200-f269-47b6-9444-7e826c2a3900';
    $display->content['new-70ca5200-f269-47b6-9444-7e826c2a3900'] = $pane;
    $display->panels['middle'][1] = 'new-70ca5200-f269-47b6-9444-7e826c2a3900';
    $pane = new stdClass();
    $pane->pid = 'new-093c9942-aff0-4806-870a-81ec615013b7';
    $pane->panel = 'middle';
    $pane->type = 'views_panes';
    $pane->subtype = 'profiles-user_profile_pane';
    $pane->shown = TRUE;
    $pane->access = array();
    $pane->configuration = array();
    $pane->cache = array();
    $pane->style = array(
      'settings' => NULL,
    );
    $pane->css = array();
    $pane->extras = array();
    $pane->position = 2;
    $pane->locks = array();
    $pane->uuid = '093c9942-aff0-4806-870a-81ec615013b7';
    $display->content['new-093c9942-aff0-4806-870a-81ec615013b7'] = $pane;
    $display->panels['middle'][2] = 'new-093c9942-aff0-4806-870a-81ec615013b7';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = 'new-70ca5200-f269-47b6-9444-7e826c2a3900';
  $handler->conf['display'] = $display;
  $export['user_view_panel_context'] = $handler;

  return $export;
}

/**
 * Implements hook_default_page_manager_pages().
 */
function kent_state_core_default_page_manager_pages() {
  $page = new stdClass();
  $page->disabled = FALSE; /* Edit this to true to make a default page disabled initially */
  $page->api_version = 1;
  $page->name = 'group_dashboard';
  $page->task = 'page';
  $page->admin_title = 'Group Dashboard';
  $page->admin_description = '';
  $page->path = 'groupdash/%group-id';
  $page->access = array(
    'plugins' => array(
      0 => array(
        'name' => 'role',
        'settings' => array(
          'rids' => array(
            0 => 2,
          ),
        ),
        'context' => 'logged-in-user',
        'not' => FALSE,
      ),
    ),
    'logic' => 'and',
  );
  $page->menu = array();
  $page->arguments = array(
    'group-id' => array(
      'id' => 1,
      'identifier' => 'Node: ID',
      'name' => 'entity_id:node',
      'settings' => array(),
    ),
  );
  $page->conf = array(
    'admin_paths' => FALSE,
  );
  $page->default_handlers = array();
  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'page_group_dashboard_panel_context';
  $handler->task = 'page';
  $handler->subtask = 'group_dashboard';
  $handler->handler = 'panel_context';
  $handler->weight = 0;
  $handler->conf = array(
    'title' => 'Group Dashboard Panel',
    'no_blocks' => 0,
    'pipeline' => 'standard',
    'body_classes_to_remove' => '',
    'body_classes_to_add' => '',
    'css_id' => '',
    'css' => '',
    'contexts' => array(),
    'relationships' => array(),
  );
  $display = new panels_display();
  $display->layout = 'onecol';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'middle' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = '';
  $display->uuid = '026cb2d3-5b19-4d0d-bb87-17a6ce36dc88';
  $display->content = array();
  $display->panels = array();
    $pane = new stdClass();
    $pane->pid = 'new-9b87377d-6869-482a-b4cc-d15f0709d6ac';
    $pane->panel = 'middle';
    $pane->type = 'views_panes';
    $pane->subtype = 'og_nodes-panel_pane_1';
    $pane->shown = TRUE;
    $pane->access = array();
    $pane->configuration = array(
      'context' => array(
        0 => 'argument_entity_id:node_1',
      ),
    );
    $pane->cache = array();
    $pane->style = array(
      'settings' => NULL,
    );
    $pane->css = array();
    $pane->extras = array();
    $pane->position = 0;
    $pane->locks = array();
    $pane->uuid = '9b87377d-6869-482a-b4cc-d15f0709d6ac';
    $display->content['new-9b87377d-6869-482a-b4cc-d15f0709d6ac'] = $pane;
    $display->panels['middle'][0] = 'new-9b87377d-6869-482a-b4cc-d15f0709d6ac';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = 'new-9b87377d-6869-482a-b4cc-d15f0709d6ac';
  $handler->conf['display'] = $display;
  $page->default_handlers[$handler->name] = $handler;
  $pages['group_dashboard'] = $page;

  return $pages;

}
