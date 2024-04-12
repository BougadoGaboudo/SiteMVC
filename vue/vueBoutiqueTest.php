<main class="bg">

<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'product added to cart!';
   }

};

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'cart quantity updated successfully!';
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:index.php');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:index.php');
}


if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}

?>
<section>
    <div class="center">
        <div class="width">
        <div class="filter-buttons">
            <button data-filter="*" class="filter-select active-filter" type="button">Tout</button>
            <button data-filter="exp" class="filter-select" type="button">Exp</button>
            <button data-filter="ball" class="filter-select" type="button">Ball</button>
            <button data-filter="baie" class="filter-select" type="button">Baie</button>
            <button data-filter="badge" class="filter-select" type="button">Badge</button>
        </div>
        <div class="boutique">
            <div class="items-container">

                <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE `type`='Baie'") or die('query failed');
                        if(mysqli_num_rows($select_product) > 0){
                            while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                    <div data-filter="baie" class="item">
                        <div class="select-img"><img src="img/<?php echo $fetch_product['image']; ?>" alt=""></div>
                        <div class="nom"><?php echo $fetch_product['name']; ?></div>
                        <div class="prix"><h4>₽ <?php echo $fetch_product['price']; ?></h4></div>
                        <input class="article-input" type="number" min="1" name="product_quantity" value="1">
                        <input type="submit" value="Ajouter au panier" name="add_to_cart" class="btn">
                    </div>
                <?php
                            };
                        };
                ?>


                <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE `type`='Ball'") or die('query failed');
                        if(mysqli_num_rows($select_product) > 0){
                            while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                    <div data-filter="ball" class="item">
                        <div class="select-img"><img src="img/<?php echo $fetch_product['image']; ?>" alt=""></div>
                        <div class="nom"><?php echo $fetch_product['name']; ?></div>
                        <div class="prix"><h4>₽ <?php echo $fetch_product['price']; ?></h4></div>
                        <input class="article-input" type="number" min="1" name="product_quantity" value="1">
                        <input type="submit" value="Ajouter au panier" name="add_to_cart" class="btn">
                    </div>
                <?php
                            };
                        };
                ?>

                <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE `type`='Exp'") or die('query failed');
                        if(mysqli_num_rows($select_product) > 0){
                            while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                    <div data-filter="exp" class="item">
                        <div class="select-img"><img src="img/<?php echo $fetch_product['image']; ?>" alt=""></div>
                        <div class="nom"><?php echo $fetch_product['name']; ?></div>
                        <div class="prix"><h4>₽ <?php echo $fetch_product['price']; ?></h4></div>
                        <input class="article-input" type="number" min="1" name="product_quantity" value="1">
                        <input type="submit" value="Ajouter au panier" name="add_to_cart" class="btn">
                    </div>
                <?php
                            };
                        };
                ?>

                <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE `type`='Badge'") or die('query failed');
                        if(mysqli_num_rows($select_product) > 0){
                            while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                    <div data-filter="badge" class="item">
                        <div class="select-img"><img src="img/<?php echo $fetch_product['image']; ?>" alt=""></div>
                        <div class="nom"><?php echo $fetch_product['name']; ?></div>
                        <div class="prix"><h4>₽ <?php echo $fetch_product['price']; ?></h4></div>
                        <input class="article-input" type="number" min="1" name="product_quantity" value="1">
                        <input type="submit" value="Ajouter au panier" name="add_to_cart" class="btn">
                    </div>
                <?php
                            };
                        };
                ?>

            </div>
            </div>
        </div>
    </div>
</section>

</main>

<script src="filter.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>