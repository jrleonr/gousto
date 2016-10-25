<?php

namespace App;

use Maatwebsite\Excel\Files\ExcelFile;

class RecipesImport extends ExcelFile {

    protected $delimiter  = ',';
    protected $enclosure  = '';
    protected $lineEnding = '\n';

    public function getFile()
    {
        return storage_path('app') . '/public/data.csv';
    }

    public function getFilters()
    {
        return [
            'chunk'
        ];
    }

}
