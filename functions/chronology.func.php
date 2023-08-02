<?php

function get_posts(){

    global $db;

    $req = $db->query("SELECT * FROM chronology");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;


}