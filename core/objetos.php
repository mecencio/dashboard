<?php
    class Usuario {
        private $id;
        private $nombre;
        private $apellido;
        private $rol;
        private $nombreUsuario;
        private $contrasenia;

        public function __construct($nuevoID, $nuevoNombre, $nuevoApellido, $nuevoRol, $nuevoUsuario, $nuevaContrasenia) {
            $this->id = $nuevoID;
            $this->nombre = $nuevoNombre;
            $this->apellido = $nuevoApellido;
            $this->rol = $nuevoRol;
            $this->nombreUsuario = $nuevoUsuario;
            $this->contrasenia = $nuevaContrasenia;
        }

        public function getId() {
            return $this->id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getApellido() {
            return $this->apellido;
        }

        public function getRol() {
            return $this->rol;
        }

        public function getUsuario() {
            return $this->nombreUsuario;
        }

        public function getContrasenia() {
            return $this->contrasenia;
        }

        public function verificarRol(){
            switch ($this->rol) {
                case 'COCINERO':
                    header('Location: '. direccionBase .'pages/cocina.php');
                    break;
                case 'MOZO':
                    header('Location: '. direccionBase);
                    break;
                case 'CAJERO':
                    header('Location: '. direccionBase .'pages/caja.php');
                    break;
                case 'BARTENDER':
                    header('Location: '. direccionBase .'pages/bar.php');
                    break;
                default:
                    header('Location: '. direccionBase .'pages/login.php');
                    break;
            };
        }
    }
?>