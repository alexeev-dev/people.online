<?php

namespace App\AuthProviders;

use App\Auth;

class LoginAuthProvider
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  /**
   * Осуществляем вход в систему при помощи логина и пароля
   */
  public function login()
  {

  }
}
