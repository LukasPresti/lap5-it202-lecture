<?php
require_once('database.php');

class Category
{
    public $categoryID;
    public $categoryCode;
    public $categoryName;

    function __construct($categoryID, $categoryCode, $categoryName)
    {
        $this->categoryID = $categoryID;
        $this->categoryCode = $categoryCode;
        $this->categoryName = $categoryName;
    }

    function __toString()
    {
        $output = "<h2>Category Number: $this->categoryID</h2>\n" .
                  "<h2>$this->categoryCode, $this->categoryName</h2>\n";
        return $output;
    }

    function saveCategory()
    {
        $db = getDB();
        // insert new category into the categories table
        $query = "INSERT INTO categories (categoryID, categoryCode, categoryName) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            "iss",  // integer, string, string
            $this->categoryID,
            $this->categoryCode,
            $this->categoryName
        );
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    static function getCategories()
    {
        $db = getDB();
        $query = "SELECT * FROM categories";
        $result = $db->query($query);

        if (mysqli_num_rows($result) > 0) {
            $categories = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $category = new Category(
                    $row['categoryID'],
                    $row['categoryCode'],
                    $row['categoryName']
                );
                array_push($categories, $category);
                unset($category);
            }
            $db->close();
            return $categories;
        } else {
            $db->close();
            return NULL;
        }
    }
}
?>
