
<?php
include("../Assets/Connection/Connection.php");
session_start();




 $selQry = "select * from tbl_chat c inner join tbl_derma b on (b.derma_id =c.chat_todid) or (b.derma_id =c.chat_fromdid) where b.derma_id ='".$_SESSION["did"]."' order by chat_datetime";
    $rowdis=$Con->query($selQry);
     while($datadis=$rowdis->fetch_assoc())
  
    {
        if ($datadis["chat_fromuid"]==$_GET["id"]) {

            $selQry1= "select * from tbl_user where user_id  ='".$_GET["id"]."'";
    $rowdis1=$Con->query($selQry1);
     if($datadis1=$rowdis1->fetch_assoc())
  
{
            
?>

<div class="chat-message is-received">
    <img src="../Assets/Files/User/Photo/<?php echo $datadis1["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis1["user_name"] ?></span>
        <div class="message-text"><?php echo $datadis["chat_content"] ?></div>
    </div>
</div>
    <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>

<?php
        }

} else {
    
?>
<div class="chat-message is-sent">
    <img src="../Assets/Files/Derma/Photo/<?php echo $datadis["derma_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis["derma_name"] ?></span>
        <div class="message-text"><?php echo $datadis["chat_content"] ?></div>
    </div>
</div>
        <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>
<?php
    }

        }
    


?>