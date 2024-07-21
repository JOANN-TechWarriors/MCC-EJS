 

<!DOCTYPE html>
<html lang="en">

<?php include('header2.php'); ?>

<body>
    <!-- Navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav"></ul>
            </div>
        </div>
    </div>
    <!-- Subhead -->
    <header class="jumbotron subhead" id="overview">
        <div class="container">
            <h1>Event Judging System</h1>
            <p class="lead">Ready to serve you...</p>
        </div>
    </header>

    <!-- About EJS Modal -->
    <div class="modal fade" id="about-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">About Event Judging System</h4>
                </div>
                <div class="modal-body">
                    <table align="center">
                        <tr>
                            <td colspan="2" align="center">
                                <img src="ejs_logo.png" width="50" height="50" class="thumbnail" />
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="right">Developer:</td>
                            <td><strong> Christian Paul L. Salvado</strong> - Software and Web Developer</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="right">Email:</td>
                            <td><strong> salvadochristianpaul5@gmail.com</strong></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="right">Mobile Number:</td>
                            <td><strong> +639385974999</strong></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="right">Website:</td>
                            <td><a href="http://www.bee4ten.ml" target="_blank"><strong> www.bee4ten.ml</strong></a></td>
                        </tr>
                    </table>
                    <br />
                    <p>Check my website or get in touch with me for more information and system support. All rights reserved 2022 &COPY;</p>
                    <hr />
                    <p class="text-center text-muted">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><strong>Close</strong></button>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- END About EJS Modal -->

    <!-- Judge Panel -->
    <table cellpadding="10" cellspacing="0" border="0" align="center">
        <thead>
            <tr>
                <th align="left" style="background-color: #4976f5; text-indent: 7px; color: white;">
                    <h4>&nbsp;WELCOME</h4>
                </th>
            </tr>
        </thead>
        <tr style="background-color: #d7def2;">
            <td>
                <h5><i class="icon-user"></i> JUDGE:</h5>
                <div id="myGroup">
                    <div class="input-group">
                        <div class="alert alert-success">
                            <form method="POST" action="judge_panel.php" target="_blank">
                                <h4>Judge's Code</h4>
                                <br />
                                <input id="myInputJC" style="font-size: large; height: 45px !important;" class="form-control btn-block" name="judge_code" type="password" placeholder="Enter Judge's Code" />
                                <button style="width: 160px !important;" type="submit" class="btn btn-primary pull-right">
                                    <i class="icon-ok"></i> <strong>LOGIN</strong>
                                </button>
                                <p>
                                    <input style="padding-top: 0px !important; margin-top: 0px !important;" type="checkbox" onclick="myFunctionJC()" /> <strong>Show Code</strong>
                                </p>
                                <script>
                                    function myFunctionJC() {
                                        var x = document.getElementById("myInputJC");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <font size="2" class="" align="center"><strong>Event Judging System &middot; 2022 &COPY; </strong></font>
            <br />
        </div>
    </footer>

    <!-- Le javascript -->
    <script src="..//assets/js/jquery.js"></script>
    <script src="..//assets/js/bootstrap-transition.js"></script>
    <script src="..//assets/js/bootstrap-alert.js"></script>
    <script src="..//assets/js/bootstrap-modal.js"></script>
    <script src="..//assets/js/bootstrap-dropdown.js"></script>
    <script src="..//assets/js/bootstrap-scrollspy.js"></script>
    <script src="..//assets/js/bootstrap-tab.js"></script>
    <script src="..//assets/js/bootstrap-tooltip.js"></script>
    <script src="..//assets/js/bootstrap-popover.js"></script>
    <script src="..//assets/js/bootstrap-button.js"></script>
    <script src="..//assets/js/bootstrap-collapse.js"></script>
    <script src="..//assets/js/bootstrap-carousel.js"></script>
    <script src="..//assets/js/bootstrap-typeahead.js"></script>
    <script src="..//assets/js/bootstrap-affix.js"></script>
    <script src="..//assets/js/holder/holder.js"></script>
    <script src="..//assets/js/google-code-prettify/prettify.js"></script>
    <script src="..//assets/js/application.js"></script>
</body>

</html>
