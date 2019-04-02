<?php


namespace App\Model\Domain;


class DbUpdaterDto
{
    public $TableEntity = null;
    public $fileName = null;

    /**
     * DbUpdaterDto constructor.
     * @param null $TableEntity
     * @param null $fileName
     */
    public function __construct($TableEntity, $fileName)
    {
        $this->TableEntity = $TableEntity;
        $this->fileName = $fileName;
    }


}