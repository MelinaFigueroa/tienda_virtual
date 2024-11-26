
<?php
//models/User.php

class User
{
    private $conn;
    private $table_name = "users";

    public $id;
    public $name;
    public $username;
    public $password;
    public $email;
    public $role_id;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Create a new user

    public function create()
    {
        //erifica si el email o username ya existen
        $queryCheck = "SELECT COUNT(*) FROM " . $this->table_name . " WHERE email = :email OR username = :username";
        $stmtCheck = $this->conn->prepare($queryCheck);
        $stmtCheck->bindParam(':email', $this->email);
        $stmtCheck->bindParam(':username', $this->username);
        $stmtCheck->execute();

        if ($stmtCheck->fetchColumn() > 0) {
            // Retorna false si el usuario o email ya existen
            return false;
        }

        //Preparar la consulta de inserción si no hay duplicados
        $query = "INSERT INTO " . $this->table_name . " (name, username, password, email, role_id) 
              VALUES (:name, :username, :password, :email, :role_id)";

        $stmt = $this->conn->prepare($query);

        // Aplicar hash a la contraseña
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        // Bind de parámetros
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":role_id", $this->role_id);

        if ($stmt->execute()) {
            // Obtener el ID del último usuario insertado
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }


    // Get all users
    public function read()
    {
        $query = "SELECT id, name, username, email, role_id, created_at FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get a specific user by ID
    public function readOne()
    {
        $query = "SELECT id, name, username, email, role_id, created_at 
                  FROM " . $this->table_name . " 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->username = $row['name'];
            $this->username = $row['username'];
            $this->email = $row['email'];
            $this->role_id = $row['role_id'];
            $this->created_at = $row['created_at'];
            return true;
        }
        return false;
    }

    // Update user details
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET ";

        $sets = [];
        $params = [':id' => $this->id];

        if (!empty($this->name)) {
            $sets[] = "name = :name";
            $params[':name'] = $this->name;
        }

        if (!empty($this->username)) {
            $sets[] = "username = :username";
            $params[':username'] = $this->username;
        }

        if (!empty($this->email)) {
            $sets[] = "email = :email";
            $params[':email'] = $this->email;
        }

        if (!empty($this->password)) {
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            $sets[] = "password = :password";
            $params[':password'] = $this->password;
        }

        if (!empty($this->role_id)) {
            $sets[] = "role_id = :role_id";
            $params[':role_id'] = $this->role_id;
        }

        if (empty($sets)) {
            return false;
        }

        $query .= implode(", ", $sets) . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }

    // Delete user by ID
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    // Login: authenticate user and return user details if valid
    public function login($email, $password)
    {
        $query = "SELECT id, name, email, password, role_id 
                  FROM " . $this->table_name . " 
                  WHERE email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Verificar la contraseña
            if (password_verify($password, $row['password'])) {
                return $row; // Retornar los detalles del usuario si la contraseña es correcta
            }
        }
        return false;
    }
}
?>