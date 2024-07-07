<?php

namespace App\Controllers;

use App\Models\Search;

class SearchController
{

    private $model;

    public function __construct(Search $model)
    {
        $this->model = $model;
    }


    public function showPesquisar()
    {
        require __DIR__ . '/../Views/Search/pesquisar.php';
    }

    public function getAccounts()
    {
        return $result = $this->model->getAccounts();
    }

    public function getPesquisarBySearch($searchBar)
    {
        return $result = $this->model->getPesquisarBySearch($searchBar);
    }

}