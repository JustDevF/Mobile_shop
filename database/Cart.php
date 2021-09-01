<?php
// panier
// php classe cart 
class Cart
{
    //propriétés
    public $db = null;

    //constructeur
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insérer de données au panier
    // insérer de données dans la table cart
    public  function insertIntoCart($params = null, $table = "cart"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insérer dans ta table cart les valeurs(user_id) (0)"
                // obtenir les colonnes du tableau
                $columns = implode(',', array_keys($params));
                // obtenir les valeurs du tableau
                $values = implode(',' , array_values($params));

                // créer une requête SQL
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // exécuter la requête
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    //  obtenir le user_id et item_id et les insérer dans la table du panier
    public  function addToCart($userid, $itemid){
        if (isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            // insérer des données dans la tablea cart
            $result = $this->insertIntoCart($params);
            if ($result){
                // Rafraîchir la page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    // supprimer l'article du panier à l'aide de l'identifiant de l'article
    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result){
                // Rafraîchir la page
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // calculer le sous-total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    //obtenir l'id de l'article de la liste du panier
    public function getCartId($cartArray = null, $key = "item_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    // Enrégistrer la pour plus tard
    public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

            // exécuter plusieurs requêtes
            $result = $this->db->con->multi_query($query);

            if($result){
                // Rafraîchir la page
                header("Location :" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }


}