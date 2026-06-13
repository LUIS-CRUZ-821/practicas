% =================================================================
% HECHOS: cursa(Alumno, Materia, Calificacion)
% =================================================================

% Calculo 1
cursa(juan, calculo1, 80).
cursa(carlos, calculo1, 50).
cursa(pedro, calculo1, 80).
cursa(mario, calculo1, 79).
cursa(joaquin, calculo1, 89).

% Prolog
cursa(martina, prolog, 65).
cursa(daniel, prolog, 96).
cursa(pedro, prolog, 80).
cursa(mario, prolog, 83).
cursa(sotero, prolog, 81).

% POO (Programación Orientada a Objetos)
cursa(dalia, poo, 70).
cursa(alin, poo, 84).
cursa(pedro, poo, 53).
cursa(doroteo, poo, 90).
cursa(joaquin, poo, 89).
cursa(loto, poo, 90).

% Inglés
cursa(juan, ingles, 95).
cursa(sabina, ingles, 96).
cursa(pedro, ingles, 32).
cursa(mariela, ingles, 69).
cursa(jordan, ingles, 56).


% =================================================================
% REGLAS AUXILIARES (Para facilitar las consultas C, D y E)
% =================================================================

% Regla para obtener la lista de alumnos sin duplicados
lista_alumnos_unica(ListaUnica) :-
    findall(Alumno, cursa(Alumno, _, _), ListaCompleta),
    list_to_set(ListaCompleta, ListaUnica). % list_to_set elimina duplicados de forma nativa

% Regla para calcular el promedio de una materia
promedio_materia(Materia, Promedio) :-
    % 1. Juntamos todas las materias que existen en los hechos
    findall(M, cursa(_, M, _), ListaTodasMaterias),
    % 2. Eliminamos los duplicados para tener [calculo1, prolog, poo, ingles]
    list_to_set(ListaTodasMaterias, MateriasUnicas),
    % 3. member/2 va seleccionando una materia a la vez de la lista
    member(Materia, MateriasUnicas),
    % 4. Ahora que 'Materia' ya está fija (ej: calculo1), findall solo recolecta sus notas
    findall(Calificacion, cursa(_, Materia, Calificacion), ListaCalificaciones),
    sum_list(ListaCalificaciones, Suma),
    length(ListaCalificaciones, TotalAlumnos),
    TotalAlumnos > 0,
    Promedio is Suma / TotalAlumnos.