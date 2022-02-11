<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Backpack\CRUD\app\Http\Controllers\CrudController;

class CardController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;

    public function setup() 
    {
        $this->crud->setModel("App\Models\backpackCard");
        $this->crud->setRoute("admin/card");
        $this->crud->setEntityNameStrings('card', 'cards');
    }
    protected function setupListOperation()
    {
        $this->crud->setFromDb();
        $this->crud->setColumnDetails('card_status_id',[
            'label' => "Status",
            'type' => "select_from_array",
            'name' => 'card_status_id',
            'options' => [1 => '<span class="badge badge-success">Not Used</span>', 2 => '<span class="badge badge-secondary">Used</span>'],
            'escaped'=> false
        ]);
        
        $this->crud->setColumnDetails('category_id',[
            'label' => "Category", // Table column heading
            'type' => "relationship",
            'name' => 'category_id', // the column that contains the ID of that connected entity;
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => 'App\Models\category' // foreign key model
        ]);
        
        $this->crud->setColumnDetails('client_id',[
            'label' => "Client", // Table column heading
            'type' => "relationship",
            'name' => 'client_id', // the column that contains the ID of that connected entity;
            'entity' => 'client', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => 'App\Models\client' // foreign key model
        ]);

        $this->crud->setColumnDetails('pdf_path',[
            'label' => "PDF Path", // Table column heading
            'type' => "image",
            'name' => 'pdf_path', 
        ]);
    }
}
