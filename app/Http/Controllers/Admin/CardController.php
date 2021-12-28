<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\Admin\client\{CategoryRequest,CategoryUpdateRequest};

class CardController extends Controller
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup() 
    {
        $this->crud->setModel("App\Models\card");
        $this->crud->setRoute("admin/card");
        $this->crud->setEntityNameStrings('card', 'cards');
    }
    protected function setupListOperation()
    {
        $this->crud->setFromDb();
    }
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CategoryRequest::class);
        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Name']);
        $this->crud->addField(['name' => 'value', 'type' => 'number', 'label' => 'Value']);
    }
    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(CategoryUpdateRequest::class);
        $this->crud->addField(['name' => 'value', 'type' => 'number', 'label' => 'Value']);
    }
}
