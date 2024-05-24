
<?php

/**
 * call_sp Call the specified stored procedure with the given parameters.
 * The first parameter is the name of the stored procedure.
 * The remaining parameters are the (in) parameters to the stored procedure.
 * the last (out) parameter should be an int, like state or number of affected rows.
 *
 * @param  mixed $sp_name The name of the stored procedure to call.
 * @param  mixed $params The parameters to pass to the stored procedure.
 * @return int The number of affected rows.
 */
function call_sp( \mysqli $db, string $sp_name, ...$params ): int
{
    $sql = "CALL $sp_name( ";
    $sql .= implode( ", ", array_fill( 0, count( $params ), "?" ) );
    $sql .= ", @__affected );";

    $result   = $db->execute_query( $sql, $params );
    $result   = $db->query( "select @__affected;" );
    $affected = (int) $result->fetch_column( 0 );
    return $affected;
}