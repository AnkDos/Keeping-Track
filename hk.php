<?php
session_start();
include_once 'dbconnect.php';

$glo=mysql_query("select * from budgetR");
$ar=mysql_fetch_array($glo);
$budl=$ar['budget'];
$num=$_POST['yo'];

$date=date("d/m/Y");
$ti=date("h:i:sa");

if(isset($_POST['btn1']))
{
for($i=1;$i<=$_SESSION['l'];$i++){
       $inp[$i]=$_POST["a$i"];
     $inp2[$i]=$_POST["b$i"];
     $user=$_POST['name'];
$sum=$inp2[$i]+$sum;


 $pname = mysql_real_escape_string($inp[$i]);
        $price = mysql_real_escape_string($inp2[$i]);
        
        if($budl>0 && $budl>=$sum)
{
$do=mysql_query("insert into expenses(Pname,Price,User,datee,timee,id) Values('$pname','$price','$user','$date','$ti','')");

$id['0']='ankurpan96@gmail.com';
$id['1']='shivamkaushik24@gmail.com';
$id['2']='aman.a345@gmail.com';
 $id['3']='deepak.kathoria77@gmail.com';
$id['4']='srijanmandal95@gmail.com';

for($y=0;$y<=4;$y++)
{
   mail($id[$y],Hi ,"The new items bought are $pname and Price= $price by $user"); 
    
}
}
 
//     if ( !$do ) {
//   die("Connection failed : " . mysql_error());
//  }


}
if($do){
$dob2=mysql_query("Update budgetR set budget=budget-'$sum'");
}

else{
    $err= "TOO BIG";
}
header("Refresh: 1");
}











?>
<html>
    
        
         <head>
          <script type="text/javascript">
             function Ank(t) 
             {
                var y=document.getElementById("txt");
                y.value = t.value;
              }
        </script>
      </head>  
      <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    font-size:11px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
      
    <body>    
        <center><i><u> <font color='blue'><h1> Welcome to M-24 Khata </h1></i></u></font></center>
        <?php echo $err;?>
       <font color='brown'> <h2>BALANCE LEFT :<?php echo $budl;?> </h2> </font>
        <font color='brown'> <h2 align="right">DATE : <?php echo $date; ?></h2> </font>
        <font color='brown'> <h2 align="right">TIME : <?php echo $ti; ?></h2> </font>
       
       
       
       <?php 
       if(isset($_GET['st']))
       {
       ?>
       
       
       
       <table>
  <tr>

    <th>Product</th>
    <th>Price</th>
    <th>Brought By</th>
    <th>ON </th>
    <th>AT</th>
  </tr>
       
       <?php

$query11 ="SELECT * FROM expenses";
$qd = mysql_query($query11);
while($data = mysql_fetch_assoc($qd))
{
	

?>
 <tr>
 	 
    <td>&nbsp;<?php echo $data['Pname']; ?></td>
    <td>&nbsp;<?php echo $data['Price']; ?></td>
       <td>&nbsp;<?php echo $data['User']; ?></td>
     <td>&nbsp;<?php echo $data['datee']; ?></td>
       <td>&nbsp;<?php echo $data['timee']; ?></td>
     
  
  
  </tr>
  
  <?php }	?>
  
</table>
       
       
       
       
       
       
       
       
       
       
       <?php
       }
       else{
       ?>
       
       <center> <form method="post">

<select name="bitch" id="cmb" data-role="slider" onChange="Ank(this);">
                         <option value="nul">SELECT NUMBER OF ITEMS</option>
                          <?php
                          
                             for($j=1;$j<=100;$j++)
                             { 
                           ?>
                          <option value="<?php echo $j;?>"><?php echo $j;?></option>
                         <?php 
                             }
                             ?>
    </select> 
  <input type="text" name="yo" id="txt" hidden>  
   <button type='submit' name='btn'>SET </button>
   <br>
    <?php 
    if(isset($_POST['btn']))
    {
        $_SESSION['l']=$_POST['yo'];
        for($i=1;$i<=$_SESSION['l'];$i++)
        {
        ?><br>


<table>
    <th>Name of the product</th>
    <th>Price</th>
</tr>

<tr>

     <td>   <input type="text" name="a<?php echo $i; ?>"><br></td>
     <td>   <input type="text" name="b<?php echo $i; ?>"><br></td>
     </tr>
     </table>
     
     
    <?php
        }   
        ?>
        <br>
        ENTER THE BUYER'S NAME <input type="text" name="name"><br></td>
        <button type='submit' name='btn1'>UPDATE </button>
       
        <?php
    }
    ?>
   
</form> 
 TOTAL : <?php  $_SESSION['tot']= $sum;
 echo $_SESSION['tot'];?>
<a href="?st">Show Expense Table</a>
<?php
       }
?>
</body>

</html>
