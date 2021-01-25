<?php
    session_start();
    require_once('../../config/database.php');
    require_once('../../model/rvModel/claimFormModel.php');
?>

<?php

        $_SESSION['ref_form_no'] = '';
        $result_forms = array();
        $result_forms = claimFormModel::getRefClaimForms($connect);

        if(mysqli_num_rows($result_forms)>0){

            while($row = mysqli_fetch_assoc($result_forms)){

                    $_SESSION['ref_form_no'] .= "<tr>";
                    $_SESSION['ref_form_no'] .= "<td>{$row['claim_form_no']}</td>";
                    $_SESSION['ref_form_no'] .= "<td><a href=\"../../controller/rvControllers/viewRefFormController.php?claim_form_no={$row['claim_form_no']}\">View Form</a></td>";

                    header('Location:../../view/reportViewer/rvRefferedClaimFormV.php');
                    
            }
        }

        if(mysqli_num_rows($result_forms) == 0){
            header('Location:../../view/reportViewer/rvNoFormsAvaliableV.php');

        }

?>