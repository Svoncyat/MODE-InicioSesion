<?php
class cadenaConexionBD
{
    static function ConexionBD()
    {
        $host = 'JSTEVEN';
        $dbname = 'InioSesion';
        $username = 'sa';
        $password = 5284;

        try {
            $ccon = new PDO("sqlsrv:Server=$host; Database=$dbname", $username, $password);
            return $ccon;
        } catch (PDOException $exp) {
            error_log("No se logro conectar a: $dbname DB - ERROR: $exp -");
            return null;
        }
    }
}

class logicaLogeo
{
    private $ccon;
    private $user;
    private $password;

    function __construct($ccon, $user, $password)
    {
        $this->ccon = $ccon;
        $this->user = $user;
        $this->password = $password;
    }

    function inicioSesion()
    {
        $query = $this->ccon->prepare("SELECT * FROM Usuarios WHERE usuario = :parametro_uno AND contrasena = :parametro_dos");
        $query->bindValue(":parametro_uno", $this->user);
        $query->bindValue(":parametro_dos", $this->password);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
?>
