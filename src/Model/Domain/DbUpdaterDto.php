<?php


namespace App\Model\Domain;


class DbUpdaterDto
{
    public $TableEntity = null;
    public $TempTableEntity = null;
    public $tableNewData = [];
    public $fileName = null;

    /**
     * DbUpdaterDto constructor.
     * @param null $TableEntity
     * @param null $TempTableEntity
     * @param null $fileName
     */
    public function __construct($TableEntity, $TempTableEntity, $fileName)
    {
        $this->TableEntity = $TableEntity;
        $this->TempTableEntity = $TempTableEntity;
        $this->fileName = $fileName;
    }


}