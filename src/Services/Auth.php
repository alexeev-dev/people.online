<?php

namespace App;

class Auth
{
  private static providers = [
    'login' => 'App\AuthProviders\LoginAuthProvider',
    'vk' => 'App\AuthProviders\VkAuthProvider'
  ];

  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  /**
   *  Возвращает экземляр типа User авторизованного пользователя.
   *  Если пользователь не авторизовам, возвращает значение NULL
   */
  public function getUser()
  {
    session_start();

    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
      # TODO: Сделать запрос к БД и получить экземпляр типа User
    } else {
      return NULL;
    }
  }

  /**
   * Производит унифицированый вход в систему
   * @param $method - название метода входа (имя соц.сети или login)
   */
  public function login($method)
  {
    $provider = new self::$providers[$method]($this->db);
    return $provider->login();
  }
}
