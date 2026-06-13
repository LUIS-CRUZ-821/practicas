% Hechos: calificacion(Alumno, Calificacion)
calificacion(carmen, 95).
calificacion(juan, 80).
calificacion(sonia, 45).
calificacion(mario, 75).
calificacion(daniela, 89).
calificacion(morgana, 100).
calificacion(wili, 79).
calificacion(doroteo, 95).
calificacion(paola, 57).
calificacion(rodolfo, 86).

mayor_calificacion(Alumno) :-
    calificacion(Alumno, C),
    \+ (calificacion(_, OtraC), OtraC > C).

menor_calificacion(Alumno) :-
    calificacion(Alumno, C),
    \+ (calificacion(_, OtraC), OtraC < C).

% Reglas base para evaluar individualmente (Base de aprobación: 60)
es_aprobado(Alumno) :- calificacion(Alumno, C), C >= 60.
es_reprobado(Alumno) :- calificacion(Alumno, C), C < 60.

% Reglas para generar las listas completas utilizando findall
lista_aprobados(Lista) :-
    findall(Alumno, es_aprobado(Alumno), Lista).

lista_reprobados(Lista) :-
    findall(Alumno, es_reprobado(Alumno), Lista).