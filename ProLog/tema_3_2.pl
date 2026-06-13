% Hechos: votos(Partido, Casilla, Cantidad)
% Casilla 1
votos(prv, 1, 113).
votos(plh, 1, 88).
votos(pmm, 1, 112).

% Casilla 2
votos(prv, 2, 99).
votos(plh, 2, 112).
votos(pmm, 2, 100).

% Casilla 3
votos(prv, 3, 245).
votos(plh, 3, 210).
votos(pmm, 3, 245).

% Regla auxiliar para calcular el total de votos acumulados por partido
total_votos_partido(Partido, Total) :-
    votos(Partido, 1, V1),
    votos(Partido, 2, V2),
    votos(Partido, 3, V3),
    Total is V1 + V2 + V3.

mayor_votos(Partido) :-
    total_votos_partido(Partido, Total),
    \+ (total_votos_partido(_, OtroTotal), OtroTotal > Total).

resultados(Mayor, Medio, Menor) :-
    total_votos_partido(Mayor, TMax),
    total_votos_partido(Medio, TMed),
    total_votos_partido(Menor, TMin),
    Mayor \= Medio, Medio \= Menor, Mayor \= Menor,
    TMax >= TMed,
    TMed >= TMin.

