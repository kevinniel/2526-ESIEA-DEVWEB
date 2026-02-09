<?php

class FormService {

    public $title;
    public $genre;
    public $annee;

    function __construct($toto)
    {
        $this->title = $toto["titre"];
        $this->genre = $toto["genre"];
        $this->annee = $toto["year"];
    }


    public function set_new_row()
    {
        return [
            "nom" => $this->title,
            "genre" => $this->genre,
            "annee" => $this->annee,
        ];
    }

}