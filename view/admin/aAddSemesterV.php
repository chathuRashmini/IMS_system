<?php
    require '../basic/topnav.php';
?>

<main>
    <title>Add a semester</title>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="aHomeV.php">Home</a></li>
            <li class="active">Add a new Semester</li>
        </ul>

        <div class="row">
            <div class="col left20">
                <?php
                    require 'aSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div>
                    <h2>Add a new Semester</h2>
                </div>

                <div class="contentForm">
                    <form action="../../controller/adminControllers/aAddSemesterController.php" method="POST">
                        <div class="row">
                            <div class="col-25">
                              <label>Enter Semester</label>
                            </div>
                            <div class="col-75">
                                <select name="semester"required>
                                    <option value="">Select semester: </option>
                                    <option value="First Semester">First semester: </option>
                                    <option value="Second Semester">Second semester: </option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                              <label>Enter Academic Year</label>
                            </div>
                            <div class="col-75">
                                <input type="year" name="academic_year" placeholder="Academic Year" min="0"  required/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                              <label>Enter Starting Date</label>
                            </div>
                            <div class="col-75">
                                <input type="date" name="start_date" placeholder="Start date" id="startDate" required/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                              <label>Enter Ending Date</label>
                            </div>
                            <div class="col-75">
                                <input type="date" name="end_date" placeholder="End date" id="endDate" oninput="checkDate()"; required/>
                            </div>
                        </div>
                        <button class="subbtn" type="submit" name="addSemester-submit">Add Semester</button>
                        <button class="cancelbtn">
                            <a href="aHomeV.php">Cancel</a>
                        </button>
                    </form>
                    <!-- <button id="subBtn" class="subbtn">View Previous Semesters</button>
                    <button id="myBtn" class="cancelbtn">Cancel</button> -->
                </div>
                <div id="subModal" class="modal">
                    <div class="modal-content">
                        <span class="subclose">&times;</span>
                        <?php
                            require 'aSemestersPopupV.php';
                        ?>
                    </div>
                </div>
                
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h1>Are you sure you want to leave the page?</h1>
                        <button class="mainbtn">
                            <a href="aHomeV.php">Yes</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var modal = document.getElementById("myModal");
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on the button, open the modal
        btn.onclick = function() {
          modal.style.display = "block";
        }
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        var submodal = document.getElementById("subModal");
        var subbtn = document.getElementById("subBtn");
        var subspan = document.getElementsByClassName("subclose")[0];
        subbtn.onclick = function() {
          submodal.style.display = "block";
        }
        subspan.onclick = function() {
          submodal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }

        // Check dates
        function checkDate(){
            var start_date = document.getElementById("startDate").value;
            var end_date = document.getElementById("endDate").value;
            alert("Enter end date correctly!");
            if(end_date < start_date){
                alert("Enter end date correctly!");
                document.getElementById("endDate").value = "mm/dd/yyyy";
            }
        }
        
    </script>
    
</main>

<?php
    require '../basic/footer.php';
?>