<?php

 

require_once 'db.php';

 

if($_GET['id']) {

    $id = $_GET['id'];

 

    $sql = "SELECT * FROM events WHERE id = {$id}";

    $result = $connect->query($sql);

 

    $data = $result->fetch_assoc();

 

    $db->close();

 

?>

 

<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script>   
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Edit Events</title>

 

    <style type="text/css">

        fieldset {

            margin: auto;

            margin-top: 100px;

            width: 80%;

        }

 

        table tr th {

            padding-top: 22px;


        }
        table th {
            width: 70%;
            border: 1px solid black;
        }
        
    </style>

 

</head>

<body>

 

<fieldset>

    <h1> View event information </h1>
    <div class='col-lg-12 col-md-4'>
                          <div class='thumbnail'>
                              <img src='<?php echo $data['image'] ?>' style='width:100%;height:250px;'>
                              <div class='caption'>
                                <p>Name : <?php echo $data['name'] ?></p>
                                <p>Address : <?php echo $data['address'] ?></p>
                                <p>Description : <?php echo $data['description'] ?></p>
                                <p>Date :<?php echo $data['dateandtime'] ?></p>
                                <p>Capacity : <?php echo $data['capacity'] ?></p>
                                <p>Email :<?php echo $data['contact'] ?></p>
                                <p>Phone :<?php echo $data['contact_phone'] ?></p>
                                <p>Url :<?php echo $data['URL'] ?></p>
                                <p>Type :<?php echo $data['type'] ?></p>
                              </div>
                            </a>
                          </div>
                        </div>
       

            <tr>

                <input type="hidden" name="id" value="<?php echo $data['id']?>" />
                <td><a href="home.php"><button class="btn btn-primary btn-block" type="button">Back</button></a></td>

            </tr>

        </table>

    </form>

 

</fieldset>

 

</body>

</html>

 

<?php

}

?>