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
   
$sum=$inp2[$i]+$sum;


 $pname = mysql_real_escape_string($inp[$i]);
        $price = mysql_real_escape_string($inp2[$i]);

$do=mysql_query("insert into budget(name,amount,datee,timee,id) Values('$pname','$price','$date','$ti','')");

 
    if ( !$do ) {
  die("Connection failed : " . mysql_error());
 }

print_r($inp[$i]);
print_r($inp2[$i]);
}

$dob2=mysql_query("Update budgetR set budget=budget+'$sum'");

}


if(isset($_POST['btn2'])){
    
    $bud=trim($_POST['am']);
    $dob=mysql_query("Update budgetR set budget=budget+'$bud'");
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
      
      
      
      
      
      
      
      
      
      
      
    <body>
        
        
        
        
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
        
        
        
        
        
        
        
        
        
            
        <center><i><u> <font color='blue'><h1> Welcome ADMIN </h1></i></u></font></center>
        
       <font color='brown'> <h2>BALANCE LEFT : <?php echo $budl;?></h2> </font>
        <font color='brown'> <h2 align="right">DATE : <?php echo $date; ?></h2> </font>
        <font color='brown'> <h2 align="right">TIME : <?php echo $ti; ?></h2> </font>
       
       <center> <form method="post">
           
          <b> QUICK ADD :</b>
          <input type="text" name="am" >  
   <button type='submit' name='btn2'>Update </button>
<br>
OR
<br>
<select name="bitch" id="cmb" data-role="slider" onChange="Ank(this);">
                         <option value="nul">SELECT NUMBER OF Members Paid</option>
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
   if(isset($_GET['ps']))
   {
      $asd=mysql_query("select * from budget order by id DESC");    
       $co=mysql_num_rows($asd);
   ?>
   
      <table>
  <tr>

    <th>DEPOSITED BY</th>
    <th>AMOUNT</th>
   
    <th>ON </th>
    <th>AT</th>
  </tr>
   
   
   
   
   
   
   <?php
  for($ii=0;$ii<=$co;$ii++)
  {
      $fet=mysql_fetch_array($asd);    
  ?>
   
  
  <tr>
 	 
    <td>&nbsp;<?php echo $fet['name']; ?></td>
    <td>&nbsp;<?php echo $fet['amount']; ?></td>
       <td>&nbsp;<?php echo $fet['datee']; ?></td>
     <td>&nbsp;<?php echo $fet['timee']; ?></td>
       
     
  
  
  </tr>
  
  <?php }	?>
  
</table>
        
   
   <?php
   }
  ?>
   
   
   
    <?php 
    if(isset($_POST['btn']))
    {
        $_SESSION['l']=$_POST['yo'];
        for($i=1;$i<=$_SESSION['l'];$i++)
        {
        ?><br>


<table>
    <th>Name </th>
    <th>Amount</th>
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
      
        <button type='submit' name='btn1'>UPDATE </button>
       
        <?php
    }
    ?>

   
</form> 
 TOTAL : <?php echo $sum;?>

<a href="?ps">View the Deposits by others</a>
</body>
</html>
