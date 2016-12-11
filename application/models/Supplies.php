<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author Gerard
 */
class Supplies extends MY_Model {
    // Constructor
    public function __construct()
    {
        parent::__construct();
    }
    //set rules to check for Receiving edit form on Receiving Page before update item to database
    function rules() {
        $config = [
            ['field'=>'id', 'label'=>'Menu code'],
            ['field'=>'name', 'label'=>'Item name'],
            ['field'=>'qty_onhand', 'label'=>'Item onhand'],
            ['field'=>'qty_inventory', 'label'=>'Item stock', 'rules'=> 'required|decimal'],
            ['field'=>'price', 'label'=>'Price', 'rules'=> 'required|decimal']
        ];
        return $config;
    }
    //set rules to check for Receiving edit form on Admin Page before update item to database
    function adminSupplyRules() {
        $config = [
            ['field'=>'id', 'label'=>'Menu code'],
            ['field'=>'name', 'label'=>'Item name','rules'=> 'required'],
            ['field'=>'qty_onhand', 'label'=>'Item onhand','rules'=> 'required|decimal'],
            ['field'=>'qty_inventory', 'label'=>'Item stock', 'rules'=> 'required|decimal'],
            ['field'=>'price', 'label'=>'Price', 'rules'=> 'required|decimal']
        ];
        return $config;
    }

}