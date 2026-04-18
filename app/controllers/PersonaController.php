<?php

require_once __DIR__ . '/../models/Persona.php';

class PersonaController {
    private $model;

    public function __construct($db) {
        $this->model = new Persona($db);
    }

    // Mostrar todas las personas
    public function index() {
        $personas = $this->model->read();
        require __DIR__ . '/../views/persona/index.php';
    }

    // Mostrar formulario (opcional si lo separas)
    public function crear() {
        require __DIR__ . '/../views/persona/crear.php';
    }

    // Guardar nueva persona
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->nombre = $_POST['nombre'] ?? '';
            $this->model->apellido = $_POST['apellido'] ?? '';

            if ($this->model->create()) {
                header("Location: /persona");
                exit();
            } else {
                echo "Error al guardar";
            }
        }
    }

    // Editar persona (mostrar datos)
    public function editar($id) {
        $this->model->id = $id;
        $persona = $this->model->readOne();

        require __DIR__ . '/../views/persona/editar.php';
    }

    // Actualizar persona
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id = $_POST['id'];
            $this->model->nombre = $_POST['nombre'];
            $this->model->apellido = $_POST['apellido'];

            if ($this->model->update()) {
                header("Location: /persona");
                exit();
            } else {
                echo "Error al actualizar";
            }
        }
    }

    // Eliminar persona
    public function eliminar($id) {
        $this->model->id = $id;

        if ($this->model->delete()) {
            header("Location: /persona");
            exit();
        } else {
            echo "Error al eliminar";
        }
    }
}
