<?php

require './config.php';

$conn = new mysqli("localhost", "root", "", "omos_db");

// Check if search_input is set and not empty
if(isset($_GET['search_input']) && !empty($_GET['search_input'])) {
    // Sanitize the input to prevent SQL injection
    $searchInput = $conn->real_escape_string($_GET['search_input']);

    // Construct the SQL query using prepared statement
    $sql = "SELECT * FROM product_list WHERE MATCH(brand, name, description) AGAINST (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $searchInput);
    $stmt->execute();

    // Get the result set
    $res = $stmt->get_result();

    // Check if there are any results
    if ($res->num_rows > 0) {
        // Output data of each row
?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
<?php
        while($row = $res->fetch_assoc()) {
?>
            <div class="col">
                <div class="card h-100 shadow">
                    <img src="<?= validate_image($row['image_path']) ?>" class="card-img-top img-fluid" alt="Product Image" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name'] ?></h5>
                        <p class="card-text"><?= $row['brand'] ?></p>
                        <p class="card-text"><strong>Price:</strong> <?= format_num($row['price'], 2) ?></p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="./?p=products/view_product&id=<?= $row['id'] ?>" class="btn btn-danger stretched-link">View Product</a>
                    </div>
                </div>
            </div>
<?php
        }
?>
        </div>
<?php
    } else {
        echo "No results found";
    }

    // Close prepared statement
    $stmt->close();
} else {
    echo "No search input provided";
}

// Close database connection
$conn->close();
?>
