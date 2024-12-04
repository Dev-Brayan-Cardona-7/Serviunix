----------listado de empleados del departamento TI-----------
SELECT E.nombres, E.apellidos, E.edad, E.fecha_ingreso, E.comentarios, D.nombre_departamento
FROM Empleados E
JOIN Departamento D ON E.departamento_id = D.id
WHERE D.nombre_departamento = 'TI';

-----------------DEPARTAMENTO CON MAS GASTOS----------------
SELECT D.nombre_departamento, SUM(G.gastos) AS total_gastos
FROM Gastos G
JOIN Departamento D ON G.departamento_id = D.id
GROUP BY G.departamento_id
ORDER BY total_gastos DESC
LIMIT 3;

-- empleado con mayor salario:
SELECT nombres, apellidos, salario
FROM Empleados
ORDER BY salario DESC
LIMIT 1;
