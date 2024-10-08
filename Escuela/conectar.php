<?php
    class OperacionesBd{
        private $servidor="b0kl9kqpu46hx0w4u5xx-mysql.services.clever-cloud.com";// Aqui se especifica el servidor en el que esta almacenda la base de datos
        private $usuario="u3lurhkt11zbcbie";//Es el administrador con mas privilegios en servidor
        private $bd="b0kl9kqpu46hx0w4u5xx";//Es el nombre de la base de datos
        private $password="VHWkyz2YG7ehVx4juroY";
    
        public function conexion(){
            //Con iesta instruccion establecemos la conexion con la base de datos prevaimente establacida
            $conexion=mysqli_connect($this-> servidor,
                                    $this-> usuario,
                                    $this-> password,
                                    $this-> bd);
            return $conexion;
        }
        public function guardardatos($sql){
            $obj=new OperacionesBd;
            $conexion=$obj->conexion();
            mysqli_query($conexion,$sql);
            //Dentro de este bloque toma una consulta SQL como parámetro, establece una conexión a la base de datos utilizando un objeto de la clase OperacionesBd, y luego ejecuta la consulta SQL en esa conexión.
        }
        public function mostrardatos() {
                // Establece la conexión a la base de datos
            $conexion = $this->conexion();
            // Define la consulta SQL para seleccionar datos de la tabla 'alumnos'
            $sql = "SELECT id_alumno, numero_control ,nombre, ap, am, especialidad, semestre, turno, sexo FROM alumnos";
            
            // Ejecuta la consulta y almacena el resultado
            $result = mysqli_query($conexion, $sql);
            // Retorna el resultado de la consulta
            return $result;
        }
        public function eliminarRegistro($id_alumno) {
            // Retorna el resultado de la consulta
            $conn = $this->conexion();
            // Define la consulta SQL para eliminar un registro específico de la tabla 'alumnos'
            $sql = "DELETE FROM alumnos WHERE id_alumno = ?";
            // Define la consulta SQL para eliminar un registro específico de la tabla 'alumnos'
            $stmt = $conn->prepare($sql);
            // Vincula el parámetro $id_alumno a la consulta preparada
            $stmt->bind_param("i", $id_alumno);
            // Ejecuta la consulta
            $stmt->execute();
            // Cierra la declaración preparada
            $stmt->close();
            // Cierra la conexión a la base de datos
            $conn->close();
        }
        public function actualizar_datos($id, $numero_control, $nombre, $ap, $am, $especialidad, $semestre, $turno, $sexo) {
            // Establece la conexión a la base de datos
            $conn = $this->conexion();
            // Define la consulta SQL para actualizar un registro específico en la tabla 'alumnos'
            $sql = "UPDATE alumnos SET numero_control=?, nombre=?, ap=?, am=?, especialidad=?, semestre=?, turno=?, sexo=? WHERE id_alumno=?";
            // Prepara la consulta SQL
            $stmt = $conn->prepare($sql);
            // Vincula los parámetros a la consulta preparada
            $stmt->bind_param("issssissi", $numero_control, $nombre, $ap, $am, $especialidad, $semestre, $turno, $sexo, $id);
            // Ejecuta la consulta
            $stmt->execute();
            // Cierra la declaración preparada
            $stmt->close();
            // Cierra la declaración preparada
            $conn->close();
        }
    }