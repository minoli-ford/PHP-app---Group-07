<?php
$database = "BLUDB";          # Get these database details from
$hostname = "dashdb-txn-sbox-yp-dal09-08.services.dal.bluemix.net";    # the web console
$user     = "tsw47027";     #
$password = "ghp2gx2+x84jmg20";     #
$port     = "50000"; #
$ssl_port = "50001";         #
# Build the connection string
#
$driver  = "DRIVER={IBM DB2 ODBC DRIVER};";
$dsn     = "DATABASE=$database; " .
           "HOSTNAME=$hostname;" .
           "PORT=$port; " .
           "PROTOCOL=TCPIP; " .
           "UID=$user;" .
           "PWD=$password;";

$conn_string = $driver . $dsn;     # Non-SSL
#$conn_string = $driver . $ssl_dsn; # SSL
# Connect
#
$conn = odbc_connect( $conn_string, "", "" );

if( $conn )
{
    echo "Connection succeeded.";
    
    
    
}
else
{
    echo "Connection failed.";
}

$sql1 = 'SELECT DISTINCT "Country Code" FROM ECONTABLE ';
$result1= odbc_exec($conn, $sql1);

$sql2 = 'SELECT DISTINCT "Region" FROM ECONTABLE ';
$result2= odbc_exec($conn, $sql2);

$sql3 = 'SELECT DISTINCT "Income Group" FROM ECONTABLE ';
$result3= odbc_exec($conn, $sql3);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<body style="background-color:#ADD8E6;">
<Center>
<h1 style="background-color:DodgerBlue;">Economic Data</h1>
<img src="new.jpg" width="300" height="300">
<p><b><i> Search Records</i></b></p>
<form action="controller.php?step=1" method="post">
Country Code </br>
<select name="valueToSearch_1" id="valueToSearch_1"
                                   class="form-control">
                                <option value="">
                                    Select Country Code
                                </option>
                                <?php while ($row = (odbc_fetch_array($result1))){?>
                                <option value="<?php echo $row['Country Code']; ?>">
                                <?php echo $row['Country Code']; ?>
                                </option>
                                <?php }?>
                            </select>
</br></br>
Region </br>
<select name="valueToSearch_2" id="valueToSearch_2"
                                   class="form-control">
                                <option value="">
                                    Select Reigon.
                                </option>
                                <?php while ($row = (odbc_fetch_array($result2))){?>
                                <option value="<?php echo $row['Region']; ?>">
                                <?php echo $row['Region']; ?>
                                </option>
                                <?php }?>
                            </select></br></br>
Income Group</br>
<select name="valueToSearch_3" id="valueToSearch_3"
                                   class="form-control">
                                <option value="">
                                   Select Income Group
                                </option>
                                <?php while ($row = (odbc_fetch_array($result3))){?>
                                <option value="<?php echo $row['Income Group']; ?>">
                                <?php echo $row['Income Group']; ?>
                                </option>
                                <?php }?>
                            </select></br></br></br></br>

<input type="submit" name="search" value="Search Record">
</form> </br></br>


</Center>
</body>
</html>

