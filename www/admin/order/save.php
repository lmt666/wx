<?php 
        require_once '../inc/db.php';
        require_once '../inc/common.php';
        $query = $db->query('select * from cart');
        $status='未发货';
        while ( $post =  $query->fetchObject() ) {

          $sql = "insert into orders select * from cart" ; 
          $q = $db->prepare($sql);
          $q->bindParam(':name',$post->name,PDO::PARAM_STR);
          $q->bindParam(':price',$post->price,PDO::PARAM_INT);
          $q->bindParam(':num',$post->num,PDO::PARAM_INT);
          $q->bindParam(':total',$post->total,PDO::PARAM_INT);
          $q->bindParam(':status',$status,PD::PARAM_STR);
      ?>
          

<?php }
if (!$q->execute()) { 
  print_r($q->errorInfo());
}else{
  redirect_to("destroy.php");
};

?>

