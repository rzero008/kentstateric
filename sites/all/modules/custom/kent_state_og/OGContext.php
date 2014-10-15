<?php

namespace kent_state_og;

class OGContext{
    public static $name = null;
    public static $nid = null;
    public static $type = null;
    public static $campus = null;
    public static $theme = null;
    public static $contact = array();
    public static $primaryMenuName = null;
    public static $primaryMenu = array();
    public static $parent = null;
    private static $hasInstance = false;
    
    public static function init($nodeid = null)
    {    
        
        //Singletons are bad mmkay. Use DI mmkay. Don't do this kind of stuff in better frameworks 
        if(self::$hasInstance){
            return false;
        }
        
        //dont blow up completely when og context doesnt exist from a fresh install
        if(!function_exists('og_context')){
            return false;
        }           
        
        self::$contact = array(
            'address' => '',
            'phone' => '',
            'email' => '',
        );            
        
        if(!empty($nodeid)){
            $node = node_load($nodeid);
            $og = og_context('node', $node);
        }
        else{            
            $og = og_context('node');
        }        

        if(!empty($og)){
            //seriously, don't.
            self::$hasInstance = true;
            
            $og_node = node_load($og['gid']);
            
            self::$name = $og_node->title;
            self::$nid = $og_node->nid;
            self::$type = $og_node->type;
            
            $og_campus_location = field_get_items('node', $og_node, 'field_campus_location');
            $og_theme = field_get_items('node', $og_node, 'field_group_theme');
            self::$campus = taxonomy_term_load($og_campus_location[0]['tid']);
            self::$theme = taxonomy_term_load($og_theme[0]['tid']);
            $og_address = field_get_items('node', $og_node, 'field_group_address');
            $og_phone = field_get_items('node', $og_node, 'field_group_phone');
            $og_email = field_get_items('node', $og_node, 'field_group_email');
            self::$contact['address'] = !empty($og_address) ? $og_address[0]['value'] : '';
            self::$contact['phone'] = !empty($og_phone) ? $og_phone[0]['value'] : '';
            self::$contact['email'] = !empty($og_email) ? $og_email[0]['value'] : '';            
            
            //init parent if it exists
            $og_group_ref = field_get_items('node', $og_node, 'og_group_ref');
            if(!empty($og_group_ref)){
                self::$parent = new OGParentContext($og_group_ref[0]['target_id']);
            }

            $menu_entries = _og_menu_utilities_og_menu_get_group_menus(array('node'=>array(self::$nid)), NULL, 'primary');

            if(!empty($menu_entries)){
                self::$primaryMenuName = $menu_entries[0]['menu_name'];
                self::$primaryMenu = menu_tree_output(menu_tree_all_data($menu_entries[0]['menu_name']));
            }
            else if(!empty(self::$parent->nid)){
                $parent_menu_entries = _og_menu_utilities_og_menu_get_group_menus(array('node'=>array(self::$parent->nid)), NULL, 'primary');
                if(!empty($parent_menu_entries)){
                    self::$primaryMenuName = $parent_menu_entries[0]['menu_name'];
                    self::$primaryMenu = menu_tree_output(menu_tree_all_data($parent_menu_entries[0]['menu_name']));
                }
                else{
                    self::$primaryMenuName = 'main-menu';
                    self::$primaryMenu = menu_tree_output(menu_tree_all_data('main-menu'));
                }
            }
            else{
                self::$primaryMenuName = 'main-menu';
                self::$primaryMenu = menu_tree_output(menu_tree_all_data('main-menu'));
            }
            return true;
        }
        
        //get the default campus
        $default_campus = variable_get('kent_state_og_default_campus', array());
        self::$campus = taxonomy_term_load($default_campus);

        $default_theme = variable_get('kent_state_og_default_theme', array());
        self::$theme = taxonomy_term_load($default_theme);
        
        //get the default menu
        self::$primaryMenuName = 'main-menu';
        self::$primaryMenu = menu_tree_output(menu_tree_all_data('main-menu'));
        return false;
    }    
}

class OGParentContext{
    public $name = null;
    public $nid = null;
    public $type = null;
    public $contact = null;
    
    public function __construct($og_group_ref){
        $og_node = node_load($og_group_ref);
        $this->name = $og_node->title;
        $this->nid = $og_node->nid;
        $this->type = $og_node->type;

        $og_address = field_get_items('node', $og_node, 'field_group_address');
        $og_phone = field_get_items('node', $og_node, 'field_group_phone');
        $og_email = field_get_items('node', $og_node, 'field_group_email');
        
        $this->contact['address'] = !empty($og_address) ? $og_address[0]['value'] : '';
        $this->contact['phone'] = !empty($og_phone) ? $og_phone[0]['value'] : '';
        $this->contact['email'] = !empty($og_email) ? $og_email[0]['value'] : '';        
    }
}
