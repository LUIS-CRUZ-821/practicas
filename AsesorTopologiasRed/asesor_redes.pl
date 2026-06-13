% =========================================================
% HECHOS: topologia(Nombre, LimiteEquipos, Costo, ToleranciaFallas).
% Costo: bajo, medio, alto. Tolerancia: baja, media, alta.
% =========================================================
topologia(bus, 10, bajo, baja).
topologia(estrella, 50, medio, media).
topologia(anillo, 20, medio, baja).
topologia(malla, 100, alto, alta).
topologia(estrella_extendida, 200, alto, media).

% =========================================================
% REGLAS DE RECOMENDACIÓN
% =========================================================

% Regla principal que Java va a consultar
% recomendar_red(Equipos, PresupuestoMax, NivelSeguridad, TopologiaRecomendada)
recomendar_red(Equipos, PresupuestoMax, NivelSeguridad, TopologiaRecomendada) :-
    topologia(TopologiaRecomendada, MaxEquipos, CostoTopologia, Tolerancia),
    Equipos =< MaxEquipos,
    evaluar_costo(CostoTopologia, PresupuestoMax),
    evaluar_seguridad(Tolerancia, NivelSeguridad).

% Reglas auxiliares para interpretar las opciones del usuario
evaluar_costo(bajo, _).
evaluar_costo(medio, medio).
evaluar_costo(medio, alto).
evaluar_costo(alto, alto).

evaluar_seguridad(alta, _).
evaluar_seguridad(media, baja).
evaluar_seguridad(media, media).
evaluar_seguridad(baja, baja).