<?php
class Menu {

    private static $items = array('dashboard' => '',
                                'transactions' => '',
                                'orders' => '',
                                'trades' => '',
                                'deposits' => '',
                                'property_management' => '',
                                'listings' => '',
                                'user_management' => '',
                                'admins' => '',
                                'users' => '',
                                'for_approval' => '',
                                'account_managers' => '',
                                'property_managers' => '',
                                'content_managers' => '',
                                'real_estate_agents' => '',
                                'escrow_managers' => '',
                                'promoters' => ''
                            );

    public static function setSelected($active_item)
    {
        self::$items[$active_item] = 'active';
    }

    public static function getSelected($active_item , $user_menu=array())
    {
        if (!empty($user_menu)) {
            foreach ($user_menu as $i => $v) {
                self::$items[$i] = 'hide';
            }
        }

        return self::$items[$active_item];
    }
} 