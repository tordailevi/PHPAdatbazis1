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
        $this->kapcsolat->query("SET NAMES UTF8");
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

    public function megjelenit($matrix) {
        while ($row = $matrix->fetch_row()) {
            echo "<img src='$row[0]'>";
            //$matrix = $this->oszlopLeker("kep", "szin");
        }
        
    }

    public function nevLeker($nev, $szin){
        $sql = "SELECT $nev FROM $szin";
        return $this->kapcsolat->query($sql);
    }

    public function oszlopLeker2($oszlop1, $oszlop2, $tabla) {
        $sql = "SELECT $oszlop1,$oszlop2 FROM $tabla";
        $matrix = $this->kapcsolat->query($sql);
        return $matrix;
    }

    public function megjelenito2($matrix){
        echo"<table>
                <th>Név</th><th>Kép</th>";
        while ($sor = $matrix->fetch_row()) {
                echo "
                <tr>
                    <td>$sor[1]</td>
                    <td><img src='$sor[0]'></td>
                </tr>";  
        }
        echo "</table>";
    }


        public function modosit($tabla,$hol, $mit, $mire){
            "UPDATE $tabla, SET $hol = '$mire' WHERE 1";
        }








}
?>