<?php
//---------------------------------------------------------------------------
// Copyright © 2010-2010 Eamonn Duffy. All Rights Reserved.
//---------------------------------------------------------------------------
//
//  $RCSfile: $
//
// $Revision: $
//
// Created:     Eamonn A. Duffy, 2-Jun-2010.
//
// Purpose:	Provide a means to display PHP Information.
//
//---------------------------------------------------------------------------
?>

<!-- TODO: DOCTYPE. And No Caching. -->

<html>
    <head>
        <title>PHP Information.</title>
    </head>
    <body>
        <table>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php
                        phpinfo();
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>

<?php
//---------------------------------------------------------------------------
//                    End Of $RCSfile: $
//---------------------------------------------------------------------------
?>
<!-- For GoDaddy. -->
<script>
<!--
