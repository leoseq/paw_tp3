USE turnos_system;

CREATE TABLE turnos (
    id_turno INTEGER PRIMARY KEY AUTO_INCREMENT,
    nombre_paciente TEXT NOT NULL,
    email TEXT NOT NULL,
    telefono TEXT NOT NULL,
    edad TEXT,
    talla_calzado TEXT,
    altura TEXT,
    fecha_nacimiento DATE NOT NULL,
    color_pelo TEXT NOT NULL,
    fecha_turno DATE NOT NULL,
    hora_turno TIME NOT NULL,
    diagnostico TEXT DEFAULT NULL);
    