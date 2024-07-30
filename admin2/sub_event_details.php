


<?php
function generateRandomCode() {
    $characters = "abcdefghijkmnopqrstuvwxyz0123456789";
    $code = '';
    for ($i = 0; $i < 6; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Event Settings</title>
    <style type="text/css">
        #footer {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: lightyellow;
            border: 2px solid black;
            box-shadow: 3px 3px 8px #818181;
            padding: 4px;
            width: 200px;
        }
        #main {
            margin: 0 auto;
            width: 200px;
            border: 1px solid gray;
            padding: 10px;
        }
    </style>
    <script type="text/javascript" src="bootstrap/js/jquery-latest.js"></script>
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">

<?php
include('header.php');
include('session.php');
error_reporting(0);

$sub_event_id = $_GET['sub_event_id'];
$se_name = $_GET['se_name'];

function redirectIfExists($conn, $table, $sub_event_id, $se_name) {
    $query = $conn->query("SELECT * FROM $table WHERE subevent_id='$sub_event_id'");
    if ($query->rowCount() > 0) {
        echo "<script>window.location = 'sub_event_details_edit.php?sub_event_id=$sub_event_id&se_name=$se_name';</script>";
        exit();
    }
}

redirectIfExists($conn, 'contestants', $sub_event_id, $se_name);
redirectIfExists($conn, 'judges', $sub_event_id, $se_name);
redirectIfExists($conn, 'criteria', $sub_event_id, $se_name);
?>

<header class="jumbotron subhead" id="overview">
    <div class="container">
        <h1><?php echo $se_name; ?> Settings</h1>
        <p class="lead">Event Judging System</p>
    </div>
</header>
<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $se_name; ?>" name="se_name" />
        <input type="hidden" value="<?php echo generateRandomCode(); ?>" name="code1" />
        <input type="hidden" value="<?php echo generateRandomCode(); ?>" name="code2" />
        <input type="hidden" value="<?php echo generateRandomCode(); ?>" name="code3" />
        <input type="hidden" value="<?php echo generateRandomCode(); ?>" name="code4" />
        <input type="hidden" value="<?php echo $sub_event_id; ?>" name="sub_event_id" />

        <!-- Contestant's Settings -->
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Contestant's Settings</h3>
                </div>
                <div class="panel-body">
                    <div id="main">
                        <div class="my-form">
                            <a href="#" style="float: right" onclick="$('.addon').show();return false;">+ Category/Department</a>
                            <p class="text-box">
                                <label for="box1">Contestant No. <span class="box-number">1</span></label> <br />
                                <input type="file" name="photo1" required />
                                <input type="text" placeholder="Contestant Fullname" name="con1" id="box1" required />
                                <input type="text" placeholder="Addon" class="addon" name="addon1" id="addon1" style="display:none;" />
                                <input type="hidden" value="<?php echo rand(100000, 999999); ?>" name="rand1" required />
                                <br />
                            </p>
                            <p class="text-box">
                                <label for="box2">Contestant No. <span class="box-number">2</span></label> <br />
                                <input type="file" name="photo2" required />
                                <input type="text" placeholder="Contestant Fullname" name="con2" id="box2" required />
                                <input type="text" placeholder="Addon" class="addon" name="addon2" id="addon2" style="display:none;" />
                                <input type="hidden" value="<?php echo rand(100000, 999999); ?>" name="rand2" required />
                                <br />
                            </p>
                            <p><a class="add-box" href="#">Add Contestant</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Judge's Settings -->
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Judge's Settings</h3>
                </div>
                <div class="panel-body">
                    <div id="main">
                        <div class="my-formx">
                            <p class="text-boxx">
                                <label for="boxx1">Judge No. <span class="boxx-number">1</span></label>
                                <input type="text" name="jud1" placeholder="Judge Fullname" id="boxx1" required />
                            </p>
                            <p class="text-boxx">
                                <label for="boxx2">Judge No. <span class="boxx-number">2</span></label>
                                <input type="text" name="jud2" placeholder="Judge Fullname" id="boxx2" required />
                            </p>
                            <p><a class="add-boxx" href="#">Add Judge</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Criteria Settings -->
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Criteria Settings</h3>
                </div>
                <div class="panel-body">
                    <div id="main">
                        <div class="my-formxj">
                            <p class="text-boxxj">
                                <label for="boxxj1">Criteria No. <span class="boxxj-number">1</span></label>
                                <input type="text" name="crit1" placeholder="Description" id="boxxj1" required />
                                Criteria Points: 
                                <select onchange="totalThis()" class="ctrprcnt" name="cp1">
                                    <?php for ($i = 0; $i <= 100; $i += 5) { ?>
                                        <option><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>%
                                <br />
                            </p>
                            <p class="text-boxxj">
                                <label for="boxxj2">Criteria No. <span class="boxxj-number">2</span></label>
                                <input type="text" name="crit2" placeholder="Description" id="boxxj2" required />
                                Criteria Points: 
                                <select onchange="totalThis()" class="ctrprcnt" name="cp2">
                                    <?php for ($i = 0; $i <= 100; $i += 5) { ?>
                                        <option><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>%
                                <br />
                            </p>
                            <p><a class="add-boxxj" href="#">Add Criteria</a></p>
                        </div>
                        <b><p class="msgresult"></p><b>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
    function addBox(selector, maxBoxes, className, boxHtml) {
        $(selector + ' .add-' + className).click(function() {
            var count = $(selector + ' .' + className).length + 1;
            if (count > maxBoxes) {
                alert('Maximum Number of ' + className.charAt(0).toUpperCase() + className.slice(1) + 's reached!');
                return false;
            }
            var newBox = $(boxHtml.replace(/__INDEX__/g, count));
            newBox.hide();
            $(selector + ' .' + className + ':last').after(newBox);
            newBox.fadeIn('slow');
            return false;
        });

        $(selector).on('click', '.remove-' + className, function() {
            $(this).parent().fadeOut('slow', function() {
                $(this).remove();
                $(selector + ' .' + className + '-number').each(function(index) {
                    $(this).text(index + 1);
                });
            });
            return false;
        });
    }

    var contestantBoxHtml = `
        <p class="text-box">
            <label for="box__INDEX__">Contestant No. <span class="box-number">__INDEX__</span></label> <br />
            <input type="file" name="photo__INDEX__" required />
            <input type="text" placeholder="Contestant Fullname" name="con__INDEX__" id="box__INDEX__" required />
            <input type="text" placeholder="Addon" class="addon" name="addon__INDEX__" id="addon__INDEX__" style="display:none;" />
            <input type="hidden" value="<?php echo rand(100000, 999999); ?>" name="rand__INDEX__" required />
            <a href="#" class="remove-box">Remove</a>
        </p>`;

    var judgeBoxHtml = `
        <p class="text-boxx">
            <label for="boxx__INDEX__">Judge No. <span class="boxx-number">__INDEX__</span></label>
            <input type="text" name="jud__INDEX__" placeholder="Judge Fullname" id="boxx__INDEX__" required />
            <a href="#" class="remove-boxx">Remove</a>
        </p>`;

    var criteriaBoxHtml = `
        <p class="text-boxxj">
            <label for="boxxj__INDEX__">Criteria No. <span class="boxxj-number">__INDEX__</span></label>
            <input type="text" name="crit__INDEX__" placeholder="Description" id="boxxj__INDEX__" required />
            Criteria Points: 
            <select onchange="totalThis()" class="ctrprcnt" name="cp__INDEX__">
                <?php for ($i = 0; $i <= 100; $i += 5) { ?>
                    <option><?php echo $i; ?></option>
                <?php } ?>
            </select>%
            <br />
            <a href="#" class="remove-boxxj">Remove</a>
        </p>`;

    addBox('.my-form', 20, 'text-box', contestantBoxHtml);
    addBox('.my-formx', 20, 'text-boxx', judgeBoxHtml);
    addBox('.my-formxj', 20, 'text-boxxj', criteriaBoxHtml);
});

function totalThis() {
    var sum = 0;
    $('.ctrprcnt').each(function() {
        sum += parseInt($(this).val());
    });
    $('.msgresult').text(sum === 100 ? 'Sum is 100' : 'Sum is not 100');
}
</script>



<script type="text/javascript">

function totalThis() {

       var sum = 0;
$('.ctrprcnt').each(function()
{
    sum += parseFloat($(this).val());
});

        if (sum == '100') {
            $('.msgresult').html('Total Already 100%');
             $("button#submit").attr("disabled", false);
             $('.msgresult').css('color', 'green');
        } else if (sum > '100') {
            $('.msgresult').html('Total Percentage is Over');
            $('.msgresult').css('color', 'red');
            $("button#submit").attr("disabled", true);
        } else if (sum < '100') {
            $('.msgresult').html('Total Percentage is Low');
            $('.msgresult').css('color', 'red');
            $("button#submit").attr("disabled", true);
        }

}


</script>
 
 
</div>
 
          </div>
          
        
  </div>
 
 

 <div id="footer">
 
  <table><tr>
  <td><a href="home.php"  class="btn btn-default">Cancel</a></td>
  <td>&nbsp;</td>
  <td><button name="save_settings" id="submit" type="submit"  class="btn btn-primary" disabled>Save Settings</button></td>
  </tr></table>
   
 
</div>
</form>
          </div>
          
          
<?php 

if(isset($_POST['save_settings']))
{
    
    
    $sub_event_id=$_POST['sub_event_id'];
    $se_name=$_POST['se_name'];
    
 /* contestants */

    $con1_photo = $_FILES['photo1']['name'];
   $con1_name=$_POST['con1'];
   $AddOn1=$_POST['addon1'];
   $rand_code1=$_POST['rand1'];
    $target1 = "img/".basename($con1_photo);

   if($con1_name=="")
   {
    
   }
   else
   {
     $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con1_photo','$con1_name','$sub_event_id','1','$rand_code1', '$AddOn1')");
     move_uploaded_file($_FILES['photo1']['tmp_name'], $target1);
   }
  
   $con2_photo = $_FILES['photo2']['name'];
   $con2_name=$_POST['con2'];
   $AddOn2=$_POST['addon2'];
   $rand_code2=$_POST['rand2'];
   $target2 = "img/".basename($con2_photo);
   if($con2_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con2_photo','$con2_name','$sub_event_id','2','$rand_code2','$AddOn2')");
    move_uploaded_file($_FILES['photo2']['tmp_name'], $target2);
   }
   
   
   $con3_photo = $_FILES['photo3']['name'];
   $con3_name=$_POST['con3'];
   $AddOn3=$_POST['addon3'];
   $rand_code3=$_POST['rand3'];
   $target3 = "img/".basename($con3_photo);
   if($con3_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con3_photo','$con3_name','$sub_event_id','3','$rand_code3','$AddOn3')");
    move_uploaded_file($_FILES['photo3']['tmp_name'], $target3);
   }
  
   
   $con4_photo = $_FILES['photo4']['name'];
   $con4_name=$_POST['con4'];
   $AddOn4=$_POST['addon4'];
   $rand_code4=$_POST['rand4'];
   $target4 = "img/".basename($con4_photo);
   if($con4_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con4_photo','$con4_name','$sub_event_id','4','$rand_code4','$AddOn4')");
    move_uploaded_file($_FILES['photo4']['tmp_name'], $target4);
   }
   
   
   $con5_photo = $_FILES['photo5']['name'];
   $con5_name=$_POST['con5'];
   $AddOn5=$_POST['addon5'];
   $rand_code5=$_POST['rand5'];
   $target5 = "img/".basename($con5_photo);
   if($con5_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con5_photo','$con5_name','$sub_event_id','5','$rand_code5','$AddOn5')");
    move_uploaded_file($_FILES['photo5']['tmp_name'], $target5);
   }
   
   
   $con6_photo = $_FILES['photo6']['name'];
   $con6_name=$_POST['con6'];
   $AddOn6=$_POST['addon6'];
   $rand_code6=$_POST['rand6'];
   $target6 = "img/".basename($con6_photo);
   if($con6_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con6_photo','$con6_name','$sub_event_id','6','$rand_code6','$AddOn6')");
    move_uploaded_file($_FILES['photo6']['tmp_name'], $target6);
   }
   
   
   $con7_photo = $_FILES['photo7']['name'];
   $con7_name=$_POST['con7'];
   $AddOn7=$_POST['addon7'];
   $rand_code7=$_POST['rand7'];
   $target7 = "img/".basename($con7_photo);
   if($con7_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con7_photo','$con7_name','$sub_event_id','7','$rand_code7','$AddOn7')");
    move_uploaded_file($_FILES['photo7']['tmp_name'], $target7);
   }
   
   
   $con8_photo = $_FILES['photo8']['name'];
   $con8_name=$_POST['con8'];
   $AddOn8=$_POST['addon8'];
   $rand_code8=$_POST['rand8'];
   $target8 = "img/".basename($con8_photo);
   if($con8_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con8_photo','$con8_name','$sub_event_id','8','$rand_code8','$AddOn8')");
    move_uploaded_file($_FILES['photo8']['tmp_name'], $target8);
   }
   
   
   $con9_photo = $_FILES['photo9']['name'];
   $con9_name=$_POST['con9'];
   $AddOn9=$_POST['addon9'];
   $rand_code9=$_POST['rand9'];
   $target9 = "img/".basename($con9_photo);
   if($con9_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con9_photo','$con9_name','$sub_event_id','9','$rand_code9','$AddOn9')");
    move_uploaded_file($_FILES['photo9']['tmp_name'], $target9);
   }
   
   
   $con10_photo = $_FILES['photo10']['name'];
   $con10_name=$_POST['con10'];
   $AddOn10=$_POST['addon10'];
   $rand_code10=$_POST['rand10'];
   $target10 = "img/".basename($con10_photo);
   if($con10_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con10_photo','$con10_name','$sub_event_id','10','$rand_code10','$AddOn10')");
    move_uploaded_file($_FILES['photo10']['tmp_name'], $target10);
   }
   
   
   
   
   $con11_photo = $_FILES['photo11']['name'];
   $con11_name=$_POST['con11'];
   $AddOn11=$_POST['addon11'];
   $rand_code11=$_POST['rand11'];
   $target11 = "img/".basename($con11_photo);
   if($con11_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con11_photo','$con11_name','$sub_event_id','11','$rand_code11','$AddOn11')");
    move_uploaded_file($_FILES['photo11']['tmp_name'], $target11);
   }
   
   
   
   $con12_photo = $_FILES['photo12']['name'];
   $con12_name=$_POST['con12'];
   $AddOn12=$_POST['addon12'];
   $rand_code12=$_POST['rand12'];
   $target12 = "img/".basename($con12_photo);
   if($con12_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con12_photo','$con12_name','$sub_event_id','12','$rand_code12','$AddOn12')");
    move_uploaded_file($_FILES['photo12']['tmp_name'], $target12);
   }
   
   
   $con13_photo = $_FILES['photo13']['name'];
   $con13_name=$_POST['con13'];
   $AddOn13=$_POST['addon13'];
   $rand_code13=$_POST['rand13'];
   $target13 = "img/".basename($con13_photo);
   if($con13_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con13_photo','$con13_name','$sub_event_id','13','$rand_code13','$AddOn13')");
    move_uploaded_file($_FILES['photo13']['tmp_name'], $target13);
   }


   $con14_photo = $_FILES['photo14']['name'];
   $con14_name=$_POST['con14'];
   $AddOn14=$_POST['addon14'];
   $rand_code14=$_POST['rand14'];
   $target14 = "img/".basename($con14_photo);
   if($con14_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con14_photo','$con14_name','$sub_event_id','14','$rand_code14','$AddOn14')");
    move_uploaded_file($_FILES['photo14']['tmp_name'], $target14);
   }


   $con15_photo = $_FILES['photo15']['name'];
   $con15_name=$_POST['con15'];
   $AddOn15=$_POST['addon15'];
   $rand_code15=$_POST['rand15'];
   $target15 = "img/".basename($con15_photo);
   if($con15_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con15_photo','$con15_name','$sub_event_id','15','$rand_code15','$AddOn15')");
    move_uploaded_file($_FILES['photo15']['tmp_name'], $target15);
   }

   $con16_photo = $_FILES['photo16']['name'];
   $con16_name=$_POST['con16'];
   $AddOn16=$_POST['addon16'];
   $rand_code16=$_POST['rand16'];
   $target16 = "img/".basename($con16_photo);
   if($con16_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con16_photo','$con16_name','$sub_event_id','16','$rand_code16','$AddOn16')");
    move_uploaded_file($_FILES['photo16']['tmp_name'], $target16);
   }

   $con17_photo = $_FILES['photo17']['name'];
   $con17_name=$_POST['con17'];
   $AddOn17=$_POST['addon17'];
   $rand_code17=$_POST['rand17'];
   $target17 = "img/".basename($con17_photo);
   if($con17_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con17_photo','$con17_name','$sub_event_id','17','$rand_code17','$AddOn17')");
    move_uploaded_file($_FILES['photo17']['tmp_name'], $target17);
   }

   $con18_photo = $_FILES['photo18']['name'];
   $con18_name=$_POST['con18'];
   $AddOn18=$_POST['addon18'];
   $rand_code18=$_POST['rand18'];
   $target18 = "img/".basename($con18_photo);
   if($con18_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con18_photo','$con18_name','$sub_event_id','18','$rand_code18','$AddOn18')");
    move_uploaded_file($_FILES['photo18']['tmp_name'], $target18);
   }

   $con19_photo = $_FILES['photo19']['name'];
   $con19_name=$_POST['con19'];
   $AddOn19=$_POST['addon19'];
   $rand_code19=$_POST['rand19'];
   $target19 = "img/".basename($con19_photo);
   if($con19_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con19_photo','$con19_name','$sub_event_id','19','$rand_code19','$AddOn19')");
    move_uploaded_file($_FILES['photo19']['tmp_name'], $target19);
   }

   $con20_photo = $_FILES['photo20']['name'];
   $con20_name=$_POST['con20'];
   $AddOn20=$_POST['addon20'];
   $rand_code20=$_POST['rand20'];
   $target20 = "img/".basename($con20_photo);
   if($con20_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con20_photo','$con20_name','$sub_event_id','20','$rand_code20','$AddOn20')");
    move_uploaded_file($_FILES['photo20']['tmp_name'], $target20);
   }

   $con21_photo = $_FILES['photo21']['name'];
   $con21_name=$_POST['con21'];
   $AddOn21=$_POST['addon21'];
   $rand_code21=$_POST['rand21'];
   $target21 = "img/".basename($con21_photo);
   if($con21_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con21_photo','$con21_name','$sub_event_id','21','$rand_code21','$AddOn21')");
    move_uploaded_file($_FILES['photo21']['tmp_name'], $target21);
   }

   $con22_photo = $_FILES['photo22']['name'];
   $con22_name=$_POST['con22'];
   $AddOn22=$_POST['addon22'];
   $rand_code22=$_POST['rand22'];
   $target22 = "img/".basename($con22_photo);
   if($con22_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con22_photo','$con22_name','$sub_event_id','22','$rand_code22','$AddOn22')");
    move_uploaded_file($_FILES['photo22']['tmp_name'], $target22);
   }

   $con23_photo = $_FILES['photo23']['name'];
   $con23_name=$_POST['con23'];
   $AddOn23=$_POST['addon23'];
   $rand_code23=$_POST['rand23'];
   $target23 = "img/".basename($con23_photo);
   if($con23_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con23_photo','$con23_name','$sub_event_id','23','$rand_code23','$AddOn23')");
    move_uploaded_file($_FILES['photo23']['tmp_name'], $target23);
   }

   $con24_photo = $_FILES['photo24']['name'];
   $con24_name=$_POST['con24'];
   $AddOn24=$_POST['addon24'];
   $rand_code24=$_POST['rand24'];
   $target24 = "img/".basename($con24_photo);
   if($con24_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into contestants(Picture,fullname,subevent_id,contestant_ctr,rand_code,AddOn)values('$con24_photo','$con24_name','$sub_event_id','24','$rand_code24','$AddOn24')");
    move_uploaded_file($_FILES['photo24']['tmp_name'], $target24);
   }


 
 /* end contestants */
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   /* judges */
   
    $code1=$_POST['code1'];
    $code2=$_POST['code2'];
    $code3=$_POST['code3'];
    $code4=$_POST['code4'];
  
   
     
     
     
   $j1_name=$_POST['jud1'];
   if($j1_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into judges(fullname,subevent_id,judge_ctr,code)values('$j1_name','$sub_event_id','1','$code1')");
   }
   
   
   $j2_name=$_POST['jud2'];
   if($j2_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into judges(fullname,subevent_id,judge_ctr,code)values('$j2_name','$sub_event_id','2','$code2')");
   }
   
   
   $j3_name=$_POST['jud3'];
   if($j3_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into judges(fullname,subevent_id,judge_ctr,code)values('$j3_name','$sub_event_id','3','$code3')");
   }
   
   
   $j4_name=$_POST['jud4'];
   if($j4_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into judges(fullname,subevent_id,judge_ctr,code)values('$j4_name','$sub_event_id','4','$code4')");
   }
   

   $j5_name=$_POST['jud5'];
   if($j5_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into judges(fullname,subevent_id,judge_ctr,code)values('$j5_name','$sub_event_id','5','$code5')");
   }

   $j6_name=$_POST['jud6'];
   if($j6_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into judges(fullname,subevent_id,judge_ctr,code)values('$j6_name','$sub_event_id','6','$code6')");
   }

   $j7_name=$_POST['jud7'];
   if($j7_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into judges(fullname,subevent_id,judge_ctr,code)values('$j7_name','$sub_event_id','7','$code7')");
   }

   $j8_name=$_POST['jud8'];
   if($j8_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into judges(fullname,subevent_id,judge_ctr,code)values('$j8_name','$sub_event_id','8','$code8')");
   }

   $j9_name=$_POST['jud9'];
   if($j9_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into judges(fullname,subevent_id,judge_ctr,code)values('$j9_name','$sub_event_id','9','$code9')");
   }

   $j10_name=$_POST['jud10'];
   if($j10_name=="")
   {
    
   }
   else
   {
    $conn->query("insert into judges(fullname,subevent_id,judge_ctr,code)values('$j10_name','$sub_event_id','10','$code10')");
   }
 
 /* end judges */
 
 
 
 
 
 
 
 
 
 
 
 
  /* criteria */
   $c1_name=$_POST['crit1']; 
    $cp1=$_POST['cp1'];
  if($c1_name!="" or $cp1>0)
    {
      $conn->query("insert into criteria(criteria,subevent_id,percentage,criteria_ctr)values('$c1_name','$sub_event_id','$cp1','1')"); 
    }
    
    
       $c2_name=$_POST['crit2']; 
    $cp2=$_POST['cp2'];
   if($c2_name!="" or $cp1>0)
    {
      $conn->query("insert into criteria(criteria,subevent_id,percentage,criteria_ctr)values('$c2_name','$sub_event_id','$cp2','2')"); 
    }
    
    
       $c3_name=$_POST['crit3']; 
    $cp3=$_POST['cp3'];
    if($c3_name!="" or $cp3>0)
    {
      $conn->query("insert into criteria(criteria,subevent_id,percentage,criteria_ctr)values('$c3_name','$sub_event_id','$cp3','3')"); 
    }
    
    
       $c4_name=$_POST['crit4']; 
    $cp4=$_POST['cp4'];
   if($c4_name!="" or $cp4>0)
    {
      $conn->query("insert into criteria(criteria,subevent_id,percentage,criteria_ctr)values('$c4_name','$sub_event_id','$cp4','4')"); 
    }
    
    
       $c5_name=$_POST['crit5']; 
    $cp5=$_POST['cp5'];
    if($c5_name!="" or $cp5>0)
    {
      $conn->query("insert into criteria(criteria,subevent_id,percentage,criteria_ctr)values('$c5_name','$sub_event_id','$cp5','5')"); 
    }
    
    
       $c6_name=$_POST['crit6']; 
    $cp6=$_POST['cp6'];
    if($c6_name!="" or $cp6>0)
    {
      $conn->query("insert into criteria(criteria,subevent_id,percentage,criteria_ctr)values('$c6_name','$sub_event_id','$cp6','6')"); 
    }
    
    
       $c7_name=$_POST['crit7']; 
    $cp7=$_POST['cp7'];
   if($c7_name!="" or $cp7>0)
    {
      $conn->query("insert into criteria(criteria,subevent_id,percentage,criteria_ctr)values('$c7_name','$sub_event_id','$cp7','7')"); 
    }
    
    
       $c8_name=$_POST['crit8']; 
    $cp8=$_POST['cp8'];
    if($c8_name!="" or $cp8>0)
    {
      $conn->query("insert into criteria(criteria,subevent_id,percentage,criteria_ctr)values('$c8_name','$sub_event_id','$cp8','8')"); 
    }

   $c9_name=$_POST['crit9']; 
    $cp9=$_POST['cp9'];
    if($c9_name!="" or $cp9>0)
    {
      $conn->query("insert into criteria(criteria,subevent_id,percentage,criteria_ctr)values('$c9_name','$sub_event_id','$cp9','9')"); 
    }

       $c10_name=$_POST['crit10']; 
    $cp10=$_POST['cp10'];
    if($c10_name!="" or $cp10>0)
    {
      $conn->query("insert into criteria(criteria,subevent_id,percentage,criteria_ctr)values('$c10_name','$sub_event_id','$cp10','10')"); 
    }



 
 
    /* end criteria */
 
 
 ?>
<script>
window.location = 'sub_event_details_edit.php?sub_event_id=<?php echo $sub_event_id; ?>&se_name=<?php echo $se_name; ?>';
alert('Event details successfully set.');						
</script>
<?php  
 
 
} ?>
  
<?php include('footer.php'); ?>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
