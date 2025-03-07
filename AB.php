<?php
class AB {
    //adattagok
    private $host = "localhost";
    private $felhasznalo = "root";
    private $jelszo = "";
    private $abNev = "magyarkartya";
    private $kapcsolat;

    //konstruktor
    public function __construct()
    {
        //létrehozzuk a kapcsolatot
        $this->kapcsolat =  new mysqli($this->host, $this->felhasznalo, $this->jelszo, $this->abNev);

        if ($this->kapcsolat->connect_error) {
            echo "<p>Sikertelen kapcsolódás!</p>";
        }
        else {
            echo "<p>Sikeres kapcsolódás</p>";
        }
    }

    //tagfüggvények
    public function bezar() {
        $this-> kapcsolat->close();
    }

    public function meret($tabla) {
        $sql = "SELECT * FROM $tabla";
        return $this->kapcsolat->query($sql)->num_rows;
    }

    public function feltoltes($tabla, $mezo1, $mezo2) {
        $szinekSzama = $this->meret("szin");
        $formakSzama = $this->meret("forma");
        for ($i=1; $i <= $szinekSzama; $i++) { 
           for ($j=1; $j <= $formakSzama; $j++) { 
                $sql = "INSERT INTO $tabla($mezo1, $mezo2) VALUES ('$i','$j')";
                $siker = $this->kapcsolat->query($sql);
                echo $siker?"siker":"nem siker";
           }
        }
    }

    public function oszlopLeker($oszlop1, $tabla) {
        $sql = "SELECT $oszlop1 FROM $tabla";
        //matrix az eredmeny
        return $this->kapcsolat->query($sql);
    }

    public function megjelenit() {
        $matrix = $this->oszlopLeker("kep", "szin");
    }




}
?>