<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

  public function index(){

    $this -> load -> view("login");
  }

  public function new_auto(){
    $this -> load -> view("new_auto");
  }

  public function new_persona(){
    $this -> load -> view("new_persona");
  }

  public function usuario(){
    $this -> load -> view("usuarios");
  }

  public function ventas(){
    $this -> load -> view("listx");
  }

  public function home(){
    $this -> load -> view("home");
  }

  public function reportes(){
    $this -> load -> view("reportes");
  }

  public function vender($id=0){
    $this -> load -> view("confirmarVenta",['id'=>$id]);
  }

  public function editar($id=0){
    $this -> load -> view('new_auto',['id'=>$id]);
  }

  public function editarU($id=0){
    $this -> load -> view('usuarios',['id'=>$id]);

  }
  public function login(){
    $dato['username'] = $_POST['username'];
    $dato['pass'] = $_POST['password'];

    $users = core_dealer::login($dato);
    if(empty($users)){
      $errorlogin = 'Usuario o Contraseña son invalidos';
      redirect("");
//      echo '<script name="accion">alert("Usuario o Contraseña son invalidos") </script>';
    }else{
      foreach ($users as $usuarios){
        $user = $usuarios->usuarios;
      }
      redirect("main/home");
    }
  }

  public function contrato(){
      core_dealer::contrato();
  }

  public function ventaFinal($vehiculo, $cliente){
      $this->load->view('factura');
  }

}

?>
