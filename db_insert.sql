INSERT INTO Cargo (id, nombre, descripcion) VALUES
(1, 'Administrador General', 'Responsable de la gestión integral de la organización.'),
(2, 'Jefe de Recursos Humanos', 'Encargado de la administración del personal y relaciones laborales.'),
(3, 'Técnico de Mantenimiento', 'Realiza el mantenimiento preventivo y correctivo de equipos.'),
(4, 'Contador', 'Gestiona la contabilidad y reportes financieros de la empresa.'),
(5, 'Auxiliar Administrativo', 'Apoya en tareas administrativas y atención al cliente.');

-- ========================
-- Tabla: Ministerio
-- ========================
INSERT INTO Ministerio (id, nombre, mision, vision, fechaCreacion, activo) VALUES
(1, 'Ministerio de Jóvenes', 'Formar líderes jóvenes con valores cristianos.', 'Ser un referente de juventud comprometida con la fe.', '2023-01-15', TRUE),
(2, 'Ministerio de Música', 'Alabar y glorificar a Dios a través de la música.', 'Liderar la adoración en cada evento.', '2022-08-10', TRUE),
(3, 'Ministerio de Niños', 'Instruir a los niños en la palabra de Dios.', 'Formar niños que amen a Dios.', '2021-05-20', TRUE),
(4, 'Ministerio de Evangelismo', 'Expandir el mensaje del evangelio.', 'Alcanzar cada rincón con la palabra de Dios.', '2020-11-05', TRUE),
(5, 'Ministerio de Apoyo Social', 'Brindar ayuda a los más necesitados.', 'Ser luz en medio de la necesidad.', '2019-07-25', TRUE);

-- ========================
-- Tabla: Miembro
-- ========================
INSERT INTO Miembro (id, nombres, apellidos, email, pwd, id_cargo, id_ministerio) VALUES
(1, 'Ana', 'Gómez', 'ana.gomez@example.com', 'pwd123', 1, 1),
(2, 'Luis', 'Pérez', 'luis.perez@example.com', 'pwd456', 2, 2),
(3, 'Carla', 'Rodríguez', 'carla.rodriguez@example.com', 'pwd789', 3, 3),
(4, 'Jorge', 'Lopez', 'jorge.lopez@example.com', 'pwd321', 1, 1),
(5, 'Elena', 'Martínez', 'elena.martinez@example.com', 'pwd654', 2, 4);

-- ========================
-- Tabla: TipoEvento
-- ========================
INSERT INTO TipoEvento (id, nombres, frecuencia, descripcion) VALUES
(1, 'Culto de Jóvenes', 'Semanal', 'Reuniones semanales dirigidas a jóvenes.'),
(2, 'Concierto Cristiano', 'Mensual', 'Evento musical organizado por el ministerio de música.'),
(3, 'Escuela Dominical', 'Semanal', 'Clases para niños sobre la Biblia.'),
(4, 'Campaña de Evangelismo', 'Trimestral', 'Salidas misioneras de contacto y predicación.'),
(5, 'Entrega de Alimentos', 'Mensual', 'Actividad de ayuda social con distribución de alimentos.');

-- ========================
-- Tabla: Evento
-- ========================
INSERT INTO Evento (id, nombres, fecha_inicio, ubicacion, descripcion, estado, id_tipo_evento, id_ministerio) VALUES
(1, 'Reunión Juvenil #1', '2025-06-01 18:00:00', 'Auditorio Central', 'Primera reunión del mes.', 'Abierto', 1, 1),
(2, 'Concierto Alabanza Viva', '2025-06-05 19:30:00', 'Parque Principal', 'Evento evangelístico con música en vivo.', 'Abierto', 2, 2),
(3, 'Clase de Niños - Génesis', '2025-06-09 10:00:00', 'Sala Infantil', 'Clase temática sobre la creación.', 'Abierto', 3, 3),
(4, 'Campaña Evangelismo Urbano', '2025-06-10 15:00:00', 'Zona Norte', 'Predicación en calles y plazas.', 'Abierto', 4, 4),
(5, 'Donación Familiar', '2025-06-15 09:00:00', 'Comedor Social', 'Distribución de alimentos y ropa.', 'Abierto', 5, 5);

-- ========================
-- Tabla: Asistencia
-- ========================
INSERT INTO Asistencia (id, id_miembro, id_evento, fecha_asistencia) VALUES
(1, 1, 1, '2025-06-01 18:00:00'),
(2, 2, 2, '2025-06-05 19:30:00'),
(3, 3, 3, '2025-06-09 10:00:00'),
(4, 4, 1, '2025-06-01 18:00:00'),
(5, 5, 4, '2025-06-10 15:00:00');
