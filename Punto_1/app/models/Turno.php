<?php

namespace App\Models;

use App\Core\Model;

class Turno extends Model
{
    protected $table = 'turnos';
    protected $path_image = 'app/images/';

    /**
     *  Get all appointments
     */
    public function get()
    {
        return $this->db->selectAll($this->table);
    }

    /**
     * Get appointments by id
     */
    public function get_by_id($id)
    {
        return $this->db->selectOne($this->table, "id_turno = $id");
    }

    /**
     * Insert a new appointment
     */
    public function insert(array $turno)
    {

        $this->db->insert($this->table, $turno);
    }

    /**
     * Save image
     */
    public function save_image($turno)
    {
        // Muevo el archivo        
        $formato_image = str_replace("image/", "", $turno['diagnostico']['type']);
        $file_name = str_replace(" ", "_", $turno['nombre']);
        
        $file_name_full = $file_name . "." . $formato_image;
        $target_path = $this->path_image . $file_name_full;
        
        if (!(move_uploaded_file($turno['diagnostico']['tmp_name'], $target_path))) {
            $message .= "Ha ocurrido un error, al movel el archivo de diagnostico... <br>";
        }

        return $file_name_full;
    }

    /**
     * Validate appointment data 
     */
    public function validar_datos($turno)
    {
        
        $booleano = true;
        $message = "";
        $show_image = "";

        // Validacion de Nombre
        if (empty($turno["nombre"])) {
            $message .= "El nombre es obligatorio... <br>";
            $booleano= false;
        }

        // Validacion del Email
        if (empty($turno["email"]) || (!filter_var($turno["email"], FILTER_VALIDATE_EMAIL))) {
            $message .= "El email es obligatorio o el formato no es valido... <br>";
            $booleano= false;
        }

        // Validacion del Telefono
        if (empty($turno["telefono"])) {
            $message .= "El numero de telefono es obligatorio... <br>";
            $booleano= false;
        }

        // Validacion de la Edad
        if ((!filter_var($turno["edad"], FILTER_VALIDATE_INT)) || ($turno["edad"]<1 || $turno["edad"]>131)) {
            $message .= "El formato de la edad no es valido... <br>";
            $booleano= false;
        }

        // Validacion de la talla del calzado
        if (($turno["talla_calzado"]>45 || $turno["talla_calzado"]<20) || (!filter_var($turno["talla_calzado"], FILTER_VALIDATE_INT))) {
            $message .= "El formato de la talla del calzado no es valido... <br>";
            $booleano= false;
        }

        // Validacion de la altura
        if ($turno["altura"]>2.00 || $turno["altura"]<0.00) {
            $message .= "El formato de la altura no es valido... <br>";
            $booleano= false;
        }

        // Validacion del color de pelo
        if ($turno["color_pelo"] != "negro" && $turno["color_pelo"] != "rubio" && $turno["color_pelo"] != "castanio" && $turno["color_pelo"] != "pelirrojo") {
            $message .= "El color de pelo ingresado no se corresponde con los colores validos... <br>";
            $booleano= false;
        }

        // Validacion de la fecha del turno
        if (empty($turno["fecha_turno"])) {
            $message .= "La fecha_turno es obligatorio... <br>";
            $booleano= false;
        }

        // Validacion del horario del turno
        if (empty($turno["hora_turno"])) {
            $message .= "El horario del turno es obligatorio... <br>";
            $booleano= false;
        }

        // Validacion del Archivo
        if (!$turno['diagnostico']['name'] == "") {
        
            // Valido el formato
            if (!($turno['diagnostico']['type'] == "image/jpeg" || $turno['diagnostico']['type'] == "image/png")) {
                $message .= " El formato del archivo no es valido. Debe ser JPG o PNG... <br>";
                $booleano= false;
            }
        }
        
        // Todos los campos son correctos
        if ($booleano) {
            $message .= "==================================================================<br>";
            $message .= "SE REGISTRO EL TURNO CORRECTAMENTE <br>";
            $message .= "==================================================================<br>";
            $message .= "Nombre del Paciente: " .$turno['nombre']. "<br>";
            $message .= "Email: " .$turno['email']. "<br>";
            $message .= "Telefono: " .$turno['telefono']. "<br>";
            $message .= "Fecha nacimiento: " .$turno['fecha_nacimiento']. "<br>";
            $message .= "==================================================================<br>";
            $message .= "Fecha del turno: " .$turno['fecha_turno']. "<br>";
            $message .= "Horario del turno: " . $turno['hora_turno']. "<br>";
            $message .= "==================================================================<br>";
                        
        } else {
            $message .= "NO SE REGISTRO EL TURNO <br>";
        }
        return $message;
    }
}
