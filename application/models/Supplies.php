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


	// retrieve a single quote
	/*public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}*/

}