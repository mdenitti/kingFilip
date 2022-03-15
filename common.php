<?php
class DB {
    private $host = 'localhost';
    private $user = 'root';
    private $password ='welcome123';
    private $database = 'filip';

    public function connect() {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        return $conn;
    }
}

class Addguest {

    // declare a public property for usage outside our class on
    // an instantiated object of Addguest
    public $lastid;

    public function __construct($firstName, $lastName,$bDate) {
        // retrieve te values, but also insert them in the database
        // i need a DB class!
        $db = new DB();
        $dbconnection = $db->connect();

        // Get our query in order
        $query = "INSERT INTO `kandidates` (`firstName`, `lastName`, `bDate`) VALUES ('$firstName', '$lastName', '$bDate');";

        // execute query
        $dbconnection->query($query);

        // fetch the last id of our previous query
        $this->lastid = $dbconnection->insert_id;

        // saves resources by closing the mysql connection
        $dbconnection->close();
    }
}

class Imagetools {

    public function imgConvertPDF($image) {
        $type = pathinfo($image, PATHINFO_EXTENSION);
        //get the file contents, en push the strange chars into $data
        $data = file_get_contents($image);
        // concatentate all the pieces and rest in awe
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    public function qrCodeMake($id) {
        // ID must be encrypted later...
        $url = "https://chart.googleapis.com/chart?cht=qr&choe=UTF-8&chs=250x250&chl=onsdomein.be?id=".$id;
        $qrCode = file_get_contents($url);
        return 'data:image/png;base64,'. base64_encode($qrCode);
    }
}