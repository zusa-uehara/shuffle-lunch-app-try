<?php

// require_once __DIR__ . '/../core/Controller.php';

class EmployeeController extends Controller{

  public function index(){

    $employees = $this->databaseManager->get('Employee')->fetchAllNames();

    #データベースに接続する
    // $mysqli = new mysqli('db','test_user', 'pass', 'test_database');
    // if ($mysqli->connect_error) {
    //   throw new RuntimeException('mysqli接続エラー:' . $mysqli->connect_error);
    // }

    // $result = $mysqli->query('SELECT name FROM employees');
    // $employees = $result->fetch_all(MYSQLI_ASSOC);


    #データベースと切断する
    // $mysqli->close();

    return $this->render([
      'title' => '社員登録',
      'employees' => $employees,
      'errors' => [],
    ]);


  }

  public function create(){

    if (!$this->request->isPost()){
        throw new HttpNotFoundException();
    }
    $errors=[];
    #データベースに接続する
    // $mysqli = new mysqli('db','test_user', 'pass', 'test_database');
    // if ($mysqli->connect_error) {
    //   throw new RuntimeException('mysqli接続エラー:' . $mysqli->connect_error);
    // }

    // $result = $mysqli->query('SELECT name FROM employees');
    // $employees = $result->fetch_all(MYSQLI_ASSOC);
    $employee = $this->databaseManager->get('Employee');
    $employees = $employee->fetchAllNames();

    if (!strlen($_POST['name'])) {
      $errors['name'] = '社員名を入力してください';
    } elseif (strlen($_POST['name']) > 100) {
      $errors['name'] = '社員名は１００文字以内で入力してください';
    }

    if(!count($errors)){
      $employee->insert($_POST['name']);
    // $stmt = $mysqli->prepare('INSERT INTO employees (name) VALUES (?)');
    // $stmt->bind_param('s', $_POST['name']);
    // $stmt->execute();
    // $stmt->close();

  }



#データベースと切断する
// $mysqli->close();

return $this->render([
  'title' => '社員の登録',
  'employees' => $employees,
  'errors' => $errors,
], 'index');


  }

}
