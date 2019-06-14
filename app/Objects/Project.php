<?php

namespace app\Objects;

class Project{

    private $projectID;
    private $projectName;
    
    function __construct(int $projectID, string $projectName){
        $this->projectID = $projectID;
        $this->projectName = $projectName;
    }

    function getID(){
        return $this->projectID;
    }

    function getProjectName(){
        return $this->projectName;
    }

    function setProjectName(string $projectName){
        $this->projectName = $projectName;
    }
    
    function setID(string $projectID){
        $this->projectID = $projectID;
    }
    
    function toProjectArray(){
        return
        [
            'projectID' => $this->projectID,
            'projectName' => $this->projectName
        ];
    }

}