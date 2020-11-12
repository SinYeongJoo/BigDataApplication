<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='1234';
$mysql_db='cafe';
$mysql_port=3306;
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");
if(mysqli_connect_errno()){ echo "연결실패! ".mysqli_connect_error();}
          
$id = $_GET[name];                      //Writer
$pw = $_GET[pw];                        //Password
$title = $_GET[title];                  //Title
$content = $_GET[content];              //Content
$date = date('Y-m-d H:i:s');            //Date
$URL = './index.php';                   //return URL
$query = "insert into board (number,title, content, date, hit, id, password) 
    values(null,'$title', '$content', '$date',0, '$id', '$pw')";
$result = $connect->query($query);
if($result){
?>                
<script>
    alert("<?php echo "글이 등록되었습니다."?>");
    location.replace("<?php echo $URL?>");
</script>
<?php
 }
   else{
       echo "FAIL";
                }
                mysqli_close($connect);
?>
