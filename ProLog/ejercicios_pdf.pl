% Ejercicio 1.1: Primero
primero([X|_], X).

% 1.2. Resto de una lista
resto([_|L2], L2).

% 1.3. Construcción de listas
cons(X, L1, [X|L1]).

% 1.4. Pertenencia a una lista
pertenece(X, [X|_]).
pertenece(X, [_|Cola]) :- pertenece(X, Cola).

% 1.5. Concatenación de listas
conc([], L2, L2).
conc([X|L1], L2, [X|L3]) :- conc(L1, L2, L3).

% 1.6. Inversa de una lista
inversa([], []).
inversa([X|Cola], L2) :- inversa(Cola, ColaInvertida), conc(ColaInvertida, [X], L2).

% 1.7. Palíndromo
palindromo(L) :- inversa(L, L).

% 1.8. Último elemento de una lista
ultimo(X, [X]).
ultimo(X, [_|Cola]) :- ultimo(X, Cola).

% 1.9. Penúltimo elemento de una lista
penultimo(X, [X, _]).
penultimo(X, [_|Cola]) :- penultimo(X, Cola).

% 1.10. Selección de un elemento
selecciona(X, [X|Cola], Cola).
selecciona(X, [Y|Cola1], [Y|Cola2]) :- selecciona(X, Cola1, Cola2).

% 1.11. Inserción de un elemento en una lista
inserta(X, L1, [X|L1]).
inserta(X, [Y|Cola1], [Y|Cola2]) :- inserta(X, Cola1, Cola2).

% 1.12. Sublista de otra lista
sublista(L1, L2) :- conc(_, Resto, L2), conc(L1, _, Resto).

% 1.13. Permutación de una lista
permutacion([], []).
permutacion(L1, [X|L2]) :- selecciona(X, L1, Resto), permutacion(Resto, L2).

% 1.14. Todos los elementos iguales
todos_iguales([]).
todos_iguales([_]).
todos_iguales([X,X|Cola]) :- todos_iguales([X|Cola]).

% 1.15. Longitud de la lista es par
longitud_par([]).
longitud_par([_, _|Cola]) :- longitud_par(Cola).

% 1.16. Rotación de un elemento al final
rota([X|Cola], L2) :- conc(Cola, [X], L2).

% =================================================================
% Ejercicio 1.17: Subconjunto de otra lista
% subconjunto(+ListaGrande, ?Subconjunto)
% =================================================================

% Caso base: El subconjunto de una lista vacía es otra lista vacía.
subconjunto([], []).

% Caso 1 (Inclusión): El elemento X se incluye en el subconjunto.
subconjunto([X|Cola], [X|Sub]) :- 
    subconjunto(Cola, Sub).

% Caso 2 (Exclusión): El elemento del conjunto grande se ignora (no entra en el subconjunto).
subconjunto([_|Cola], Sub) :- 
    subconjunto(Cola, Sub).