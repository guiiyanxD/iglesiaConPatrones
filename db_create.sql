-- ========================
-- Tabla: Cargo
-- ========================
CREATE TABLE Cargo (
    id INTEGER PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT
);

-- ========================
-- Tabla: Miembro
-- ========================
CREATE TABLE Miembro (
    id INTEGER  PRIMARY KEY,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    id_cargo INTEGER NOT NULL,
    FOREIGN KEY (id_cargo) REFERENCES Cargo(id)
);

-- ========================
-- Tabla: Ministerio
-- ========================
CREATE TABLE Ministerio (
    id INTEGER PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    mision TEXT,
    vision TEXT,
    fechaCreacion DATE,
    activo BOOLEAN DEFAULT TRUE
);

-- ========================
-- Relación Miembro ↔ Ministerio
-- Un miembro pertenece a un ministerio
-- ========================
ALTER TABLE Miembro
ADD COLUMN id_ministerio INTEGER,
ADD FOREIGN KEY (id_ministerio) REFERENCES Ministerio(id);

-- ========================
-- Tabla: TipoEvento
-- ========================
CREATE TABLE TipoEvento (
    id INTEGER PRIMARY KEY,
    nombres VARCHAR(100) NOT NULL,
    frecuencia VARCHAR(50),
    descripcion TEXT
);

-- ========================
-- Tabla: Evento
-- ========================
CREATE TABLE Evento (
    id INTEGER PRIMARY KEY,
    nombres VARCHAR(100) NOT NULL,
    fecha_inicio TIMESTAMP NOT NULL,
    ubicacion VARCHAR(200),
    descripcion TEXT,
    estado VARCHAR(50),
    id_tipo_evento INTEGER NOT NULL,
    id_ministerio INTEGER NOT NULL,
    FOREIGN KEY (id_tipo_evento) REFERENCES TipoEvento(id),
    FOREIGN KEY (id_ministerio) REFERENCES Ministerio(id)
);

-- ========================
-- Tabla: Asistencia
-- ========================
CREATE TABLE Asistencia (
    id INTEGER PRIMARY KEY,
    id_miembro INTEGER NOT NULL,
    id_evento INTEGER NOT NULL,
    fecha_asistencia TIMESTAMP NOT NULL,
    FOREIGN KEY (id_miembro) REFERENCES Miembro(id),
    FOREIGN KEY (id_evento) REFERENCES Evento(id),
    UNIQUE (id_miembro, id_evento) -- evita duplicidad de asistencias
);
