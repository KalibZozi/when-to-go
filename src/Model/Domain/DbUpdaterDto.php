<?php


namespace App\Model\Domain;


class DbUpdaterDto
{
    public $TableEntity = null;
    public $tableNewData = [];
    public $fileName = null;

    /**
     * DbUpdaterDto constructor.
     * @param null $TableEntity
     * @param array $tableNewData
     * @param null $fileName
     */
    public function __construct($TableEntity, array $tableNewData, $fileName)
    {
        $this->TableEntity = $TableEntity;
        $this->tableNewData = $tableNewData;
        $this->fileName = $fileName;
    }


}