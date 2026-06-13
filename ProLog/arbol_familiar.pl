% =================================================================
% 1. HECHOS: Géneros
% =================================================================
hombre(pedro).
hombre(luis).
hombre(juan).
hombre(carlos).
hombre(jorge).
hombre(diego).
hombre(pablo).
hombre(mateo).

mujer(ana).
mujer(marta).
mujer(maria).
mujer(elena).
mujer(sofia).
mujer(lucia).
mujer(valeria).

% =================================================================
% 2. HECHOS: Descendencia (18 hechos en total)
% descendiente(X, Y) -> X es descendiente de Y (Y es padre/madre de X)
% =================================================================
% Hijos de Pedro y Ana
descendiente(juan, pedro).
descendiente(juan, ana).
descendiente(maria, pedro).
descendiente(maria, ana).
descendiente(carlos, pedro).
descendiente(carlos, ana).

% Hijos de Luis y Marta
descendiente(elena, luis).
descendiente(elena, marta).
descendiente(jorge, luis).
descendiente(jorge, marta).

% Hijos de Juan y Elena
descendiente(sofia, juan).
descendiente(sofia, elena).
descendiente(diego, juan).
descendiente(diego, elena).

% Hijos de María
descendiente(pablo, maria).
descendiente(lucia, maria).

% Hijo de Carlos
descendiente(mateo, carlos).

% Hija de Jorge
descendiente(valeria, jorge).


% =================================================================
% 3. REGLAS DE RELACIONES FAMILIARES
% =================================================================

% Y es padre o madre de X
padreomadre(Y, X) :- 
    descendiente(X, Y).

% Y es papá de X (padre de género hombre)
papa(Y, X) :- 
    padreomadre(Y, X), 
    hombre(Y).

% Y es mamá de X (madre de género mujer)
mama(Y, X) :- 
    padreomadre(Y, X), 
    mujer(Y).

% X es hijo de Y
hijo(X, Y) :- 
    descendiente(X, Y), 
    hombre(X).

% X es hija de Y
hija(X, Y) :- 
    descendiente(X, Y), 
    mujer(X).

% X es hermana de Y (mismo papá, X es mujer y X no es Y)
hermana(X, Y) :- 
    mujer(X), 
    papa(P, X), 
    papa(P, Y), 
    X \= Y.

% Y es abuelo/a de X
abuelos(Y, X) :- 
    padreomadre(Y, P), 
    padreomadre(P, X).

% Y es abuelo de X
abuelo(Y, X) :- 
    abuelos(Y, X), 
    hombre(Y).

% Y es abuela de X
abuela(Y, X) :- 
    abuelos(Y, X), 
    mujer(Y).

% X es nieto de Y
nieto(X, Y) :- 
    abuelos(Y, X), 
    hombre(X).

% X es nieta de Y
nieta(X, Y) :- 
    abuelos(Y, X), 
    mujer(X).

% Y es tio de X (Y es hermano del padre/madre P de X)
tio(Y, X) :- 
    hombre(Y), 
    padreomadre(P, X), 
    papa(G, Y), 
    papa(G, P), 
    Y \= P.

% Y es tia de X (Y es hermana del padre/madre P de X)
tia(Y, X) :- 
    mujer(Y), 
    padreomadre(P, X), 
    papa(G, Y), 
    papa(G, P), 
    Y \= P.

% X es primo de Y (El padre/madre de X y el padre/madre de Y son hermanos)
primo(X, Y) :- 
    hombre(X), 
    padreomadre(P1, X), 
    padreomadre(P2, Y), 
    papa(G, P1), 
    papa(G, P2), 
    P1 \= P2.

% X es prima de Y
prima(X, Y) :- 
    mujer(X), 
    padreomadre(P1, X), 
    padreomadre(P2, Y), 
    papa(G, P1), 
    papa(G, P2), 
    P1 \= P2.