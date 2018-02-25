<?php


class Database
{
    private static $db = null;
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = 'root';
    private $db_name = 'ecom_oop';
    public $conn;

    private function __construct()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pass);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            die();
        }
    }

    public static function instance()
    {
        if (Database::$db === null) {
            Database::$db = new Database();
        }
        return Database::$db;
    }

    //PRODUCT

    public function getAllProducts()
    {
        $query = "SELECT * FROM " . Product::$table_name;
        $stmt = $this->conn->query($query);
        $products = [];
        while ($row = $stmt->fetch()) {
            $product = new Product();
            $product->id = $row['id'];
            $product->title = $row['title'];
            $product->category_id = $row['category_id'];
            $product->price = $row['price'];
            $product->quantity = $row['quantity'];
            $product->description = $row['description'];
            $product->image = $row['image'];
            $product->created = $row['created'];
            $product->modified = $row['modified'];
            array_push($products, $product);
        }
        return $products;
    }

    public function getProduct($id)
    {
        $query = "SELECT * FROM " . Product::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $product = null;
        while ($row = $stmt->fetch()) {
            $product = new Product();
            $product->id = $row['id'];
            $product->title = $row['title'];
            $product->category_id = $row['category_id'];
            $product->price = $row['price'];
            $product->quantity = $row['quantity'];
            $product->description = $row['description'];
            $product->image = $row['image'];
            $product->created = $row['created'];
            $product->modified = $row['modified'];
        }
        return $product;
    }

    public function addProduct($title, $category_id, $price, $quantity, $description, $image)
    {
        $query = "INSERT INTO " . Product::$table_name . "(title, category_id, price, quantity, description, image) VALUES(?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $title, PDO::PARAM_STR);
        $stmt->bindParam(2, $category_id, PDO::PARAM_INT);
        $stmt->bindParam(3, $price, PDO::PARAM_STR);
        $stmt->bindParam(4, $quantity, PDO::PARAM_INT);
        $stmt->bindParam(5, $description, PDO::PARAM_STR);
        $stmt->bindParam(6, $image, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateProduct($title, $category_id, $price, $quantity, $description, $image, $id)
    {
        $query = "UPDATE " . Product::$table_name . " SET title = ?, category_id = ?, price = ?, quantity = ?, description =?, image = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $title, PDO::PARAM_STR);
        $stmt->bindParam(2, $category_id, PDO::PARAM_INT);
        $stmt->bindParam(3, $price, PDO::PARAM_STR);
        $stmt->bindParam(4, $quantity, PDO::PARAM_INT);
        $stmt->bindParam(5, $description, PDO::PARAM_STR);
        $stmt->bindParam(6, $image, PDO::PARAM_STR);
        $stmt->bindParam(7, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $product = $this->getProduct($id);
        File::deleteProductImage($product->image);
        $query = "DELETE FROM " . Product::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    //CATEGORY

    public function getAllCategories()
    {
        $query = "SELECT * FROM " . Category::$table_name;
        $stmt = $this->conn->query($query); // built in query method;
        $categories = [];
        while ($row = $stmt->fetch()) {
            $category = new Category();
            $category->id = $row['id'];
            $category->title = $row['title'];
            array_push($categories, $category);
        }
        return $categories;
    }

    public function getCategory($id)
    {
        $query = "SELECT * FROM " . Category::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $category = null;
        while ($row = $stmt->fetch()) {
            $category = new category();
            $category->id = $row['id'];
            $category->title = $row['title'];
        }
        return $category;
    }

    public function addCategory($title)
    {
        $query = "INSERT INTO " . Category::$table_name . "(title) VALUES(?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $title, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateCategory($title, $id)
    {
        $query = "UPDATE " . Category::$table_name . " SET title = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $title, PDO::PARAM_STR);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public
    function deleteCategory($id)
    {
        $query = "DELETE FROM " . Category::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

//USER

    public
    function getAllUsers()
    {
        $query = "SELECT * FROM " . User::$table_name;
        $stmt = $this->conn->query($query); // built in query method;
        $users = [];
        while ($row = $stmt->fetch()) {
            $user = new User();
            $user->id = $row['id'];
            $user->username = $row['username'];
            $user->firstname = $row['firstname'];
            $user->lastname = $row['lastname'];
            $user->password = $row['password'];
            $user->role = $row['role'];
            $user->email = $row['email'];
            $user->image = $row['image'];
            $user->created_at = $row['created'];
            $user->modified = $row['modified'];
            array_push($users, $user);
        }
        return $users;
    }

    public
    function getUser($id)
    {
        $query = "SELECT * FROM " . User::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = null;
        while ($row = $stmt->fetch()) {
            $user = new User();
            $user->id = $row['id'];
            $user->username = $row['username'];
            $user->firstname = $row['firstname'];
            $user->lastname = $row['lastname'];
            $user->password = $row['password'];
            $user->role = $row['role'];
            $user->email = $row['email'];
            $user->image = $row['image'];
            $user->created = $row['created'];
            $user->modified = $row['modified'];
        }
        return $user;
    }

    public function addUser($username, $firstname, $lastname, $password, $email, $image = '', $role = 'subscriber')
    {
        $query = "INSERT INTO " . User::$table_name . "(username, firstname, lastname, `password`, email, image, role) VALUES(?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->bindParam(2, $firstname, PDO::PARAM_STR);
        $stmt->bindParam(3, $lastname, PDO::PARAM_STR);
        $stmt->bindParam(4, $password, PDO::PARAM_STR);
        $stmt->bindParam(5, $email, PDO::PARAM_STR);
        $stmt->bindParam(6, $image, PDO::PARAM_STR);
        $stmt->bindParam(7, $role, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateUser($username, $firstname, $lastname, $password, $email, $image, $role, $id)
    {
        $password = User::passwordHash($password);
        $query = "UPDATE " . User::$table_name . " SET username = ?, firstname = ?, lastname = ?, `password` = ?, email = ?, image =? , role =? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->bindParam(2, $firstname, PDO::PARAM_STR);
        $stmt->bindParam(3, $lastname, PDO::PARAM_STR);
        $stmt->bindParam(4, $password, PDO::PARAM_STR);
        $stmt->bindParam(5, $email, PDO::PARAM_STR);
        $stmt->bindParam(6, $image, PDO::PARAM_STR);
        $stmt->bindParam(7, $role, PDO::PARAM_STR); // figure out default role todo
        $stmt->bindParam(8, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function isUsernameExists($username)
    {
        $query = "SELECT username FROM " . User::$table_name . " WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function isUserEmailExists($email)
    {
        $query = "SELECT email FROM " . User::$table_name . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM " . User::$table_name . " WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = null;
        while ($row = $stmt->fetch()) {
            $user = new User();
            $user->id = $row['id'];
            $user->username = $row['username'];
            $user->firstname = $row['firstname'];
            $user->lastname = $row['lastname'];
            $user->password = $row['password'];
            $user->role = $row['role'];
            $user->email = $row['email'];
            $user->image = $row['image'];
            $user->created = $row['created'];
            $user->modified = $row['modified'];
        }
        return $user;
    }

    public
    function deleteUser($id)
    {
        $query = "DELETE FROM " . User::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

//ORDERS

    public
    function getAllOrders()
    {
        $query = "SELECT * FROM " . Order::$table_name;
        $stmt = $this->conn->query($query);
        $orders = [];
        while ($row = $stmt->fetch()) {
            $order = new Order();
            $order->id = $row['id'];
            $order->price = $row['price'];
            $order->transaction = $row['transaction'];
            $order->status = $row['status'];
            $order->currency = $row['currency'];
//            $order->created = $row['created'];
//            $order->modified = $row['modified'];
            array_push($orders, $order);
        }
        return $orders;
    }

    public
    function getOrder($id)
    {
        $query = "SELECT * FROM " . Order::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $order = null;
        while ($row = $stmt->fetch()) {
            $order = new Order();
            $order->id = $row['id'];
            $order->price = $row['price'];
            $order->transaction = $row['transaction'];
            $order->status = $row['status'];
            $order->currency = $row['currency'];
        }
        return $order;
    }

    public
    function addOrder($price, $transaction, $status, $currency)
    {
        $query = "INSERT INTO " . Order::$table_name . "(price, `transaction`, `status`, currency) VALUES(?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $price, PDO::PARAM_INT);
        $stmt->bindParam(2, $transaction, PDO::PARAM_STR);
        $stmt->bindParam(3, $status, PDO::PARAM_STR);
        $stmt->bindParam(4, $currency, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public
    function deleteOrder($id)
    {
        $query = "DELETE FROM " . Order::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

//REPORTS

    public
    function getAllReports()
    {
        $query = "SELECT * FROM " . Report::$table_name;
        $stmt = $this->conn->query($query);
        $reports = [];
        while ($row = $stmt->fetch()) {
            $report = new Report();
            $report->id = $row['id'];
            $report->product_id = $row['product_id'];
            $report->user_id = $row['user_id'];
            $report->order_id = $row['order_id'];
            $report->purchased = $row['purchased'];
            array_push($reports, $report);
        }
        return $reports;
    }

    public
    function getReport($id)
    {
        $query = "SELECT * FROM " . Report::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $order = null;
        while ($row = $stmt->fetch()) {
            $report = new Report();
            $report->id = $row['id'];
            $report->product_id = $row['product_id'];
            $report->user_id = $row['user_id'];
            $report->order_id = $row['order_id'];
            $report->purchased = $row['purchased'];
        }
        return $order;
    }

    public
    function addReport($product_id, $user_id, $order_id)
    {
        $query = "INSERT INTO " . Report::$table_name . "(product_id, user_id, order_id) VALUES(?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $product_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $user_id, PDO::PARAM_INT);
        $stmt->bindParam(3, $order_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public
    function deleteReport($id)
    {
        $query = "DELETE FROM " . Report::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    //RATING

    public function getAllRatings()
    {
        $query = "SELECT * FROM " . Rating::$table_name;
        $stmt = $this->conn->query($query);
        $ratings = [];
        while ($row = $stmt->fetch()) {
            $rating = new Rating();
            $rating->id = $row['id'];
            $rating->product_id = $row['product_id'];
            $rating->user_id = $row['user_id'];
            $rating->points = $row['points'];
            $rating->total = $row['total'];
            $rating->modified = $row['modified'];
            array_push($ratings, $rating);
        }
        return $ratings;
    }

    public function getRating($id)
    {
        $query = "SELECT * FROM " . Rating::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $rating = null;
        while ($row = $stmt->fetch()) {
            $rating = new Rating();
            $rating->product_id = $row['product_id'];
            $rating->user_id = $row['user_id'];
            $rating->points = $row['points'];
            $rating->created = $row['created'];
            $rating->modified = $row['modified'];
        }
        return $rating;
    }

    public function getRatingByProductAndUserId($product_id, $user_id)
    {
        $query = "SELECT * FROM " . Rating::$table_name . " WHERE product_id = ? AND user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $product_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $rating = null;
        while ($row = $stmt->fetch()) {
            $rating = new Rating();
            $rating->id = $row['id'];
            $rating->product_id = $row['product_id'];
            $rating->user_id = $row['user_id'];
            $rating->points = $row['points'];
            $rating->created = $row['created'];
            $rating->modified = $row['modified'];
        }
        return $rating;
    }

    public function addRating($product_id, $user_id, $points)
    {
        $query = "INSERT INTO " . Rating::$table_name . "(product_id, user_id, points) VALUES(?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $product_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $user_id, PDO::PARAM_INT);
        $stmt->bindParam(3, $points, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateRating($points, $id)
    {
        $query = "UPDATE " . Rating::$table_name . " SET points = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $points, PDO::PARAM_INT);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    //REVIEWS

    public function getAllReviews()
    {
        $query = "SELECT * FROM " . Review::$table_name;
        $stmt = $this->conn->query($query);
        $reviews = [];
        while ($row = $stmt->fetch()) {
            $review = new Review();
            $review->id = $row['id'];
            $review->product_id = $row['product_id'];
            $review->user_id = $row['user_id'];
            $review->review = $row['review'];
            $review->created = $row['created'];
            $review->modified = $row['modified'];
            array_push($reviews, $review);
        }
        return $reviews;
    }

    public function getReview($id)
    {
        $query = "SELECT * FROM " . Review::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $order = null;
        while ($row = $stmt->fetch()) {
            $review = new Review();
            $review->product_id = $row['product_id'];
            $review->user_id = $row['user_id'];
            $review->review = $row['review'];
            $review->created = $row['created'];
            $review->modified = $row['modified'];
        }
        return $order;
    }

    public function addReview($product_id, $user_id, $review)
    {
        $query = "INSERT INTO " . Review::$table_name . "(product_id, user_id, review) VALUES(?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $product_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $user_id, PDO::PARAM_INT);
        $stmt->bindParam(3, $review, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateReview($product_id, $user_id, $review, $id)
    {
        $query = "UPDATE " . User::$table_name . " SET product_id = ?, user_id = ?, review = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $product_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $user_id, PDO::PARAM_INT);
        $stmt->bindParam(3, $review, PDO::PARAM_STR);
        $stmt->bindParam(4, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteReview($id)
    {
        $query = "DELETE FROM " . Review::$table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

