<?php
    class Station {
        // Referencia a la base de datos
        private $db;

        // Constructor de la clase
        public function __construct() {
            $this->db = new Database;
        }

        // Función para regisrar una estación de radio en la base de datos
        public function saveStation($data) {
            $this->db->query('INSERT INTO Stations (username, subject, date, time, mountPoint) VALUES(:username, :subject, :date, :time, :mountPoint)');
        
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':subject', $data['subject']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);
            $this->db->bind(':mountPoint', $data['mountPoint']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Función para recuperar una estación dado su id
        public function getStationById($id) {
            $this->db->query("SELECT * FROM Stations WHERE stationID = :id");
      
            $this->db->bind(':id', $id);
            
            $row = $this->db->single();
      
            return $row;
        }

        // Función para editar una estación de radio
        public function updateStation($data) {
            $this->db->query('UPDATE Stations SET subject = :subject, date = :date, time = :time, mountPoint = :mountPoint WHERE stationID = :id');
        
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':subject', $data['subject']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);
            $this->db->bind(':mountPoint', $data['mountPoint']);
                
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        // Función para eliminar una estación de radio
        public function deleteStation($id) {
            $this->db->query('DELETE FROM Stations WHERE stationID = :id');
        
            $this->db->bind(':id', $id);
                
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // Función para recuperar todos las estaciones de radio en la base de datos
        public function getStations() {
            $this->db->query("SELECT * FROM Stations");
        
            $results = $this->db->resultset();
        
            return $results;
        }
    }
?>