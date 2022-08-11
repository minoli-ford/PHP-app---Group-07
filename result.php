<?php
$v1=$_REQUEST["v1"];
$v2=$_REQUEST["v2"];
$v3=$_REQUEST["v3"];

$database = "BLUDB";          
$hostname = "dashdb-txn-sbox-yp-dal09-08.services.dal.bluemix.net";    
$user     = "tsw47027";     
$password = "ghp2gx2+x84jmg20";     
$port     = "50000"; 
$ssl_port = "50001";         

$driver  = "DRIVER={IBM DB2 ODBC DRIVER};";
$dsn     = "DATABASE=$database; " .
           "HOSTNAME=$hostname;" .
           "PORT=$port; " .
           "PROTOCOL=TCPIP; " .
           "UID=$user;" .
           "PWD=$password;";

$conn_string = $driver . $dsn;     
$conn = odbc_connect( $conn_string, "", "" );

if( $conn )
{
    echo "Connection succeeded.";
    
    
    
}
else
{
    echo "Connection failed.";
}

$sql = 'SELECT  "Country Code" ,"Region","Income Group" FROM ECONTABLE  WHERE "Region"  NOTNULL ';
$result= odbc_exec($conn, $sql);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<body style="background-color:#ADD8E6;">
<Center>
<h1 style="background-color:DodgerBlue;">Economic Data</h1>
<p><b><i> Search Results</i></b></p>
<table border="1">
 <thead>
<tr>
<th>Country Code</th>
<th>Region</th>
<th>Income Group</th>
</tr>
</thead>
<?php 
       
       
            
            echo '<tbody>';

           
      
    while ($row = (odbc_fetch_array($result))) {  if ( $row['Country Code'] == $v1 || $row['Region'] == $v2 || $row['Income Group'] == $v3 ) {         
                        
              ?>
            <tr>
           <td>
           <?php  
           echo $row['Country Code'];
           
           ?>
           </td>
           <td><?php  
           echo $row['Region'];
           
           ?></td>
           
            
             <td><?php  
           echo $row['Income Group']; 
           ?>
         
           </td>
            
             </tr>
      
       <?php  } else{ } }
        
      echo '</tbody>'; odbc_close( $conn ); ?>
</table>
</Center>
</body>
</html>


