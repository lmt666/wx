<?php  
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';


  $sql="update users set money = money - :money where id = :id";
  $query=$db->prepare($sql);
  $query->bindParam(':id',$_SESSION['userid'],PDO::PARAM_INT);
  $query->bindParam(':money',$_POST['sum'],PDO::PARAM_INT);
  if(!$query->execute()){
    print_r($query->errorInfo());
  }
?>


<?php 
        
        $query = $db->query('select * from cart');
        $status = '未发货';
        while ($post= $query->fetchObject()){
          ?>
        <?php 
          $sql = "insert into orders(user_id,cname,price,num,total,status,a_id) values(:user_id,:cname,:price,:num,:total,:status,:a_id)" ; 
          $q = $db->prepare($sql);
          $q->bindParam(':user_id',$_SESSION['userid'],PDO::PARAM_INT);
          $q->bindParam(':cname',$post->cname,PDO::PARAM_STR);
          $q->bindParam(':price',$post->price,PDO::PARAM_INT);
          $q->bindParam(':num',$post->num,PDO::PARAM_INT);
          $q->bindParam(':total',$post->total,PDO::PARAM_INT);
          $q->bindParam(':status',$status,PDO::PARAM_STR);
          $q->bindParam(':a_id',$_POST['a_id'],PDO::PARAM_INT);
          if (!$q->execute()) { 
            print_r($q->errorInfo());
          };
        }
        redirect_to("../cart/num/clean.php");
        ?>
          
          




