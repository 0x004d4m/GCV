<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\Admin\client\{ClientRequest,ClientUpdateRequest};

class ClientController extends CrudController 
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup() 
    {
        $this->crud->setModel("App\Models\client");
        $this->crud->setRoute("admin/client");
        $this->crud->setEntityNameStrings('client', 'clients');
    }
    protected function setupListOperation()
    {
        $this->crud->setFromDb();
    }
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientRequest::class);
        $this->crud->addField(['name' => 'phone', 'type' => 'text', 'label' => 'Phone Number']);
        $this->crud->addField(['name' => 'email', 'type' => 'email', 'label' => 'Email']);
        $this->crud->addField(['name' => 'username', 'type' => 'text', 'label' => 'Username']);
        $this->crud->addField(['name' => 'password', 'type' => 'password', 'label' => 'Password']);
        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Name']);
    }
    protected function setupUpdateOperation()
    {
        //$this->setupCreateOperation();

        $this->crud->setValidation(ClientUpdateRequest::class);
        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Name']);
    }
}
