<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Turno;

class TurnosController extends Controller
{
    public function __construct()
    {
        $this->model = new Turno();
    }

    /**
     * Show all appointments
     */
    public function index()
    {
        $turnos = $this->model->get();
        return view('turnos', compact('turnos'));
    }

    /**
     * Show appointments new create 
     */
    public function create()
    {
        return view('turnos.create');
    }

    /**
     * Save appointments in Turnos table
     */
    public function save()
    {
        $turno = [
            'nombre' => $_POST["nombre"],
            'email' => $_POST["email"],
            'telefono' => $_POST["telefono"],
            'edad' => $_POST["edad"],
            'talla_calzado' => $_POST["talla_calzado"],
            'altura' => $_POST["altura"],
            'fecha_nacimiento' => $_POST["fecha_nacimiento"],
            'color_pelo' => $_POST["color_pelo"],
            'fecha_turno' => $_POST["fecha_turno"],
            'hora_turno' => $_POST["hora_turno"],
            'diagnostico' => $_FILES["diagnostico"]
        ];

        $this->model->validar_datos($turno);
        $name_file = $this->model->save_image($turno);

        $turno['diagnostico'] = $name_file;

        $this->model->insert($turno);
        return redirect('turnos');
    }

    /**
     * Show appointment info
     */
    public function ficha()
    {
        $id = $_GET['id_turno'];
        $turno = $this->model->get_by_id($id);
        return view('turnos.ficha', compact('turno'));
    }

}
