<?php
    class Usuario {
        private $id;
        private $nombre;
        private $apellido;
        private $rol;
        private $nombreUsuario;
        private $contrasenia;

        public function __construct() {
            $this->id = "";
            $this->nombre = "";
            $this->apellido = "";
            $this->rol = "";
            $this->nombreUsuario = "";
            $this->contrasenia = "";
        }

        // public function __construct($nuevoID, $nuevoNombre, $nuevoApellido, $nuevoRol, $nuevoUsuario, $nuevaContrasenia) {
        //     $this->id = $nuevoID;
        //     $this->nombre = $nuevoNombre;
        //     $this->apellido = $nuevoApellido;
        //     $this->rol = $nuevoRol;
        //     $this->nombreUsuario = $nuevoUsuario;
        //     $this->contrasenia = $nuevaContrasenia;
        // }

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

        // Corroboro que los datos ingresados cumplan las especificaciones:
            // - Usuario caracteres alfanuméricos únicamente y 6 o más carácteres.
            // - Contraseña 6 o más carácteres
        public function validarDatos($usuario, $contrasenia) {
            return (strlen($usuario) >= 6) && (ctype_alnum($usuario)) && (strlen($contrasenia) >= 6);
        }

        public function autenticar($usuario, $contrasenia, $link) {
            $consulta="SELECT * FROM usuarios where nombreusuario = '$usuario' "; 
            $resultado=mysqli_query($link,$consulta); // Realizo consulta para buscar si el usuario existe en la tabla
            $row = mysqli_fetch_array ($resultado);  // Guardo en resultados en array
            $filas = mysqli_num_rows($resultado); // Guardo la cantidad de filas que dieron como resultado
    
            // Como el usuario no se puede repetir la cantidad de resultados debería ser 1 o 0
            // Si hay filas y la contaseña ingresada coincide con la que arrojó la consulta
            if ($filas && $contrasenia == $row['clave']) {
                $this->id = $row['id'];
                $this->nombre = $row['nombre'];
                $this->apellido = $row['apellido'];
                $this->rol = $row['rol'];
                $this->nombreUsuario = $row['nombreusuario'];
                $this->contrasenia = $row['clave'];
                mysqli_free_result($resultado);
                return true;
            } else {
                return false;
            }
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