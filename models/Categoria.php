<?php
    class Categoria extends Conectar{
        public function get_categoria(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_categoria WHERE est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            //Para evitar que nos devuelva datos duplicados o erroneos colocamos lo que pusimos dentro del catch
        }

        public function get_categoria_x_id($cat_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_categoria WHERE est=1 AND cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_categoria($cat_nom,$cat_obs){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_categoria (cat_id, cat_nom, cat_obs, est) VALUES (NULL, ?, ?, 1)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_obs);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>