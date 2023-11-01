SELECT tickets.id_ticket,tickets.tituloTicket,categorias.categoria,afectaciones.afectacion,areas.area,edificios.edificio,prioridades.prioridad,tickets.fecha from tickets
        inner join categorias
        on tickets.id_categoria=categorias.id_categoria
        inner join afectaciones
        on tickets.id_afectacion=afectaciones.id_afectacion
        inner join areas
        on tickets.id_area=areas.id_area
        inner join edificios
        on tickets.id_edificio=edificios.id_edificio
        inner join prioridades
        on tickets.id_prioridad=prioridades.id_prioridad
        where tickets.id_usuario="usu_id"
         /* Dato recibibo desde la función listar_x_usu */