<?php

/**
 *
 */
class core_dealer{

  static function guardar($tabla, $datos){
    $CI =& get_instance();

    if (isset($datos['id']) && $datos['id'] > 0 && $tabla == 'vehiculos') {

    $data = array(
      'marca' => $datos['marca'],
      'modelo' => $datos['modelo']
    );

      $CI -> db -> where('id',$datos['id']);
      $CI-> db ->update($tabla, $data);

    }elseif (isset($datos['id']) && $datos['id'] > 0) {
      $CI -> db -> where('id',$datos['id']);
      $CI-> db ->update($tabla, $datos);
    }else {
      $CI -> db -> insert($tabla,$datos);
    }
  }

  static function listado($tabla) {
    $CI =& get_instance();
    if ($tabla == 'vehiculos') {
      $CI -> db -> where('vendido', 0);
    }
    $rs = $CI->db->get($tabla)->result();
    return $rs;
  }

  static function x_id($id, $tabla) {
    $CI =& get_instance();
    $CI ->db->where('id',$id);
    $rs = $CI->db->get($tabla)->result();
    return $rs;
  }

  static function vendido($vehiculos){
      $CI =& get_instance();

      $CI->db->set(array('vendido'=>1));
      $CI->db->where('id', $vehiculos);
      $CI->db->update('vehiculos');
  }

  static function contrato(){
    force_download('contrato.pdf', NULL);
  }

  static function verificarCedula($cedula){
    $CI =& get_instance();
    $CI->db->where('cedula', $cedula);
    $rs = $CI->db->get('clientes')->result();
       if(count($rs) > 0){
         return true;
       }else {
         return false;
       }
}

  static function login($datos){
    $CI =& get_instance();
    $CI ->db->where('usuarios',$datos['username']);
    $CI ->db->where('pass',$datos['pass']);
    $rs = $CI->db->get('usuarios')->result();
    return($rs);
    // code...
  }

  static function listHome(){
    $CI =& get_instance();
    $query = array(
      'marca',
      'modelo',
      'count(id) as Cantidad'
    );
    $CI -> db -> where('vendido', 0);
    $rs = $CI->db->select($query)->from('vehiculos')->group_by('modelo')
    ->get()->result_array();
    return $rs;
    // code...
  }

    static function TotalInvertido(){
        $CI =& get_instance();
        $query = 'SUM(precio) as total';
        $sql = $CI->db
        ->select($query)
        ->from('vehiculos')
        ->get()
        ->result_array();
        $totales['total']=$sql[0]['total'];
        return $totales;
    }

    static function Total(){
        $CI =& get_instance();
        $query = 'SUM(subtotal) as subtotal, SUM(total) as total, COUNT(total) as contado';
        $sql = $CI->db
        ->select($query)
        ->from('ventas')
        ->get()
        ->result_array();
        $totales['subtotal']=$sql[0]['subtotal'];
        $totales['total']=$sql[0]['total'];
        $totales['cont']=$sql[0]['contado'];

        return $totales;
    }

    static function meses($meses){
        $sql = 'SELECT sum(total) as total, count(total) as contado
        FROM ventas
        WHERE fecha BETWEEN DATE_SUB(NOW(), INTERVAL ' . $meses . ' MONTH)  AND NOW()';

        $CI =& get_instance();
        $total = $CI->db
        ->query($sql)
        ->result_array();

        $totales['rds'] = number_format($total[0]['total'], 2);
        $totales['cant'] = $total[0]['contado'];
        return $totales;
    }
}
?>
