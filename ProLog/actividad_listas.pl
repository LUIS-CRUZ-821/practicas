% --- Código Base ---
perros(pastor_aleman, [juli, esteban, pancho]).
perros(san_bernardo, [master, rigan, mujamad]).
perros(french_poodle, [figaro, piojo, ramiro]).

% --- PASO 1: Tus 3 nuevas razas ---
perros(chihuahua, [tito, chiquis, mimi]).
perros(husky, [balto, luna, max]).
perros(pug, [paco, lola, canela]).
% --- Reglas Base de Pertenencia ---

pertenece(E,L):-L=[E|_].
pertenece(E,[_|T]):-pertenece(E,T).

% --- PASO 2: Reglas por cada raza ---
pastor_aleman(P):-perros(pastor_aleman, L), pertenece(P,L).
san_bernardo(P):-perros(san_bernardo, L), pertenece(P,L).
french_poodle(P):-perros(french_poodle, L), pertenece(P,L).
chihuahua(P):-perros(chihuahua, L), pertenece(P,L).
husky(P):-perros(husky, L), pertenece(P,L).
pug(P):-perros(pug, L), pertenece(P,L).

% --- PASO 3: Regla para consultar solo las razas ---
obtener_raza(Raza) :- perros(Raza, _).