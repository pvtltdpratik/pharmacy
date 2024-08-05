<?php

function getProducts($category)
{
    global $conn;
    $sql = "SELECT * FROM product_list WHERE category = '$category'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col col-md mb-4">
                    <div class="card">
                        <img src="' . $row['image_path'] . '" class="card-img-top" alt="' . $row['name'] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $row['name'] . '</h5>
                            <p class="card-text">' . $row['description'] . '</p>
                            <p class="card-text">Price: ₹' . $row['price'] . '</p>
                            <p class="card-text">Brand: ' . $row['brand'] . '</p>
                            <p class="card-text">Category: ' . $row['category'] . '</p>
                            <button class="btn btn-danger" onclick="window.location.href=\'view_product\'">View</button>
                        </div>
                    </div>
                </div> <br>';
        }
    } else {
        echo "No products found in this category.";
    }

}

getProducts("Syrups");
?>