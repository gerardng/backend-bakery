<?php

require APPPATH . '/third_party/restful/libraries/Rest_controller.php';
class Maintenance extends Rest_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('supplies');
        // $this->load->libraries('curl','format','rest');
    }

    // Handle an incoming GET ... return a menu item or all of them
    //http://backend.local/maintenance?id=6
    function index_get()
    {
        $key = $this->get('id');
        if (!$key) {
            $this->response($this->supplies->all(), 200);
        } else {
            $result = $this->supplies->get($key);
            if ($result != null)
                $this->response($result, 200);
            else
                $this->response(array('error' => 'Supplies item not found!'), 404);
        }
    }

    // Handle an incoming GET ... return 1 menu item
    //http://backend.local/maintenance/item/id/6
    function item_get()
    {
        $key = $this->get('id');
        $result = $this->supplies->get($key);
        if ($result != null)
            $this->response($result, 200);
        else
            $this->response(array('error' => 'Supplies item not found!'), 404);
    }

    // Handle an incoming POST - add a new menu item
    function index_post() {
        $this->crud_post($this->post());
    }

    // Handle an incoming POST - add a new menu item
    function item_post($key = null) {
        $record = json_decode($this->post(), true);

        if (($key == null) || ($key == 'id')) {
            $key = $this->get('id');
            $record = array_merge(array('id' => $key), $record);
        }
        $this->crud_post($record);
    }

    // Handle an incoming PUT - update a new menu item - ID in URL
    function item_put($key = null)
    {
        $incoming = key($this->put());
        // decode record before anything, as assoc array
        $record = json_decode($incoming,true);
        // item ID specified as segment or query parameter
        if (($key == null) || ($key == 'id'))
        {
            $key = $this->get('id');
            $record = array_merge(array('id' => $key), $record);
        }
        $this->crud_put($record);
    }

    // crud - update an item in our table
    private function crud_put($record = null)
    {
        $key = $record['id'];
        // Make sure the new record has an ID
        if (!isset($key))
        {
            $this->response(array('error' => 'Update: No item specified'), 406);
            return;
        }
        // make sure the item is real
        if (!$this->supplies->exists($key))
        {
            $this->response(array('error' => 'Update: Item ' . $key . ' not found'), 406);
            return;
        }
        // proceed with update
        $this->supplies->update($record);
        // check for DB errors
        $oops = $this->db->error();
        if (empty($oops['code']))
            $this->response(array('ok'), 200);
        else
            $this->response($oops, 400);
    }

    // crud - add an item in our table
    private function crud_post($record = null) {
        $key = $record['id'];

        if (!isset($key)) {
            $this->response(array('error' => 'Create: No supply specified'), 406);
            return;
        }

        if ($this->supplies->exists($key)) {
            $this->response(array('error' => 'Create: Supply ' . $key . ' already exists'), 406);
            return;
        }

        $this->supplies->add($record);

        $oops = $this->db->error();
        if (empty($oops['code']))
            $this->response(array('ok'), 200);
        else
            $this->response($oops, 400);
    }

    // Handle an incoming DELETE - delete a menu item
    function item_delete()
    {
        $key = $this->get('id');
        $this->supplies->delete($key);
        $this->response(array('ok'), 200);
    }
}