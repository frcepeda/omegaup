<?php

/** ******************************************************************************* *
  *                    !ATENCION!                                                   *
  *                                                                                 *
  * Este codigo es generado automaticamente. Si lo modificas tus cambios seran      *
  * reemplazados la proxima vez que se autogenere el codigo.                        *
  *                                                                                 *
  * ******************************************************************************* */

/** ProblemsTags Data Access Object (DAO) Base.
 *
 * Esta clase contiene toda la manipulacion de bases de datos que se necesita
 * para almacenar de forma permanente y recuperar instancias de objetos
 * {@link ProblemsTags}.
 * @access public
 * @abstract
 *
 */
abstract class ProblemsTagsDAOBase {
    /**
     * Guardar registros.
     *
     * Este metodo guarda el estado actual del objeto {@link ProblemsTags}
     * pasado en la base de datos. La llave primaria indicará qué instancia va
     * a ser actualizada en base de datos. Si la llave primara o combinación de
     * llaves primarias que describen una fila que no se encuentra en la base de
     * datos, entonces replace() creará una nueva fila.
     *
     * @throws Exception si la operacion fallo.
     *
     * @param ProblemsTags $Problems_Tags El objeto de tipo ProblemsTags
     *
     * @return int Un entero mayor o igual a cero identificando el número de filas afectadas.
     */
    final public static function replace(ProblemsTags $Problems_Tags) : int {
        if (empty($Problems_Tags->problem_id) || empty($Problems_Tags->tag_id)) {
            throw new \OmegaUp\Exceptions\NotFoundException('recordNotFound');
        }
        $sql = 'REPLACE INTO Problems_Tags (`problem_id`, `tag_id`, `public`, `autogenerated`) VALUES (?, ?, ?, ?);';
        $params = [
            $Problems_Tags->problem_id,
            $Problems_Tags->tag_id,
            intval($Problems_Tags->public),
            intval($Problems_Tags->autogenerated),
        ];
        \OmegaUp\MySQLConnection::getInstance()->Execute($sql, $params);
        return \OmegaUp\MySQLConnection::getInstance()->Affected_Rows();
    }

    /**
     * Actualizar registros.
     *
     * @param ProblemsTags $Problems_Tags El objeto de tipo ProblemsTags a actualizar.
     *
     * @return int Número de filas afectadas
     */
    final public static function update(ProblemsTags $Problems_Tags) : int {
        $sql = 'UPDATE `Problems_Tags` SET `public` = ?, `autogenerated` = ? WHERE `problem_id` = ? AND `tag_id` = ?;';
        $params = [
            (int)$Problems_Tags->public,
            (int)$Problems_Tags->autogenerated,
            is_null($Problems_Tags->problem_id) ? null : (int)$Problems_Tags->problem_id,
            is_null($Problems_Tags->tag_id) ? null : (int)$Problems_Tags->tag_id,
        ];
        \OmegaUp\MySQLConnection::getInstance()->Execute($sql, $params);
        return \OmegaUp\MySQLConnection::getInstance()->Affected_Rows();
    }

    /**
     * Obtener {@link ProblemsTags} por llave primaria.
     *
     * Este metodo cargará un objeto {@link ProblemsTags} de la base
     * de datos usando sus llaves primarias.
     *
     * @return ?ProblemsTags Un objeto del tipo {@link ProblemsTags}. NULL si no hay tal registro.
     */
    final public static function getByPK(?int $problem_id, ?int $tag_id) : ?ProblemsTags {
        $sql = 'SELECT `Problems_Tags`.`problem_id`, `Problems_Tags`.`tag_id`, `Problems_Tags`.`public`, `Problems_Tags`.`autogenerated` FROM Problems_Tags WHERE (problem_id = ? AND tag_id = ?) LIMIT 1;';
        $params = [$problem_id, $tag_id];
        $row = \OmegaUp\MySQLConnection::getInstance()->GetRow($sql, $params);
        if (empty($row)) {
            return null;
        }
        return new ProblemsTags($row);
    }

    /**
     * Eliminar registros.
     *
     * Este metodo eliminará el registro identificado por la llave primaria en
     * el objeto ProblemsTags suministrado. Una vez que se ha
     * eliminado un objeto, este no puede ser restaurado llamando a
     * {@link replace()}, ya que este último creará un nuevo registro con una
     * llave primaria distinta a la que estaba en el objeto eliminado.
     *
     * Si no puede encontrar el registro a eliminar, {@link \OmegaUp\Exceptions\NotFoundException}
     * será arrojada.
     *
     * @param ProblemsTags $Problems_Tags El objeto de tipo ProblemsTags a eliminar
     *
     * @throws \OmegaUp\Exceptions\NotFoundException Se arroja cuando no se encuentra el objeto a eliminar en la base de datos.
     */
    final public static function delete(ProblemsTags $Problems_Tags) : void {
        $sql = 'DELETE FROM `Problems_Tags` WHERE problem_id = ? AND tag_id = ?;';
        $params = [$Problems_Tags->problem_id, $Problems_Tags->tag_id];

        \OmegaUp\MySQLConnection::getInstance()->Execute($sql, $params);
        if (\OmegaUp\MySQLConnection::getInstance()->Affected_Rows() == 0) {
            throw new \OmegaUp\Exceptions\NotFoundException('recordNotFound');
        }
    }

    /**
     * Obtener todas las filas.
     *
     * Esta funcion leerá todos los contenidos de la tabla en la base de datos
     * y construirá un arreglo que contiene objetos de tipo {@link ProblemsTags}.
     * Este método consume una cantidad de memoria proporcional al número de
     * registros regresados, así que sólo debe usarse cuando la tabla en
     * cuestión es pequeña o se proporcionan parámetros para obtener un menor
     * número de filas.
     *
     * @param ?int $pagina Página a ver.
     * @param int $filasPorPagina Filas por página.
     * @param ?string $orden Debe ser una cadena con el nombre de una columna en la base de datos.
     * @param string $tipoDeOrden 'ASC' o 'DESC' el default es 'ASC'
     *
     * @return ProblemsTags[] Un arreglo que contiene objetos del tipo {@link ProblemsTags}.
     *
     * @psalm-return array<int, ProblemsTags>
     */
    final public static function getAll(
        ?int $pagina = null,
        int $filasPorPagina = 100,
        ?string $orden = null,
        string $tipoDeOrden = 'ASC'
    ) : array {
        $sql = 'SELECT `Problems_Tags`.`problem_id`, `Problems_Tags`.`tag_id`, `Problems_Tags`.`public`, `Problems_Tags`.`autogenerated` from Problems_Tags';
        if (!is_null($orden)) {
            $sql .= ' ORDER BY `' . \OmegaUp\MySQLConnection::getInstance()->escape($orden) . '` ' . ($tipoDeOrden == 'DESC' ? 'DESC' : 'ASC');
        }
        if (!is_null($pagina)) {
            $sql .= ' LIMIT ' . (($pagina - 1) * $filasPorPagina) . ', ' . (int)$filasPorPagina;
        }
        $allData = [];
        foreach (\OmegaUp\MySQLConnection::getInstance()->GetAll($sql) as $row) {
            $allData[] = new ProblemsTags($row);
        }
        return $allData;
    }

    /**
     * Crear registros.
     *
     * Este metodo creará una nueva fila en la base de datos de acuerdo con los
     * contenidos del objeto ProblemsTags suministrado.
     *
     * @param ProblemsTags $Problems_Tags El objeto de tipo ProblemsTags a crear.
     *
     * @return int Un entero mayor o igual a cero identificando el número de filas afectadas.
     */
    final public static function create(ProblemsTags $Problems_Tags) : int {
        $sql = 'INSERT INTO Problems_Tags (`problem_id`, `tag_id`, `public`, `autogenerated`) VALUES (?, ?, ?, ?);';
        $params = [
            is_null($Problems_Tags->problem_id) ? null : (int)$Problems_Tags->problem_id,
            is_null($Problems_Tags->tag_id) ? null : (int)$Problems_Tags->tag_id,
            (int)$Problems_Tags->public,
            (int)$Problems_Tags->autogenerated,
        ];
        \OmegaUp\MySQLConnection::getInstance()->Execute($sql, $params);
        $affectedRows = \OmegaUp\MySQLConnection::getInstance()->Affected_Rows();
        if ($affectedRows == 0) {
            return 0;
        }

        return $affectedRows;
    }
}
