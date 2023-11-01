<?php
class Ticket extends Conectar
{

    public function insert_ticket($tituloTicket, $descripcion, $id_categoria, $id_usuario, $id_edificio, $id_afectacion, $id_area, $id_vulnerabilidad, $id_respuesta)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tickets(tituloTicket,descripcion,id_categoria,id_usuario,id_status,id_edificio,id_afectacion,id_area,fecha,id_vulnerabilidad,id_respuesta,id_prioridad) VALUES(?,?,?,?,1,?,?,?,now(),?,?,?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tituloTicket);
        $sql->bindValue(2, $descripcion);
        $sql->bindValue(3, $id_categoria);
        $sql->bindValue(4, $id_usuario);
        $sql->bindValue(5, $id_edificio);
        $sql->bindValue(6, $id_afectacion);
        $sql->bindValue(7, $id_area);
        $sql->bindValue(8, $id_vulnerabilidad);
        $sql->bindValue(9, $id_respuesta);
        if ($id_respuesta == 1) {
            $sql->bindValue(10, 1);
        } else {
            $sql->bindValue(10, 2);
        }
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function listar_ticket_x_usuario($id_usuario)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT tickets.id_ticket,tickets.tituloTicket,categorias.categoria,afectaciones.afectacion,areas.area,edificios.edificio,prioridades.prioridad,tickets.fecha from tickets
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
        where tickets.id_usuario=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_usuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function listar_tickets()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT id_ticket,tituloTicket, usuarios.nombre, categorias.categoria, prioridades.prioridad, statuses.status, edificios.edificio, afectaciones.afectacion, areas.area, fecha,id_agente from tickets 
        inner join usuarios
    on tickets.id_usuario = usuarios.id_user
        inner join categorias
    on tickets.id_categoria = categorias.id_categoria
        inner join prioridades
    on tickets.id_prioridad = prioridades.id_prioridad
        inner join statuses
    on tickets.id_status = statuses.id_status
        inner join edificios
    on tickets.id_edificio = edificios.id_edificio
        inner join afectaciones
    on tickets.id_afectacion = afectaciones.id_afectacion
        inner join areas
    on tickets.id_area = areas.id_area";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    public function listar_ticketDetalle_x_ticket($id_ticket)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "select notasticket.idTicket, 
            notasticket.id_notaTicket, 
            notasticket.fechaNota, 
            notasticket.notas,
            notasticket.id_usuario,
            usuarios.nombre from notasticket
            INNER JOIN usuarios
            ON notasticket.id_usuario=usuarios.id_user where
            notasticket.idTicket=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_ticket);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function listar_ticket_x_id($tick_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT id_ticket,tituloTicket, descripcion, categorias.categoria, prioridades.prioridad, id_presupuesto,statuses.status, edificios.edificio, areas.area, fecha,agente.nombre AS agente,usuario.nombre AS usuario from tickets 
            inner join usuarios AS agente
        on tickets.id_agente = agente.id_user
            inner join usuarios AS usuario 
        on tickets.id_usuario = usuario.id_user
            inner join categorias
        on tickets.id_categoria = categorias.id_categoria
            inner join prioridades
        on tickets.id_prioridad = prioridades.id_prioridad
            inner join statuses
        on tickets.id_status = statuses.id_status
            inner join edificios
		on tickets.id_edificio = edificios.id_edificio 
            inner join areas
        on tickets.id_area = areas.id_area where 
        id_ticket=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tick_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }



    public function insert_ticketdetalle($id_ticket, $notas, $id_usuario, $id_presupuesto, $id_status)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "BEGIN;
        INSERT INTO notasticket (idTicket, fechaNota, notas, id_usuario)
        VALUES (?, now(), ? , ?);
        UPDATE tickets
        SET tickets.id_status=?, tickets.id_presupuesto=? where tickets.id_ticket=?;
        COMMIT;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_ticket);
        $sql->bindValue(2, $notas);
        $sql->bindValue(3, $id_usuario);
        $sql->bindValue(4, $id_status);
        $sql->bindValue(5, $id_presupuesto);
        $sql->bindValue(6, $id_ticket);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


}
